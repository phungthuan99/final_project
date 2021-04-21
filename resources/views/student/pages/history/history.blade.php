@extends('student.layout.master')
@section('title','Lịch sử học tại trung tâm')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Lịch sử học tại trung tâm</h4>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Level</th>
                                <th>Khoá học</th>
                                <th>Điểm</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($histories == null)
                                    <tr>Lịch sử học trống, lớp học hiện tại là lớp đầu tiên tại trung tâm</tr>
                                @endif
                            <?php $i=1 ?>
                            @foreach ($histories as $history)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{$history->className->name}}</td>
                                    <td>{{$history->levelName->level}}</td>
                                    <td>{{$history->courseName->course_name}}</td>
                                    <td>{{$history->score}}</td>
                                    @if($history->score < 5)
                                        <td style="color:red;" >Trượt</td>
                                    @else
                                        <td style="color:green" >Hoàn thành</td>
                                    @endif 
                                    {{-- End Check Absent  --}}
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
    // var colCount = $("#datatable-buttons tr .absent").length;
    // document.querySelector(".absent-count").innerHTML = colCount;
</script>
@endpush