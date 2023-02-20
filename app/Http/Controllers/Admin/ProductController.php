<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatalogRequest;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Http\Response
     */


    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.product.create', compact('brands'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCatalogRequest $request)
    {
        $request->merge([
            'new' => $request->has('new'),
            'hit' => $request->has('hit'),
            'sale' => $request->has('sale'),
        ]);
        $data = $request->all();
        $product = Product::create($data);
        return redirect()
            ->route('admin.product.show', ['product' => $product->id])
            ->with('success', 'Item was created');
    }

    /**
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'brands'));
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCatalogRequest $request, Product $product)
    {
        $request->merge([
            'new' => $request->has('new'),
            'hit' => $request->has('hit'),
            'sale' => $request->has('sale'),
        ]);
        $data = $request->all();
        $product->update($data);
        return redirect()
            ->route('admin.product.show', ['product' => $product->id])
            ->with('success', 'Item was update');
    }

    /**
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('admin.catalog.index')
            ->with('success', 'Item was deleted');
    }
}
