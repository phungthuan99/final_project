@extends('./backend/layout/master')
@section('title','Quản Trị Doanh Thu')
@section('title_page','Quản Trị Doanh Thu')
@section('content')

    <div class="col-12 ">
        <div style="padding-left: 430px" class="row bg-light form-inline">
            <div class="">
                <div class="row">
                    <div class="dropdown pt-3 pb-4 mr-2 mt-2">
                        <button class="border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chọn theo khóa
                        </button>
                        <div style="width: 172px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($courses as $course)
                            <a class="dropdown-item" href="/admin/revenue?course_id={{$course->id}}">{{$course->course_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1>Hiện tại chưa cập nhật doanh thu</h1>
    </div>
    </div>


@endsection
@push('scripts')

@endpush
