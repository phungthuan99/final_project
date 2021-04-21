@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page','Danh Sách Quiz Theo Level')
@section('content')

<div class="col-12">
    <div style="padding-left: 1015px" class="row bg-light form-inline">
        <div class="col-5"></div>
        <div class="col-7">
            <div class="row pl-5 pb-4">
                <div>
                    <form style="margin-left:0px" class="form-inline pt-4">
                        <input style="width: 200px;" name="level" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Tìm Theo Level" aria-label="Search">
                        <a>
                            <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 m-auto">
<table class="table">
    <thead>
        <tr>
            <th class="pl-3" scope="col">STT</th>
            <th scope="col">Level</th>
            <th scope="col">Số Bài Quiz Đang Có</th>
            <th scope="col">Cập Nhật Mới Nhất Ngày</th>
            <th scope="col">Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_level) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả  Nào
                </div>
            </div>
        </td>
        @endif
        <?php  $i=1; ?>
        @foreach ($get_all_level as $item)
        </tr>
        <td>{{ $i++ }}</td>
        <td >Level: {{ $item->level }}</td>
        <td>{{ $item->countquestion_quiz_count }}. Bài</td>
        <td>
            <?php $max=date("Y-m-d", strtotime("1000-01-01 00:00:00")); ?>
            @foreach ($item->Countquestion_test as $updated_at)
            <?php if($updated_at->updated_at > $max){
                $max=$updated_at->updated_at;
            }
            ?>
            @endforeach
            {{ date("Y-m-d", strtotime($max)) }}
        </td>
        <td>
            @if($item->countquestion_quiz_count < 24)
            <p class="text-red">Chưa Đủ Bài Quiz</p>
            @else
            <p class="text-primary">Đã Đủ Bài Quiz</p>
            @endif
        </td>
            <td class="text-left">
            <a href="{{ route('quiz.show',$item->id) }}">
                <button style="width:90%" type="button" class="border-primary btn btn-outline-primary"> Quiz </button>
                </a>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="container justify-content-center d-flex mt-5">
    {{$get_all_level->links()}}
</div>
@endsection
@push('scripts')
<script>

</script>
@endpush
