@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            แก้ไขรายการขายสินค้า -> {{$sell->sell_code}}
        </h3>
    </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($sell, ['novalidate','route' => ['sell.update',$sell->sell_id], 'method' => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสินค้า</h4>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">รหัสสินค้า</label>
                                                    {{ Form::select('product_id', App\Product::all()->pluck('product_id','product_id'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกรหัสสินค้า...', 'required','data-live-search="true"']) }}
                                                        @if ($errors->has('product_id'))
                                                            <div class="invalid-feedback">{{ $errors->first('product_id') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleSelectGender">โค๊ดสินค้า</label>
                                                        {{ Form::select('sell_code', App\Product::all()->pluck('code','code'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกโค๊ดสินค้า...', 'required','data-live-search="true"']) }}
                                                            @if ($errors->has('sell_code'))
                                                                <div class="invalid-feedback">{{ $errors->first('sell_code') }}</div>
                                                            @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleSelectGender">ชื่อสินค้า</label>
                                                        {{ Form::select('sell_name', App\Product::all()->pluck('name','name'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกชื่อสินค้า...', 'required','data-live-search="true"']) }}
                                                            @if ($errors->has('sell_name'))
                                                                <div class="invalid-feedback">{{ $errors->first('sell_name') }}</div>
                                                            @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName2">จำนวนสินค้าที่ขาย</label>
                                                    {{ Form::text('sell_stock', null,['class'=>'form-control ','placeholder' => 'จำนวนสินค้าที่ขาย','required']) }}
                                                        @if ($errors->has('sell_stock'))
                                                            <div class="invalid-feedback">{{ $errors->first('sell_stock') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName2">ราคาสินค้าที่ขาย</label>
                                                    {{ Form::text('sell_price', null,['class'=>'form-control ','placeholder' => 'ราคาสินค้าที่ขาย','required']) }}
                                                        @if ($errors->has('sell_price'))
                                                            <div class="invalid-feedback">{{ $errors->first('sell_price') }}</div>
                                                        @endif
                                            </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('sell.index') }}" class="btn btn-light">ยกเลิก</a>
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
</script>
@endsection
