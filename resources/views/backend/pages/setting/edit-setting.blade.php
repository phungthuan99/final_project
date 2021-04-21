@extends('backend.layout.master')
@section('title','Quản Trị Landing Page')
@section('title_page','Sửa Landing Page')
@section('content')
<section class="content" style="margin:0;">
    <form role="form" method="POST" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
        <div class="form-group">
                <label for="">Logo</label> <br>
                <img src="storage/{{ $setting->logo }}" width="30%" alt="">
            </div>
            <div class="form-group">
                <label for="">Thay logo</label> <br>
                <input type="file" name="logo">
                {!! ShowErrors($errors,'logo') !!}
            </div>
            <div class="form-group">
                <label for="">Slogan</label>
                <input type="text" class="form-control" name="slogan" value="{{ $setting->slogan }}">
                {!! ShowErrors($errors,'slogan') !!}
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $setting->email }}">
                {!! ShowErrors($errors,'email') !!}
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}">
                {!! ShowErrors($errors,'phone') !!}
            </div>
            <div class="form-group">
                <label for="">Banner</label><br>
                <img width="30%" src="storage/{{$setting->banner}}" alt="">
            </div>
            <div class="form-group">
                <label for="">Thay banner</label> <br>
                <input type="file" class="form-control" name="banner">
                {!! ShowErrors($errors,'banner') !!}
            </div>
            <div class="form-group">
                <label for="">Welcome</label>
                <input type="text" class="form-control" name="welcome" value="{{ $setting->welcome }}">
                {!! ShowErrors($errors,'welcome') !!}
            </div>
            <div class="form-group">
                <label for="">Welcome content</label>
                <textarea rows="20" name="welcome_content" class="" placeholder="Nhập nội dung vào đây"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{ $setting->welcome_content }} </textarea>
               </div>
                {!! ShowErrors($errors,'welcome_content') !!}
            </div>
            <div class="form-group">
                <label for="">Ảnh welcome</label><br>
                <img width="30%" src="storage/{{$setting->welcome_image}}" alt="">
            </div>
            <div class="form-group">
                <label for="">Thay ảnh</label> <br>
                <input type="file" class="form-control" name="welcome_image">
                {!! ShowErrors($errors,'welcome_image') !!}
            </div>

            <div class="form-group">
                <label for="">Ảnh Breadcrumb</label><br>
                <img width="30%" src="storage/{{$setting->breadcrumb}}" alt="">
            </div>

            <div class="form-group">
                <label for="">Thay Ảnh Breadcrumb</label> <br>
                <input type="file" class="form-control" name="breadcrumb">
                {!! ShowErrors($errors,'breadcrumb') !!}
            </div>

            <div class="form-group">
                <label for="">Fanpage</label><br>
                {!!$setting->fanpage!!}
                <input type="text" class="form-control" name="fanpage" value="{{ $setting->fanpage }}">
                {!! ShowErrors($errors,'fanpage') !!}
            </div>
            
        </div>
        <div class="card-footer">
            <a href="{{route('setting.index')}}" class="btn btn-danger">Quay lại</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</section>
@endsection