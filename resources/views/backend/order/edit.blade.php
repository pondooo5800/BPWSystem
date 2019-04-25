@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            แก้ไขรายการสั่งซื้อ -> {{$order->product_name}}
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($order, ['name' => 'autoSumForm','novalidate','route' => ['order.update',$order->order_id], 'method' => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสมาชิก</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ชื่อสินค้า</label>
                                                {{ Form::select('product_name', App\Product::all()->pluck('name','name'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกชื่อสินค้า...', 'required']) }}
                                                    @if ($errors->has('product_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('product_name') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">จำนวนสินค้า</label>
                                                    {{ Form::text('qty', null,['onFocus' => 'startCalc();','onBlur' => 'stopCalc();','class'=>'form-control qty ','placeholder' => 'จำนวนสินค้าทั้งหมด','required']) }}
                                                        @if ($errors->has('qty'))
                                                            <div class="invalid-feedback">{{ $errors->first('qty') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName4">ราคาสินค้า (ต่อชิ้น)</label>
                                                    {{ Form::text('price', null,['onFocus' => 'startCalc();','onBlur' => 'stopCalc();','class'=>'form-control price ','placeholder' => 'จำนวนสินค้าทั้งหมด','required']) }}
                                                        @if ($errors->has('price'))
                                                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName4">รวมราคา</label>
                                                    {{ Form::text('total', null,['class'=>'form-control ','placeholder' => 'รวมราคา','required']) }}
                                                            @if ($errors->has('total'))
                                                                <div class="invalid-feedback">{{ $errors->first('total') }}</div>
                                                            @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ผู้ดำเนินการ</label>
                                                {{ Form::select('member_id', App\Member::all()->pluck('name','member_id'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกผู้ดำเนินการ...', 'required']) }}
                                                    @if ($errors->has('member_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('member_id') }}</div>
                                                    @endif
                                            </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('order.index') }}" class="btn btn-light">ยกเลิก</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

@section('footerscript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <script>
        $('.stock').mask("####", {reverse: true});
        $('.price').mask("####", {reverse: true});

        function startCalc(){
            interval = setInterval("calc()",1);
        }
        function calc(){
            one = document.autoSumForm.qty.value;
            two = document.autoSumForm.price.value;

            document.autoSumForm.total.value = (one * 1) * (two * 1);
        }
        function stopCalc(){
            clearInterval(interval);
        }
    </script>
@endsection
