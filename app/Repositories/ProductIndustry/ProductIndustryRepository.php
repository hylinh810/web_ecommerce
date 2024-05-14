<?php

namespace App\Repositories\ProductIndustry;

use App\Models\Industry;
use App\Repositories\BaseRepositories;

class ProductIndustryRepository extends BaseRepositories implements ProductIndustryRepositoryInterface 
{
    public function getModel() 
    {
        return Industry::class;
    }    
}