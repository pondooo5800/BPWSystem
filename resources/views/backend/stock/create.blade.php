@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            เพิ่มรายการรับสินค้า
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                {!! Form::open(['novalidate','route' => 'stock.store', 'method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการรับสินค้า</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">รหัสสินค้า</label>
                                                {{ Form::select('product_id', App\Product::all()->pluck('product_id','product_id'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกรหัสสินค้า...', 'required']) }}
                                                    @if ($errors->has('product_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('product_id') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">จำนวนสินค้า</label>
                                                    {{ Form::text('qty', null,['class'=>'form-control qty ','placeholder' => 'จำนวนสินค้าทั้งหมด','required']) }}
                                                        @if ($errors->has('qty'))
                                                            <div class="invalid-feedback">{{ $errors->first('qty') }}</div>
                                                        @endif
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="exampleInputName1">จำนวนสินค้า</label>
                                                {{ Form::select('qty', App\Product::all()->pluck('stock','stock'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกจำนวนสินค้า...', 'required']) }}
                                                    @if ($errors->has('product_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('product_id') }}</div>
                                                    @endif
                                            </div> --}}
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('stock.index') }}" class="btn btn-light">ยกเลิก</a>
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
        $('.qty').mask("####", {reverse: true});
    </script>
@endsection
