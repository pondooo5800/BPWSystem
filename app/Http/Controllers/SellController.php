<?php

namespace App\Http\Controllers;

use App\Sell;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\SellRequest;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = Sell::orderBy('sell_id','desc')->paginate(10);

        return view('backend.sell.index',[
            'sell' => $sell
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_list = DB::table('products')->get();
        return view('backend.sell.create')->with('product_list', $product_list);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellRequest $request)
    {

        $sell = new Sell();
        $sell->product_id = $request->product_id;
        $sell->sell_code = $request->sell_code;
        $sell->sell_name = $request->sell_name;
        $sell->sell_stock = $request->sell_stock;
        $sell->sell_price = $request->sell_price;
        $sell->save();

        return redirect()->route('sell.index')->with('feedback','บันทึกข้อมูลเรียบร้อยแล้ว');
        // return $sell;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        return view('backend.sell.edit',[
            'sell' => $sell
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        $sell->product_id = $request->product_id;
        $sell->sell_code = $request->sell_code;
        $sell->sell_name = $request->sell_name;
        $sell->sell_stock = $request->sell_stock;
        $sell->sell_price = $request->sell_price;

        $sell->save();
        return redirect()->route('sell.index')->with('feedback','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        $sell->delete();
        return redirect()->route('sell.index')->with('feedback','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
