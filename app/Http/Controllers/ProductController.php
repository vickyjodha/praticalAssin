<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.product')
            ->with('productes', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create')
            ->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->slug = str::slug($request->title);
        $product->gallery = $request->gallery->store('gallery');
        $product->image = $request->image->store('images');
        $product->description = $request->description;
        $product->status = $request->status ?? 0;
        $product->featured = $request->featured ?? 0;
        $product->save();
        $product->categoryes()->sync($request->categories);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findorFail($id);
        return view('product.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findorFail($id);
        $product->title = $request->title;
        $product->slug = str::slug($request->title);
        if ($request->hasFile('image')) {
            $image = $request->image->store('images');

            Storage::delete($product->image);
            $product['image'] = $image;
        }
        if ($request->hasFile('gallery')) {
            $gallery = $request->image->store('gallery');

            Storage::delete($product->gallery);
            $product['gallery'] = $gallery;
        }

        $product->description = $request->description;
        $product->status = $request->status ?? 0;
        $product->featured = $request->featured ?? 0;
        $product->save();
        if ($request->categories) {
            $product->categoryes()->sync($request->categories);
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Product::findorFail($id);
        Storage::delete($category->image);
        Storage::delete($category->gallery);
        $category->delete();
        return back();
    }
}
