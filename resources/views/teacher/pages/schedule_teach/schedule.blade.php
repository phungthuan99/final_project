@extends('teacher.layout.master')
@section('title','Lịch dạy')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lịch dạy</h4>
                        <div class="row mb-3">
                            <div class="col-6">
                               <form id="next_day" action="">
                                   <select class="form-control" id="next_day_select" name="day" id="">
                                        <option value="7" @if(request()->get('day') == 7) selected @endif>7 Ngày tới</option>
                                        <option value="14" @if(request()->get('day') == 14) selected @endif >14 Ngày tới</option>
                                        <option value="30" @if(request()->get('day') == 30) selected @endif >30 Ngày tới</option>
                                   </select>
                               </form>
                            </div>
                        </div> 
                        <table id="datatable_wrapper" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày</th>
                                <th>Lớp</th>
                                <th>Ca Học</th>
                                <th>Thời gian</th>
                                <th></th>
                            </tr>
                            </thead>
        
        
                            <tbody>
                                @if(count($schedules) == 0)
                                <td colspan="7">
                                    <div class="mt-5 col-12 justify-content-center d-flex">
                                        <div class=" alert alert-info" role="alert">
                                            Hôm nay không có lớp học
                                        </div>
                                    </div>
                                </td>
                                @endif
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
                                    @if($schedule->time > now()->toDateString() )
                                        <a class="btn btn-primary waves-effect waves-light disabled">Điểm danh</a>
                                    @elseif($schedule->time < now()->toDateString())
                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('roll-call.edit',"$schedule->id")}}">Xem lại điểm danh</a>
                                    @else
                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('roll-call.edit',"$schedule->id")}}">Điểm danh</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection

@push('scripts')
<script>
$("#next_day_select").change(function(event) {
   $('#next_day').submit();
});

</script>
@endpush
