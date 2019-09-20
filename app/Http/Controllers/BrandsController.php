<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Repositories\BrandRepository;

/**
 * Class BrandsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BrandsController extends Controller
{
    /**
     * @var BrandRepository
     */
    protected $repository;

    /**
     * BrandsController constructor.
     *
     * @param BrandRepository $repository
     */
    public function __construct(BrandRepository $repository)
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
        $brands = $this->repository->all();

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BrandCreateRequest $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('brand.index')->with('flash_message', 'Thêm mới thương hiệu thành công!');
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
        $brand = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json(
                [
                'data' => $brand,
                ]
            );
        }

        return view('brands.show', compact('brand'));
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
        $brand = $this->repository->find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandUpdateRequest $request
     * @param string             $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect()->route('brand.index')->with('flash_message', 'Cập nhật thương hiệu thành công!');
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
        $this->repository->delete($id);
        return redirect()->back()->with('flash_message', 'Thương hiệu đã xóa thành công!');
    }
}
