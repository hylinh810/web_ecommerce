<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index() 
    {
        $blogs = $this->blogService->getBlog();
        return view('front.blog.index',compact('blogs'));
    }

    public function show($alias) 
    {
        $blog = Blog::where('alias',$alias)->first();
        $latestBlog = Blog::where('published',1)->orderByDesc('id')->take(7)->get();

        return view('front.blog.show',compact('blog','latestBlog'));
    }
}
