@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Chi Tiết Thông Báo')
@section('content')

<div class="col-12">
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Người Gửi</label>
            <input type="text" class="form-control" value="{{ $Notification->userName->fullname}}" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Loại Thông Báo</label>
            <input type="text" class="form-control" value="{{ $Notification->categoryName->name}}" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Tiêu Đề</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"
                rows="3">{{ $Notification->title}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nội dung</label>
            <br>
            {!! ShowErrors($errors,'title') !!}
            <textarea rows="20" name="content" class="" placeholder="Nhập nội dung vào đây"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $Notification->content}}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Ngày Gửi</label>
            <input type="text" class="form-control"
                value="{{ Carbon\carbon::parse($Notification->created_at)->format('d-m-Y') }}" readonly>
        </div>
        {{-- <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Cập Nhật</label>
        <input type="text" class="form-control" value="{{ Carbon\carbon::parse($Notification->updated_at)->format('d-m-Y') }}"
        readonly>
</div> --}}
</form>
</div>
@endsection