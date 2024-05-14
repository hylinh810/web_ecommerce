<?php

namespace App\Service\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Service\BaseService;

class BlogService extends BaseService implements BlogServiceInterface 
{
    public $repository;
    
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->repository = $blogRepository;
    }
    
    public function getBlog() 
    {
        return $this->repository->getBlog();
    }
}