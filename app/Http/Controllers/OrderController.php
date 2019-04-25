<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::orderBy('order_id','desc')->leftJoin('members', 'orders.order_id', '=', 'members.member_id')->paginate(10);

        return view('backend.order.index',[
            'order' => $order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order();
        $order->product_name = $request->product_name;
        $order->qty = $request->qty;
        $order->price = $request->price;
        $order->total = $request->total;
        $order->member_id = $request->member_id;

        $order->save();
        return redirect()->route('order.index')->with('feedback','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('backend.order.edit',[
            'order' => $order
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->product_name = $request->product_name;
        $order->qty = $request->qty;
        $order->price = $request->price;
        $order->total = $request->total;
        $order->member_id = $request->member_id;
        $order->save();

        return redirect()->route('order.index')->with('feedback','แก้ไขข้อมูลเรียบร้อยแล้ว');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('feedback','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
