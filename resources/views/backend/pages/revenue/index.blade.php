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
        <canvas id="bar-chart" width="400" height="250"></canvas>
    </div>
    </div>

<script>
 new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [
        <?php 
        if($name == null){
          echo('');
        }
        else{
          foreach($name as $item){
            echo("'Level: ".$item->level."'".",");
        }
        }
            
        ?>
      ],
      datasets: [
        {
          label: 'Doanh thu(VNĐ)',
          backgroundColor: [
              <?php
              if($level_total == null){
                echo('0');
              }
              else{
                foreach ($level_id as $value) {
                  foreach ($value as $value1) {
                    echo("'"."#97".$value1.$value1."'".",");
                }
              }
              }
                 
                
                ?>
          ],
          
          data: [
            <?php 
             if($level_total == null){
              echo('0');
            }
            else{
                foreach ($level_id as $value) {
                  foreach ($value as $value1) {
                      echo($value1.",");
                  }
                }
              }
            ?>
          ]
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Doanh thu khóa {{$course_name->course_name}}',
        
      },
      scales: {
      xAxes: [{
        ticks: {
          maxRotation: 0,
          minRotation: 0
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
    }
});
</script>



@endsection
@push('scripts')

@endpush
