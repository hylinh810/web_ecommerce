<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Industry;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Rating;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function fetchDataFromFlaskAPI($user_id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:5000/api/recommendations";

        // Only include user_id parameter if it is not null
        if ($user_id !== null) {
            $url .= "?user_id=$user_id";
        }

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        // dd($data);
        return $data;
    }

    public function index()
    {
        $user_id = Auth::check() ? Auth::user()->id : null;

        $featuredProducts = $this->productService->getFeaturedProducts();
        $discountProducts = Product::where('discount', '>', 0)->orderByDesc('id')->get();
        $newProduct = Product::orderByDesc('id')->get();
        $randomProduct = Product::inRandomOrder()->limit(6)->get();
        $categories = Category::get();
        $industries = Industry::get();
        $posters = Poster::latest()->limit(3)->get();

        $flaskData = $this->fetchDataFromFlaskAPI($user_id);
        // dd($flaskData);

        $productDetails = [];

        foreach ($flaskData['top_ratings'] as $item) {
            $productId = $item['productId'];
            $product = Product::find($productId);

            if ($product) {
                $productDetails[] = [
                    'avg_rating' => $item['avg_rating'],
                    'productId' => $productId,
                    'rating_count' => $item['rating_count'],
                    'image' => $product->productImage[0]->path,
                    'price' => $product->price,
                    'product_name' => $product->product_name,
                    'alias' => $product->alias,
                    'discount' => $product->discount,
                ];
            }
        }

        $productRecommend = [];
        if (isset($flaskData['recommendations'])) {

            foreach ($flaskData['recommendations'] as $productId) {
                // $productId = $item['productId'];
                $product = Product::find($productId);

                if ($product) {
                    $productRecommend[] = [
                        'avg_rating' => $item['avg_rating'],
                        'productId' => $productId,
                        'rating_count' => $item['rating_count'],
                        'image' => $product->productImage[0]->path,
                        'price' => $product->price,
                        'product_name' => $product->product_name,
                        'alias' => $product->alias,
                        'discount' => $product->discount,
                    ];
                }
            }
        }
        // dd($productRecommend);

        return view('front.index', compact(
            'productDetails',
            'discountProducts',
            'newProduct',
            'randomProduct',
            'categories',
            'industries',
            'posters',
            'productRecommend'
        ));
    }


    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function sendContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back()->with('success', 'Bạn đã gửi liên hệ thành công!');
    }

    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('front.login');
    }

    public function viewSignup()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('front.signup');
    }
}