@extends('teacher.layout.master')
@section('title','Nhập điểm cho học viên')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách lớp phụ trách</h4>
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Danh sách học viên</th>
                                {{-- <th>Đã học</th> --}}
                            </tr>
                            </thead>


                            <tbody>
                            <?php $i=1 ?>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$class->name}}</td>
                                <td>{{$class->start_date}}</td>
                                <td>{{$class->finish_date}}</td>
                                <td>
                                    <a href="{{route('score.show',$class->id)}}">Xem</a>
                                </td>
                                {{-- <td>
                                    {{$pasts->count('time')}}
                                </td> --}}
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