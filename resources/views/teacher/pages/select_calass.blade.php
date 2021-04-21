@extends('teacher.layout.master')
@section('title','Mở Qiuz')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                        <h4 class="card-title">Mở Quiz</h4>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th class="pl-3" scope="col">STT</th>
                                    <th scope="col">Tên Lớp</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Khóa Học</th>
                                    <th scope="col">Số Học Viên Trong Lớp</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($class) == 0)
                                <td colspan="7">
                                    <div class="mt-5 col-12 justify-content-center d-flex">
                                        <div class=" alert alert-danger" role="alert">
                                            Không Có kết Quả  Nào
                                        </div>
                                    </div>
                                </td>
                                @endif
                                <?php $i = 1 ?>
                                @foreach ($class as $item)
                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                                <td>{{ $item->levelName->level }}</td>
                                <td>{{ $item->courseName->course_name }}</td>
                            <td>{{  $item->count_studen_count }}</td>
                                <td>
                                    <button type="button" class="border-primary btn btn-outline-primary">Mở Quiz</button>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="container justify-content-center d-flex mt-5">
                {{$class->links()}}
            </div>
@endsection
