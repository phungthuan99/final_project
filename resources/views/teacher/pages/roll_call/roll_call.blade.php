@extends('teacher.layout.master')
@section('title','Điểm danh')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Điểm danh lớp {{$class->name}}</h4> 
                        <p>Ngày : {{$schedule->time}}</p>
                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Mã Học Viên</th>
                                    <th>Có mặt</th>
                                    <th>Vắng mặt</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$student->fullname}}</td>
                                        <td>
                                            <img style="width:130px;" src="/storage/{{$student->avatar}}" alt="">
                                        </td>
                                    <td>{{$student->code}}</td>
                                    <td>
                                        {{-- <input @if(array_search($student->id,explode(',', $schedule->student_id)) === false) @else checked @endif type="checkbox" class="student_status" value="{{$student->id}}" name="student_id" data-student="{{$student->id}}" id="attendence_status_{{$student->id}}">
                                        <label for="attendence_status_{{$student->id}}">Có mặt</label> --}}
                                        <input @if(array_search($student->id,explode(',', $schedule->student_id)) === true)  @else checked @endif type="radio" class="present" value="{{$student->id}}" name="student_id_{{$student->id}}" data-student="{{$student->id}}">
                                    </td>
                                    <td>
                                        <input @if(array_search($student->id,explode(',', $schedule->student_id)) === false) checked  @else  @endif type="radio" class="absent"  value="{{$student->id}}" name="student_id_{{$student->id}}" data-absent="{{$student->id}}">
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form @if($schedule->time != now()->toDateString()) @else action="{{route('roll-call.update',$schedule->id) }}" @endif method="POST" class="button-items">
                                @method('PUT')
                                 @csrf
                                 <input type="hidden" name="student_id" value="{{$schedule->student_id}}" class="student_id" id="student_id">
                                 @if($schedule->slot == 1)
                                    @if(now()->toTimeString() > '07:15:00' && now()->toTimeString() < '07:35:00')
                                        <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                        <p class="text-center" >Đã hết giờ điểm danh </p>
                                    @endif
                                 @endif
                                 @if($schedule->slot == 2)
                                    @if(now()->toTimeString() > '09:30:00' && now()->toTimeString() < '09:50:00')
                                        <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                    <p class="text-center" >Đã hết giờ điểm danh</p>
                                    @endif
                                 @endif
                                 @if($schedule->slot == 3)
                                    @if(now()->toTimeString() > '13:30:00' && now()->toTimeString() < '13:50:00')
                                        <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                        <p class="text-center" >Đã hết giờ điểm danh</p>
                                    @endif
                                 @endif
                                 @if($schedule->slot == 4)
                                    @if(now()->toTimeString() > '15:45:00' && now()->toTimeString() < '16:05:00')
                                    <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                    <p class="text-center" >Đã hết giờ điểm danh</p>
                                    @endif
                                 @endif
                                 @if($schedule->slot == 5)
                                    @if(now()->toTimeString() > '18:00:00' && now()->toTimeString() < '18:20:00')
                                    <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                    <p class="text-center" >Đã hết giờ điểm danh</p>
                                    @endif
                                 @endif
                                 @if($schedule->slot == 6)
                                    @if(now()->toTimeString() > '20:15:00' && now()->toTimeString() < '20:35:00')
                                    <button @if($schedule->time != now()->toDateString()) disabled @else  @endif style="margin:0 auto; display: block;" class="btn btn-primary waves-effect waves-light" type="submit">Xác nhận</button>
                                    @else
                                    <p class="text-center" >Đã hết giờ điểm danh</p>
                                    @endif
                                 @endif
                            </form>
                        </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
@endsection
