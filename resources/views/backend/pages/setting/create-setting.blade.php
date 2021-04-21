@extends('backend.layout.master')
@section('title','Quản Trị Landing Page')
@section('title_page','Thêm Landing Page')
@section('content')
<section class="content" style="margin:0;">
    <form enctype="multipart/form-data" class="" action="{{ route('setting.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Thay logo</label> <br>
                <input value="{{ old('logo') }}" type="file" name="logo"> <br>
                {!! ShowErrors($errors,'logo') !!}
            </div>
            <div class="form-group">
                <label for="">Slogan</label>
                <input type="text" class="form-control" name="slogan" value="{{ old('slogan') }}">
                {!! ShowErrors($errors,'slogan') !!}
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                {!! ShowErrors($errors,'address') !!}
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value=" {{ old('email') }} ">
                {!! ShowErrors($errors,'email') !!}
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                {!! ShowErrors($errors,'phone') !!}
            </div>
            <div class="form-group">
                <label for="">Thay banner</label> <br>
                <input type="file" class="form-control" name="banner">
                {!! ShowErrors($errors,'banner') !!}
            </div>
            <div class="form-group">
                <label for="">Welcome</label>
                <input type="text" class="form-control" name="welcome" value="{{ old('welcome') }}">
                {!! ShowErrors($errors,'welcome') !!}
            </div>
            <div class="form-group">
                <label for="">Welcome content</label>
                <textarea rows="20" name="content" class="" placeholder="Nhập nội dung vào đây"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{ old('welcome_content') }}</textarea>
               </div>
                {!! ShowErrors($errors,'welcome_content') !!}
            </div>
            <div class="form-group">
                <label for="">Thay ảnh welcome</label> <br>
                <input type="file" class="form-control" name="welcome_image">
                {!! ShowErrors($errors,'welcome_image') !!}
            </div>

            <div class="form-group">
                <label for="">Thay Ảnh Breadcrumb</label> <br>
                <input type="file" class="form-control" name="breadcrumb">
                {!! ShowErrors($errors,'breadcrumb') !!}
            </div>

            <div class="form-group">
                <label for="">Fanpage</label><br>
                <input type="text" class="form-control" name="fanpage" value="{{ old('fanpage') }}">
                {!! ShowErrors($errors,'fanpage') !!}
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>
@endsection