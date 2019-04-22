@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            เพิ่มรายการสมาชิก
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                {!! Form::open(['novalidate','route' => 'member.store', 'method' => 'post', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">รายการสมาชิก</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">รหัสประจำตัวนักเรียน</label>
                                                {{ Form::text('code', null,['class'=>'form-control code ','placeholder' => 'รหัสประจำตัวนักเรียน','required']) }}
                                                    @if ($errors->has('code'))
                                                        <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2">ชื่อ - นามสกุล</label>
                                                {{ Form::text('name', null,['class'=>'form-control ','placeholder' => 'ชื่อ - นามสกุล','required']) }}
                                                    @if ($errors->has('name'))
                                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectGender">เพศ</label>
                                                    {{ Form::select('gender', App\Gender::all()->pluck('gender_name','gender_id'), null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกเพศ...', 'required']) }}
                                                        @if ($errors->has('gender'))
                                                            <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                                                        @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">จำนวนครั้งที่ใช้บริการ</label>
                                                    {{ Form::text('total', null,['class'=>'form-control total ','placeholder' => 'จำนวนครั้งที่ใช้บริการ','required']) }}
                                                        @if ($errors->has('total'))
                                                            <div class="invalid-feedback">{{ $errors->first('total') }}</div>
                                                        @endif
                                            </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('member.index') }}" class="btn btn-light">ยกเลิก</a>
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
        $('.total').mask("####", {reverse: true});
        $('.code').mask("####", {reverse: true});

    </script>
@endsection
