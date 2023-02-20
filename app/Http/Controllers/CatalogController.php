<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $brands = Brand::popular();
        return view('catalog.index', compact('brands'));
    }


    public function brand(Brand $brand, ProductFilterRequest $filters)
    {
        $products = $brand
            ->products() // возвращает построитель запроса
            ->filterProducts($filters)
            ->paginate(6)
            ->withQueryString();
        return view('catalog.brand', compact('brand', 'products'));
    }

    public function product(Product $product)
    {
        return view('catalog.product', compact('product'));
    }

    public function search(Request $request)
    {
        $search = $request->input('query');
        $query = Product::search($search);
        $products = $query->paginate(6)->withQueryString();
        return view('catalog.search', compact('products', 'search'));
    }

    public function contact()
    {
        return view('catalog.contact');
    }
}
