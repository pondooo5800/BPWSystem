@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            บันทึกการขายสินค้า
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                {!! Form::open(['novalidate','route' => 'sell.store', 'method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสินค้า</h4>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">รหัสสินค้า</label>
                                                    <select name="product_id" id="product_id" class="form-control dynamic" data-dependent="code" required>
                                                        <option value="" disabled selected>กรุณาเลือกรหัสสินค้า...</option>
                                                            @foreach($product_list as $item_list)
                                                                <option value="{{ $item_list->product_id}}">{{ $item_list->product_id }}</option>
                                                            @endforeach
                                                    </select>
                                                    @if ($errors->has('product_id'))
                                                        <div class="invalid-feedback">{{ $errors->first('product_id') }}</div>
                                                    @endif
                                               </div>
                                               <div class="form-group">
                                                    <label for="exampleSelectGender">โค๊ดสินค้า</label>
                                                        <select name="sell_code" id="code" class="form-control dynamic" data-dependent="name" required>
                                                            <option value="" disabled selected>กรุณาเลือกโค๊ดสินค้า...</option>
                                                        </select>
                                                        @if ($errors->has('sell_code'))
                                                            <div class="invalid-feedback">{{ $errors->first('sell_code') }}</div>
                                                        @endif
                                               </div>
                                               <div class="form-group">
                                                    <label for="exampleSelectGender">ชื่อสินค้า</label>
                                                        <select name="sell_name" id="name" class="form-control" required>
                                                            <option value="" disabled selected>กรุณาเลือกชื่อสินค้า...</option>
                                                        </select>
                                                        @if ($errors->has('sell_name'))
                                                            <div class="invalid-feedback">{{ $errors->first('sell_name') }}</div>
                                                        @endif
                                               </div>
                                               <div class="form-group">
                                                    <label for="exampleInputName3">จำนวนสินค้าที่ขาย</label>
                                                        {{ Form::text('sell_stock', null,['class'=>'form-control stock ','placeholder' => 'จำนวนสินค้าที่ขายทั้งหมด','required']) }}
                                                            @if ($errors->has('sell_stock'))
                                                                <div class="invalid-feedback">{{ $errors->first('sell_stock') }}</div>
                                                            @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName4">ราคาสินค้าที่ขาย</label>
                                                        {{ Form::text('sell_price', null,['class'=>'form-control price ','placeholder' => 'ราคาสินค้าที่ขายทั้งหมด','required']) }}
                                                            @if ($errors->has('sell_price'))
                                                                <div class="invalid-feedback">{{ $errors->first('sell_price') }}</div>
                                                            @endif
                                                </div>
                                               {{ csrf_field() }}
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

        $(document).ready(function(){
        $('.dynamic').change(function(){
        if($(this).val() != '')
        {
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{ route('dynamicdependent.fetch') }}",
        method:"POST",
        data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
            $('#'+dependent).html(result);
        }

        })
        }
        });

        $('#product_id').change(function(){
        $('#code').val('');
        $('#name').val('');
        });

        $('#code').change(function(){
        $('#name').val('');
        });

});
    </script>
@endsection
