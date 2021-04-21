

@extends('student.layout.master')
@section('title','Thông tin cá nhân')

@section('content')
    <div class="container-fluid">
    <p style="font-size:18px">Xin chào ' {{Auth::guard('student')->user()->fullname}}' bạn hãy cho trung tâm biết cảm nhận của bạn về chất lượng của trung tâm và giảng viên bằng đánh giá dưới đây nhé! </p>
       <div class="row">
            <div class="col-4">
                <div class="profile__inner">
                    <div class="profile__inner-head">
                        <div class="avatar">
                            <img src="storage/{{$teacher_info->avatar}}" alt="student avatar">
                        </div>
                        <div class="info">
                            <h4>{{$teacher_info->fullname}}</h4>
                            <p>Giáo viên</p>
                        </div>
                    </div>
                    <div class="profile__inner-body">
                    <p><span>Email:</span> <span>{{$teacher_info->email}}</span></p>
                    <p><span>Số điện thoại:</span> <span>{{$teacher_info->phone}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card profile__detail">
                    <div class="card-body">
                    <form action="{{ route('post.StudentFeedback') }}" method="POST">
                    @csrf   
                        <h4 class="">Đánh giá giảng viên và trung tâm</h4>
                        <input hidden type="text" name="student_id" value="{{Auth::guard('student')->user()->id}}">
                        <input hidden type="text" name="class_id" value="{{Auth::guard('student')->user()->class_id}}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-4 col-form-label">Điểm mạnh & điểm yếu</label>
                            <div class="col-md-12">
                            <textarea class="form-control" type="text" value="" id="example-text-input" name="content"  cols="30" rows="5"></textarea>
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-md-12 col-form-label">Đánh giá trên thang điểm 10</label>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="score" value="" id="example-search-input">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-2 center-block">Gửi</button>
                    </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection