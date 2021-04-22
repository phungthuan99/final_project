@extends('student.layout.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bài Quiz</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Buổi</th>
                                <th>Thời Gian</th>
                                <th>Ca</th>
                                <th style="width: 100px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php $check = array()?>
                            <?php
                                $arr = 
                                    [   
                                    ["id"=>1, "desc"=>"7h15-9h15"],
                                    ["id"=>2, "desc"=>"7h15-9h15"],
                                    ["id"=>3, "desc"=>"7h150-9h15"],
                                    ["id"=>4, "desc"=>"7h15-9h15"],
                                    ["id"=>5, "desc"=>"7h15-9h15"],
                                    ["id"=>6, "desc"=>"7h15-9h15"],
                                ];
                            ?>

                            @foreach ($arr as $a)



                            @endforeach
                            @foreach ($quiz as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Buổi: {{ $item->quiz }}</td>

                                @foreach ($date_quiz as $key => $date)

                                @if($item->quiz-1 == $key)
                                <td>Ca: {{ $date->slot }}</td>
                                <td>
                                    {{ date('d/m/Y', strtotime($date->time)) }}
                                </td>
                                <td class="text-center">
                                    <?php $a[0] = Auth::guard('student')->user()->id . ',' . $item->level_id . ',' . $item->quiz; ?>
                                    <?php
                                    // dd($a[0]);
                                    // dd($student_id_and_quiz_and_level_id);
                                    ?>
                                    @if(array_search($a[0],$student_id_and_quiz_and_level_id) !== false) <a
                                        style="width:40%" id="do_quiz_{{ $item->id }}"
                                        class="btn btn-primary text-white">Xem Lại</a>
                                    <form id="do_quiz_form_{{ $item->id }}"
                                        action="{{ route('do-quiz.show',$item->quiz) }}" method="get"
                                        style="display: none;">
                                        @csrf
                                        <input type="hidden" name="quiz" value="{{ $item->quiz }}">
                                        <input type="hidden" name="level_id" value="{{ $item->level_id }}">
                                    </form>
                                    @else
                                    @if(Carbon\Carbon::parse($date->time) == Carbon\Carbon::today()) <a
                                        id="do_quiz_{{ $item->id }}" class="btn btn-primary text-white">Làm Quiz</a>
                                    <form id="do_quiz_form_{{ $item->id }}"
                                        action="{{ route('do-quiz.edit',$item->quiz) }}" method="get"
                                        style="display: none;">
                                        @csrf
                                        <input type="hidden" name="quiz" value="{{ $item->quiz }}">
                                        <input type="hidden" name="level_id" value="{{ $item->level_id }}">
                                    </form>
                                    @endif
                                    @endif
                                </td>
                                <?php break; ?>
                                @endif
                                @endforeach
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
@endsection

<style>
.flex-wrap {
    display: none !important;
}

.dataTables_filter {
    display: none !important;
}
</style>

@push('scripts')
<script>
$("a[id^='do_quiz_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('do_quiz_', '');
    $("#do_quiz_form_" + id).submit();
});
</script>
@endpush