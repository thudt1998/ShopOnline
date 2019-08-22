<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductGroupCreateRequest;
use App\Http\Requests\ProductGroupUpdateRequest;
use App\Repositories\ProductGroupRepository;

/**
 * Class ProductGroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductGroupsController extends Controller
{
    /**
     * @var ProductGroupRepository
     */
    protected $repository;

    /**
     * ProductGroupsController constructor.
     *
     * @param ProductGroupRepository $repository
     */
    public function __construct(ProductGroupRepository $repository)
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
        $productGroups = $this->repository->paginate(20);
        return view('admin.product-group.index', compact('productGroups'));
    }

    public function create()
    {
        $productGroups = $this->repository->all();
        return view('admin.product-group.create', compact('productGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductGroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(ProductGroupCreateRequest $request)
    {
        if ($request->get('parent_id') === "0")
            $request['parent_id'] = NULL;
        $this->repository->create($request->all());
        return redirect()->route('product-group.index')->with('flash_message', 'Tạo mới nhóm sản phẩm thành công!');
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
        $productGroup = $this->repository->find($id);
        $productGroups = $this->repository->all();
        return view('admin.product-group.edit', compact('productGroup', 'productGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductGroupUpdateRequest $request
     * @param string $id
     *
     * @return Response
     */
    public function update(ProductGroupUpdateRequest $request, $id)
    {
        $productGroup = $this->repository->update($request->all(), $id);
        return redirect()->route('product-group.index')->with('message', 'Cập nhật nhóm sản phẩm thành công!');
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
        $count = $this->repository->findWhere(['parent_id' => $id])->count();
        if ($count === 0) {
            $deleted = $this->repository->delete($id);
            return redirect()->back()->with('flash_message', 'Nhóm sản phẩm xóa thành công.');
        } else {
            return redirect()->back()->with('error_message', 'Bạn không thể xoá dữ liệu này! Hiện tại có danh mục cấp thấp hơn còn tồn tại.');
        }

    }
}
