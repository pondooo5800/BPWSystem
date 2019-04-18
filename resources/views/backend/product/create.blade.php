@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            เพิ่มรายการสินค้า
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                {!! Form::open(['novalidate','route' => 'product.store', 'method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสินค้า</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ชื่อสินค้า</label>
                                                {{ Form::text('name', null,['class'=>'form-control ','placeholder' => 'ชื่อสินค้า','required']) }}
                                                    @if ($errors->has('name'))
                                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">โค้ดสินค้า</label>
                                                {{ Form::text('code', null,['class'=>'form-control ','placeholder' => 'โค้ดสินค้า','required']) }}
                                                    @if ($errors->has('code'))
                                                        <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">ประเภทสินค้า</label>
                                                    {{ Form::select('ctrgory_id', App\Category::all()->pluck('category_name','catrgory_id'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกประเภทสินค้า...', 'required']) }}
                                                        @if ($errors->has('ctrgory_id'))
                                                            <div class="invalid-feedback">{{ $errors->first('ctrgory_id') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">จำนวนสินค้า</label>
                                                    {{ Form::text('stock', null,['class'=>'form-control ','placeholder' => 'จำนวนสินค้าทั้งหมด','required']) }}
                                                        @if ($errors->has('stock'))
                                                            <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName4">ราคาสินค้า</label>
                                                        {{ Form::text('price', null,['class'=>'form-control ','placeholder' => 'ราคาสินค้าต่อชิ้น','required']) }}
                                                            @if ($errors->has('price'))
                                                                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                                            @endif
                                                </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('product.index') }}" class="btn btn-light">ยกเลิก</a>
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
