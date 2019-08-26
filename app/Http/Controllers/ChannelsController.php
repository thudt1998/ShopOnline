<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ChannelCreateRequest;
use App\Http\Requests\ChannelUpdateRequest;
use App\Repositories\ChannelRepository;
use App\Validators\ChannelValidator;

/**
 * Class ChannelsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ChannelsController extends Controller
{
    /**
     * @var ChannelRepository
     */
    protected $repository;
    /**
     * ChannelsController constructor.
     *
     * @param ChannelRepository $repository
     */
    public function __construct(ChannelRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $channels = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json(
                [
                'data' => $channels,
                ]
            );
        }

        return view('channels.index', compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChannelCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ChannelCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $channel = $this->repository->create($request->all());

            $response = [
                'message' => 'Channel created.',
                'data'    => $channel->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json(
                    [
                    'error'   => true,
                    'message' => $e->getMessageBag()
                    ]
                );
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json(
                [
                'data' => $channel,
                ]
            );
        }

        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = $this->repository->find($id);

        return view('channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChannelUpdateRequest $request
     * @param string               $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ChannelUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $channel = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Channel updated.',
                'data'    => $channel->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json(
                    [
                    'error'   => true,
                    'message' => $e->getMessageBag()
                    ]
                );
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json(
                [
                'message' => 'Channel deleted.',
                'deleted' => $deleted,
                ]
            );
        }

        return redirect()->back()->with('message', 'Channel deleted.');
    }
}
