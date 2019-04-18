@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white mr-2">
            <i class="mdi mdi-library-plus"></i>
        </span>
        เพิ่มรายการประเภทสินค้า
    </h3>

    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                            {!! Form::open(['novalidate','route' => 'category.store', 'method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">รายการประเภทสินค้า</h4>
                                    <div class="form-group">
                                        <label for="exampleInputName1">ชื่อประเภทสินค้า</label>
                                        {{ Form::text('category_name', null,['class'=>'form-control ','placeholder' => 'ชื่อประเภทสินค้า','required']) }}
                                            @if ($errors->has('category_name'))
                                                <div class="invalid-feedback">{{ $errors->first('category_name') }}</div>
                                            @endif
                                    </div>
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
