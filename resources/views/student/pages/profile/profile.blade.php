@extends('student.layout.master')
@section('title','Thông tin cá nhân')

@section('content')
    <div class="container-fluid">
       <div class="row">
            <div class="col-4">
                <div class="profile__inner">
                    <div class="profile__inner-head">
                        <div class="avatar">
                            <img src="/storage/{{Auth::guard('student')->user()->avatar}}" alt="student avatar">
                        </div>
                        <div class="info">
                            <h4>{{$profile->fullname}}</h4>
                            <p>Học viên</p>
                        </div>
                    </div>
                    <div class="profile__inner-body">
                    <p><span>Email:</span> <span>{{$profile->email}}</span></p>
                    <p><span>Số điện thoại:</span> <span>{{$profile->phone}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card profile__detail">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin cá nhân</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Họ và tên</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" value="{{$profile->fullname}}" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-md-2 col-form-label">Mã Học Viên</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{$profile->code}}" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-md-2 col-form-label">Ngày sinh</label>
                            <div class="col-md-10">
                            <input class="form-control" type="date" value="{{$profile->date_of_birth}}" id="example-date-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" value="{{$profile->email}}" id="example-email-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-md-2 col-form-label">Số điện thoại</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{$profile->phone}}" id="example-tel-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-md-2 col-form-label">Địa Chỉ</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{$profile->address}}" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-md-2 col-form-label">Ngày Nhập Học</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{$profile->created_at->format('d-m-Y')}}" id="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection