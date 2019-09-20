<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    /**
     * @param  $products
     * @return mixed
     */
    public function setRoundPrice($products);

    /**
     * @param  $productImages
     * @param  $productId
     * @param  $imagePrimary
     * @return mixed
     */
    public function createProductImage($productImages, $productId, $imagePrimary);

}
