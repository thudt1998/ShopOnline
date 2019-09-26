<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserPositionCreateRequest;
use App\Http\Requests\UserPositionUpdateRequest;
use App\Repositories\UserPositionRepository;
use App\Validators\UserPositionValidator;

/**
 * Class UserPositionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UserPositionsController extends Controller
{
    /**
     * @var UserPositionRepository
     */
    protected $repository;

    /**
     * @var UserPositionValidator
     */
    protected $validator;

    /**
     * UserPositionsController constructor.
     *
     * @param UserPositionRepository $repository
     * @param UserPositionValidator $validator
     */
    public function __construct(UserPositionRepository $repository, UserPositionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userPositions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userPositions,
            ]);
        }

        return view('userPositions.index', compact('userPositions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserPositionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserPositionCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userPosition = $this->repository->create($request->all());

            $response = [
                'message' => 'UserPosition created.',
                'data'    => $userPosition->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userPosition = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userPosition,
            ]);
        }

        return view('userPositions.show', compact('userPosition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userPosition = $this->repository->find($id);

        return view('userPositions.edit', compact('userPosition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserPositionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserPositionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userPosition = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserPosition updated.',
                'data'    => $userPosition->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UserPosition deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserPosition deleted.');
    }
}
