@extends('student.layout.master')
@section('title','Đổi mật khẩu')
@section('content')
    <div class="container-fluid">
       <div class="row">
            <div class="col-8">
                <div class="card profile__detail">
                    <div class="card-body">
                        @if(session('thongbao'))
                        <div class="alert alert-primary text-center" role="alert">
                            {{session('thongbao') }}
                        </div>
                        @endif
                        <h4 class="card-title">Đổi mật khẩu</h4>
                        <form action="{{route('student-password.update',"$student->id")}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group row">
                                <label for="new-pass-input" class="col-md-2 col-form-label">Mật khẩu mới</label> <br>
                                <div class="col-md-10">
                                    <input class="form-control" name="password" type="password" id="new-pass-input">
                                {!! ShowErrors($errors,'password') !!}

                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="cf-pass-input" class="col-md-2 col-form-label">Xác nhận mật khẩu</label><br>
                                <div class="col-md-10">
                                <input class="form-control" name="cfpassword" type="password" id="cf-pass-input">
                                {!! ShowErrors($errors,'cfpassword') !!}

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection