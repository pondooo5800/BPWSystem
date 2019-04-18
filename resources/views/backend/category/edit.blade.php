@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            แก้ไขรายการประเภทสินค้า-> {{$category->category_name}}
        </h3>
    </div>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($category, ['novalidate','route' => ['category.update',$category->catrgory_id], 'method' => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสินค้า</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ชื่อประเภทสินค้า</label>
                                                {{ Form::text('category_name', null,['class'=>'form-control ','placeholder' => 'ชื่อประเภทสินค้า','required']) }}
                                                    @if ($errors->has('category_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('category_name') }}</div>
                                                    @endif
                                            </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('category.index') }}" class="btn btn-light">ยกเลิก</a>
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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $('select').selectpicker();
</script>
@endsection
