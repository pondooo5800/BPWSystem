<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('product_id','desc')->leftJoin('categories', 'products.ctrgory_id', '=', 'categories.catrgory_id')->paginate(10);

        return view('backend.product.index',[
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
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
        $product->name = $request->name;
        $product->code = $request->code;
        $product->ctrgory_id = $request->ctrgory_id;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index')->with('feedback','บันทึกข้อมูลเรียบร้อยแล้ว');
        // return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->code = $request->code;
        $product->ctrgory_id = $request->ctrgory_id;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index')->with('feedback','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // return $product;
        $product->delete();
        return redirect()->route('product.index')->with('feedback','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
