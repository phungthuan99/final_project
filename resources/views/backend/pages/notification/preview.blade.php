@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Xác Nhận Thông Báo')
@section('content')

<div class="col-12">
<form action="{{ route('notifications.update',"1") }}" method="POST">
    @csrf
    @method('PUT')
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif

    @if(session('error'))
    <span style='color: red'>{{session('error')}}</span>
    @endif

    <div class="form-group">
        <label for="exampleFormControlInput1">Người Gửi</label>
        @foreach($get_users as $item)
        @if($Notification['user_id']== $item->id)
        <input type="text" name="user_id" class="form-control" readonly value="{{ $item->fullname}}">
        @endif
        @endforeach
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Loại Thông Báo</label>
        <select class="form-control" name="category_id" id="">
            @foreach($get_categories as $item)
            <option  @if($Notification['category_id']==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Trạng Thái Thông Báo</label>
        <select class="form-control" name="status" id="">
            <option @if($Notification['status']==1) selected @endif value="1">Thông Báo Bình Thường</option>
            <option @if($Notification['status']==2) selected @endif value="2">Thông Báo Quan Trọng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Tiêu Đề</label>
        @if( isset($warnings['title']) != null)
                <p style='color: red'>{{ $warnings['title'] }}</p>
        @endif
        <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification['title']}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội Dung Thông Báo</label>
        @if( isset($warnings['content']) != null)
                <p style='color: red'>{{ $warnings['content'] }}</p>
        @endif
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{!!$Notification['content']!!}</textarea>
    </div>
    <div class="row">
        <div class="col-12">
            @if(isset($warnings['is_active']) != null)
                <p style='color: red'>{{ $warnings['is_active'] }}</p>
            @endif
            <div class="row">
                <div class="col-3 ml-4">
                    <div class="row">
                    <div class="form-group">
                        <select class="form-control" name="is_active" id="">
                            <option value="0">Chọn Xác Nhận</option>
                            <option value="1">Xác Nhận Gửi Thông Báo</option>
                            <option value="2">Lưu thông Báo Vào Nháp</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
