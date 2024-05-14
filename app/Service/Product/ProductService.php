<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface 
{
    public $repository;
    
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find(int $id)
   {
        $product = $this->repository->find($id);
        return $product;
   }

   public function getRelatedProducts($product,$limit = 4) {
        return $this->repository->getRelatedProducts($product,$limit);
   }

   public function getFeaturedProducts()
   {
        return $this->repository->getFeaturedProducts();
   }

   public function getProductOnIndex($req)
   {
     return $this->repository->getProductOnIndex($req);
   }

   public function getProductByCategory($alias, $req)
   {
     return $this->repository->getProductByCategory($alias, $req);
   }
}