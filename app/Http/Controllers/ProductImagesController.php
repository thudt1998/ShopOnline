<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductImageCreateRequest;
use App\Http\Requests\ProductImageUpdateRequest;
use App\Repositories\ProductImageRepository;
use App\Validators\ProductImageValidator;

/**
 * Class ProductImagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductImagesController extends Controller
{
    /**
     * @var ProductImageRepository
     */
    protected $repository;

    /**
     * @var ProductImageValidator
     */
    protected $validator;

    /**
     * ProductImagesController constructor.
     *
     * @param ProductImageRepository $repository
     * @param ProductImageValidator $validator
     */
    public function __construct(ProductImageRepository $repository, ProductImageValidator $validator)
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
        $productImages = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productImages,
            ]);
        }

        return view('productImages.index', compact('productImages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductImageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductImageCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $productImage = $this->repository->create($request->all());

            $response = [
                'message' => 'ProductImage created.',
                'data'    => $productImage->toArray(),
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
        $productImage = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productImage,
            ]);
        }

        return view('productImages.show', compact('productImage'));
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
        $productImage = $this->repository->find($id);

        return view('productImages.edit', compact('productImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductImageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductImageUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productImage = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProductImage updated.',
                'data'    => $productImage->toArray(),
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
                'message' => 'ProductImage deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductImage deleted.');
    }
}
