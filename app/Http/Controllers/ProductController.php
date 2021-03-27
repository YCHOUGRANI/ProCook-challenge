<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //return Product::all();
        //return ProductResource::collection(Product::all());

        return ProductResource::collection($category->products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();

        return response([
            'data' => new Productresource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show($article_id, $product_id)
    {
        //return new ProductResource($product);
        $product = Product::findOrFail($product_id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->update($request->all());
        return response([
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
        return response(null, 204);
    }
}
