<?php

namespace App\Service\ProductIndustry;

use App\Repositories\ProductIndustry\ProductIndustryRepositoryInterface;
use App\Service\BaseService;

class ProductIndustryService extends BaseService implements ProductIndustryServiceInterface 
{
    public $repository;
    
    public function __construct(ProductIndustryRepositoryInterface $productIndustryRepository)
    {
        $this->repository = $productIndustryRepository;
    }
}