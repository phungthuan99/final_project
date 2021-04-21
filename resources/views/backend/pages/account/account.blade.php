@extends('./backend/layout/master')
@section('title','Tài khoản')
@section('content')
<div class="container-fluid">
       <div class="row">
            <div class="col-4">
                <div class="profile__inner">
                    <div class="profile__inner-head">
                        <div class="avatar">
                            <img src="/storage/{{Auth::user()->avatar}}" alt="student avatar">
                        </div>
                        <div class="info">
                            <h4>{{$profile->fullname}}</h4>
                            <p>
                                @if($profile->role == 2) Admin
                                    @elseif ($profile->role == 3) Quản lý 
                                    @elseif ($profile->role == 4) Giảng viên
                                    @elseif ($profile->role == 5) Giám đốc
                                @endif
                            </p>
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
                        <h4 class="card-title w-100">Thông tin cá nhân</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Họ và tên</label>
                            <div class="col-md-10">
                            <input class="form-control" type="text" value="{{$profile->fullname}}" id="example-text-input">
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
                            <label for="example-password-input" class="col-md-2 col-form-label">Ngày Tạo TK</label>
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



@push('scripts')
<script>
$("button[id^='btn_update_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_update_', '');
    $("#update_form_" + id).submit();
});
$('.close-noti').click(function() {
    $('.alert-noti').hide();
});
</script>
@endpush