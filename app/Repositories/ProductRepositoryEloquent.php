<?php

namespace App\Repositories;

use App\Entities\ProductImage;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductRepository;
use App\Entities\Product;
use App\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @param  $products
     * @return mixed|void
     */
    public function setRoundPrice($products)
    {
        foreach ($products as $product) {
            $price = $product->price;
            $promotionPrice = $product->promotion_price;
            $percentPromotion = ($promotionPrice / $price) * 100;
            $product->price = number_format($price, 0, '.', '.');
            $product->promotion_price = number_format($promotionPrice, 0, '.', '.')
                . ' ( - ' . (100 - $percentPromotion) . '% ) ';
        }
        return $products;
    }

    /**
     * @param  $productImages
     * @param  $productId
     * @param  $imagePrimary
     * @return mixed|void
     */
    public function createProductImage($productImages, $productId, $imagePrimary)
    {
        $images = [];
        foreach ($productImages as $productImage) {
            $extension = $productImage->getClientOriginalExtension();
            preg_match('/.([0-9]+) /', microtime(), $m);
            $fileName = sprintf('img%s%s_%s.%s', date('YmdHis'), $m[1], mt_rand(), $extension);
            $storage = Storage::disk('public');
            $checkDirectory = $storage->exists('product_image');
            if (!$checkDirectory) {
                $storage->makeDirectory('product_image');
            }
            $storage->put('product_image/' . $fileName, file_get_contents($productImage), 'public');
            $images[] = [
                'product_id' => $productId,
                'path' => $fileName,
                'product_primary_image' => $imagePrimary
            ];
        }
        ProductImage::insert($images);
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
