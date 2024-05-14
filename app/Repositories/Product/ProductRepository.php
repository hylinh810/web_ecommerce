<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use App\Repositories\BaseRepositories;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getRelatedProducts($product, $limit = 8)
    {
        return $this->model->where('cate_id', $product->cate_id)->where('published', 1)->limit($limit)->get();
    }

    public function getFeaturedProducts()
    {
        return $this->model->where('featured', 1)->where('published', 1)->limit(9)->get();
    }

    public function getProductOnIndex($req)
    {
        $search = $req->search ?? '';

        $products = $this->model->where('product_name', 'like', '%' . $search . '%')->where('published', 1);

        $products = $this->filter($products, $req);

        $products = $this->sortAndPagination($products, $req);
        return $products;
    }

    public function getProductByCategory($alias, $req)
    {
        $search = $req->search ?? '';
        $products = Industry::where('alias', $alias)->first()->products->toQuery();
        $products = $products->where('product_name', 'like', '%' . $search . '%')->where('published', 1);
        $products = $this->filter($products, $req);
        $products = $this->sortAndPagination($products, $req);

        return $products;
    }
    public function getProductByIndustry($alias, $req)
    {
        $search = $req->search ?? '';
        $products = Industry::where('alias', $alias)->first()->products->toQuery();
        $products = $products->where('product_name', 'like', '%' . $search . '%')->where('published', 1);
        $products = $this->filter($products, $req);
        $products = $this->sortAndPagination($products, $req);

        return $products;
    }

    private function sortAndPagination($products, $req)
    {
        $perPage = 12;
        $sortBy = $req->sort_by ?? 'latest';
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('product_name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('product_name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderByDesc('id');
        }

        $products = $products->paginate($perPage);
        $products->append(['sort_by' => $sortBy]);
        return $products;
    }

    private function filter($products, Request $req)
    {
        $priceMin = $req->min_price;
        $priceMax = $req->max_price;
        $priceMin = str_replace('₫', '', $priceMin);
        $priceMax = str_replace('₫', '', $priceMax);

        $priceMin = join('', explode(".", $priceMin));
        $priceMax = join('', explode(".", $priceMax));

        $products = ($priceMin != null && $priceMax != null)
            ? $products->whereBetween('price', [$priceMin, $priceMax])
            : $products;

        return $products;
    }
}