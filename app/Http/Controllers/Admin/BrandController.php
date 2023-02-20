<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandCatalogRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     *
     * @param BrandCatalogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCatalogRequest $request)
    {
        $data = $request->all();
        $brand = Brand::create($data);
        return redirect()
            ->route('admin.brand.show', ['brand' => $brand->id])
            ->with('success', 'New brand was created');
    }

    /**
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    /**
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandCatalogRequest $request, Brand $brand)
    {
        $data = $request->all();
        $brand->update($data);
        return redirect()
            ->route('admin.brand.show', ['brand' => $brand->id])
            ->with('success', 'Brand was edited');
    }

    /**
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->products->count()) {
            return back()->withErrors('Error! Brand has items');
        }
        $brand->delete();
        return redirect()
            ->route('admin.brand.index')
            ->with('success', 'Brand was deleted');
    }
}
