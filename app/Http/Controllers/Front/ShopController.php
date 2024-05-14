<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\Rating;
use App\Models\Industry;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductIndustry\ProductIndustryServiceInterface;
use App\Service\ProductIndustry\ProductIndustryService;
use App\Service\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productIndustryService;

    public function __construct(
        ProductServiceInterface $productService, 
        ProductCommentServiceInterface $productCommentService,
        ProductIndustryServiceInterface $productIndustryService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productIndustryService = $productIndustryService;
    }

    public function show($alias) 
    {
        // $product = $this->productService->find($id);
        
        $product = Product::where('alias',$alias)->first();
        $shop = $product->shop;
        // dd($shop);
        $relatedProduct = $this->productService->getRelatedProducts($product);

        $ratings = Rating::where('product_id', $product->id)->get();
        // dd($ratings);
        
        // $comment = ProductComment::where('product_id', $product->id)->get();
        // $ratingsAndComments = Rating::where('product_id', $product->id)
        // ->select('rating', 'user_id', 'product_id', 'timestamps')
        // ->get()
        // ->concat(
        //     ProductComment::where('product_id', $product->id)
        //         ->select('comment', 'user_id', 'product_id', 'create_date')
        //         ->get()
        // )
        //     ->sortByDesc('timestamps');
        // dd($ratingsAndComments);
        $averageRating = $ratings->isNotEmpty() ? $ratings->avg('rating') : 0;
        // $averageRating = $product->ratings->avg('rating');
        // dd($shop);
        return view('front.shop.show',compact('product','relatedProduct', 'shop', 'averageRating',  'ratings'));
    }

    // public function rateProduct(Request $request, $productId)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'rating' => 'required|numeric|min:1|max:5',
    //         'comment' => 'nullable|string|max:255',
    //     ]);

    //     // Check if the user has purchased the product using the CheckPurchase middleware
    //     // This can be done in the middleware or here based on your specific logic

    //     // Save the rating
    //     $rating = new Rating();
    //     $rating->user_id = auth()->id();
    //     $rating->product_id = $productId;
    //     $rating->rating = $request->input('rating');
    //     $rating->save();

    //     // Save the comment
    //     if ($request->filled('comment')) {
    //         $comment = new ProductComment();
    //         $comment->user_id = auth()->id();
    //         $comment->product_id = $productId;
    //         $comment->content = $request->input('comment');
    //         $comment->save();
    //     }

    //     // Optionally, you can redirect back to the product page with a success message
    //     return redirect()->route('front.shop.show', ['id' => $productId])->with('success', 'Rating and comment submitted successfully.');
    // }
    

    public function postComment(Request $req) 
    {
        $this->productCommentService->create($req->all());
    }

    public function loadComment($id)
    {
        $comment = $this->productService->find($id)->productComment;
        return view('ajax.product_comment',compact('comment'));
    }

    public function index(Request $req) 
    {
        $categories = $this->productIndustryService->all();
        $products = $this->productService->getProductOnIndex($req);

        return view('front.shop.index',compact('products','categories'));
    }

    public function category($alias, Request $req)
    {
        $categories = $this->productIndustryService->all();
        // dd($categories);
        $products = $this->productService->getProductByCategory($alias,$req);
        // dd($products);
        $categoryName = Industry::where('alias',$alias)->first()->name;

        return view('front.shop.index',compact('products','categories','categoryName'));
    }
}