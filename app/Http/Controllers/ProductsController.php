<?php

namespace App\Http\Controllers;

use App\Constant\VRSConst;
use App\Repositories\BrandRepository;
use App\Repositories\ProductGroupRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductGroupRepository
     */
    protected $productGroupRepository;

    /**
     * @var BrandRepository
     */
    protected $brandRepository;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository      $repository
     * @param ProductGroupRepository $productGroupRepository
     * @param BrandRepository        $brandRepository
     */
    public function __construct(
        ProductRepository $repository,
        ProductGroupRepository $productGroupRepository,
        BrandRepository $brandRepository
    ) {
        $this->repository = $repository;
        $this->productGroupRepository = $productGroupRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->repository->all();
        $this->repository->setRoundPrice($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $productGroups = $this->productGroupRepository->all();
        $brands = $this->brandRepository->all();
        return view('admin.product.create', compact('productGroups', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     *
     * @return Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = $this->repository->create($request->all());
        $this->repository->createProductImage([$request->file('product_primary_image')], $product->id, VRSConst::IMAGE_IS_PRIMARY);
        if ($request->hasFile('product_image')) {
            $this->repository->createProductImage($request->file('product_image'), $product->id, VRSConst::IMAGE_IS_NOT_PRIMARY);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        return view('admin.product.show', compact('product'));
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
        $product = $this->repository->find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param string               $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Product updated.',
                'data' => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json(
                    [
                        'error' => true,
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
     * @return Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json(
                [
                    'message' => 'Product deleted.',
                    'deleted' => $deleted,
                ]
            );
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }
}
