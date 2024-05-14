<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;
class BlogRepository extends BaseRepositories implements BlogRepositoryInterface 
{
    public function getModel() 
    {
        return Blog::class;
    }

    public function getBlog() 
    {
        $blogs = $this->model->where('published',1)->orderByDesc('id')->paginate(6);
        return $blogs;
    }
}