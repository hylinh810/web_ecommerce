<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;

class ViewShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductCommentServiceInterface $productCommentService,
        ProductCategoryServiceInterface $productCategoryService
    ) {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
    }
    
    // public function index($shop_id){

    //     $product = Product::where('shop_id', $shop_id)->paginate(10);
    //     $categories = Category::where('shop_id', $shop_id)->get();

        
        
    //     return view('front.view_shop.index', compact('product', 'categories'));
    // }

    public function index($shop_id, Request $req)
    {
        $categories = Category::where('shop_id', $shop_id)->get();
        $product = Product::where('shop_id',$shop_id)->get();
        $shop = User::where('id',$shop_id)->first();
        // dd($shop);
        $relatedProducts = Product::inRandomOrder()->limit(6)->get();
        // dd($relatedProducts);
        $coupons = Coupon::where('shop_id', $shop_id)->get();
        // dd($coupons);

        return view('front.view_shop.index', compact('product', 'categories', 'shop', 'relatedProducts', 'coupons'));
    }

    public function category($shop_id, $alias)
    {
        $categories = Category::where('shop_id', $shop_id)->get();

        // Find the category by alias
        $selectedCategory = $categories->firstWhere('alias', $alias);
        // dd($selectedCategory->id);

        // Check if the category is found
        // if (!$selectedCategory || $selectedCategory->published != 1) {
        //     // Handle the case when the category is not found or not published
        //     return redirect()->route('your.redirect.route'); // Adjust the route accordingly
        // }

        // Get products for the selected category
        $product = Product::where('cate_id', $selectedCategory->id)->get();

        // Debugging: Dump the products to check if they are retrieved successfully
        // dd($products);

        $categoryName = $selectedCategory->name;
        $shop = User::where('id', $shop_id)->first();
        $relatedProducts = Product::inRandomOrder()->limit(6)->get();
        $coupons = Coupon::where('shop_id', $shop_id)->get();

        return view('front.view_shop.index', compact('product', 'categories', 'categoryName', 'shop', 'relatedProducts', 'coupons'));
    }



}