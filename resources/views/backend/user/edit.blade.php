@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            แก้ไขผู้ใช้งาน -> {{$user->username}}
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($user, ['novalidate','route' => ['user.update',$user->id], 'method' => 'put', 'files' => true,'class'=> ($errors->any()) ? 'was-validated' : 'needs-validation']) !!}
                                        <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title">ผู้ใช้งาน</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ชื่อบัญชีผู้ใช้งาน/เลขประจำตัว</label>
                                                {{ Form::text('username', null,['class'=>'form-control ','placeholder' => 'ชื่อบัญชีผู้ใช้งาน/เลขประจำตัว','required']) }}
                                                @if ($errors->has('username'))
                                                    <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="password">รหัสผ่าน</label>
                                                {{ Form::password('password', array('id' => 'password', "class" => "form-control")) }}
                                                @if ($errors->has('password'))
                                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="password">ยืนยันรหัสผ่าน</label>
                                                    {{ Form::password('password-confirm', array('id' => 'password-confirm', "class" => "form-control")) }}
                                                    @if ($errors->has('password-confirm'))
                                                        <div class="invalid-feedback">{{ $errors->first('password-confirm') }}</div>
                                                    @endif
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">ชื่อ - นามสกุล</label>
                                                    {{ Form::text('name', null,['class'=>'form-control ','placeholder' => 'ชื่อ - นามสกุล','required']) }}
                                                    @if ($errors->has('name'))
                                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName4">อีเมล</label>
                                                    {{ Form::text('email', null,['class'=>'form-control ','placeholder' => 'อีเมล','required']) }}
                                                        @if ($errors->has('email'))
                                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                                        @endif
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputName4">เบอร์โทรศัพท์</label>
                                                    {{ Form::text('tel', null,['class'=>'form-control tel','maxlength'=>"10",'placeholder' => 'เบอร์โทรศัพท์','required']) }}
                                                        @if ($errors->has('tel'))
                                                            <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                                                        @endif
                                            </div>
                                                <br>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-gradient-primary mr-2">บันทึก</button>
                                                <a href="{{ route('user.index') }}" class="btn btn-light">ยกเลิก</a>
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
    $('.tel').mask("##########", {reverse: true});
</script>
@endsection
