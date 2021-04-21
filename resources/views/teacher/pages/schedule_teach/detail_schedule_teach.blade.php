@extends('teacher.layout.master')
@section('title','Chi tiết lịch dạy')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Lịch dạy lớp {{$class->name}}</h4>
                        <p style="font-size: 17px">Đã học: {{$pasts->count('time')}}/24 buổi</p>
                    </div>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Lớp</th>
                                <th>Ca Học</th>
                                <th>Thời gian</th>
                                <th>Giảng viên</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    Thứ {{$schedule->weekday}} - {{date('d-m-Y', strtotime($schedule->time))}}
                                </td>
                                <td>{{$schedule->getClass->name}}</td>
                                <td>{{$schedule->slot}}</td>
                                <td>@if ($schedule->slot == 1) 7h15 - 9h15
                                    @elseif ($schedule->slot == 2) 9h30 - 11h30
                                    @elseif ($schedule->slot == 3) 13h30 - 15h30
                                    @elseif ($schedule->slot == 4) 15h45 - 17h45
                                    @elseif ($schedule->slot == 5) 18h00 - 20h00
                                    @elseif ($schedule->slot == 6) 20h15 - 22h15
                                    @endif
                                </td>
                                <td>
                                    @if($schedule->teacher_id == null)
                                    Chưa có giảng viên
                                    @else
                                    {{$schedule->getNameTeacher->fullname}}
                                    @endif
                                </td>
                                <td>
                                    @if($schedule->time > now()->toDateString() )
                                    <a class="btn btn-primary waves-effect waves-light disabled">Điểm danh</a>
                                    @elseif($schedule->time < now()->toDateString())
                                        <a class="btn btn-primary waves-effect waves-light"
                                            href="{{route('roll-call.edit',"$schedule->id")}}">Xem lại điểm danh</a>
                                        @else
                                        <a class="btn btn-primary waves-effect waves-light"
                                            href="{{route('roll-call.edit',"$schedule->id")}}">Điểm danh</a>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container justify-content-center d-flex mt-5 pb-5">
                        {{$schedules->links()}}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>

@endsection