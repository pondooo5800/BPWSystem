@extends('layouts.frontend')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-library-plus"></i>
            </span>
            เพิ่มผู้ใช้งาน
        </h3>
    </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                        <div class="col-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title">ผู้ใช้งาน</h4>
                                            <div class="form-group">
                                                <label for="exampleInputName1">ชื่อบัญชีผู้ใช้งาน/เลขประจำตัว</label>
                                                <input id="username" type="text" placeholder="ชื่อบัญชีผู้ใช้งาน/เลขประจำตัว" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="password">รหัสผ่าน</label>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="password">ยืนยันรหัสผ่าน</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputName3">ชื่อ - นามสกุล</label>
                                                    <input id="name" type="text"  placeholder="ชื่อ - นามสกุล" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                    <label for="exampleInputName4">อีเมล</label>
                                                    <input id="email" type="email" placeholder="อีเมล" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputName4">เบอร์โทรศัพท์</label>
                                                    <input id="tel" type="text" placeholder="เบอร์โทรศัพท์" maxlength="10" class="form-control tel{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>

                                                    @if ($errors->has('tel'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('tel') }}</strong>
                                                        </span>
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
