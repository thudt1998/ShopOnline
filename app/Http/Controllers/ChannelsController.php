<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ChannelCreateRequest;
use App\Http\Requests\ChannelUpdateRequest;
use App\Repositories\ChannelRepository;

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
     * @return Response
     */
    public function index()
    {
        $channels = $this->repository->all();
        return view('admin.channels.index', compact('channels'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function create(Request $request)
    {
        return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChannelCreateRequest $request
     *
     * @return Response
     *
     */
    public function store(ChannelCreateRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->to(route('channel.index'))->with('flash_message', 'Tạo mới kênh bán hàng thành công!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $channel = $this->repository->find($id);

        return view('admin.channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChannelUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     */
    public function update(ChannelUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);

        return redirect()->to(route('channel.index'))->with('flash_message', 'Sửa kênh bán hàng thành công!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->back()->with('flash_message', 'Xóa kênh bán hàng thành công!');
    }
}
