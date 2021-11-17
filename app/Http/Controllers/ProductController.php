<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index', ['products' => Product::get()]);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        Product::updateOrCreate(['id' => $request->product_id], [
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
        ]);

        return response()->json(['message' => $request->product_id ? 'Product Updated successfully' : 'Product Created successfully', 'status' => 'Status 200 ']);
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
