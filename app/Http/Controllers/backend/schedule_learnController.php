<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Classes, Level, Schedule, Course};
use App\Http\Requests\backend\DoilichRequest\{DoilichRequest};
use Arr;
use Auth;
use Carbon\Carbon;

class schedule_learnController extends Controller
{
    public function index(Request $Request)
    {
        $data['get_all_level'] = Level::all();
        $data['get_all_schedule'] = Schedule::all();
        $data['check_course'] = Course::all();


        // lấy ra các lớp có lịch  để check lớp đã có lịch hay chưa
        $data['get_schedule'] = Schedule::all();
        if ($data['get_schedule'] != null) {
            $class = array();
            foreach ($data['get_schedule'] as $value) {
                if (array_search($value->class_id, $class) === false) {
                    $class[] = $value->class_id;
                }
            }
            $data['get_schedule'] = $class;
        }
        // finter
        $data['check'] = false;
        $collection = array();
        if ($Request->all() != null && $Request['page'] == null) {
            foreach ($Request->all() as $key => $value) {
                if ($key == 'name') {
                    $data['get_all_class'] = Classes::where([["$key", 'LIKE', "%$value%"], ['status', '!=', 0], ['finish_date', '>', now()]])->withcount('CountStuden')->paginate(10);
                } elseif ($key == 'weekday' && $value == 0) {
                    foreach (Classes::all() as $value) {
                        if (array_search($value->id, $class) === false && new Carbon($value->finish_date) > now()) {
                            $collection[] = Classes::where([['id', $value->id], ['status', '!=', 0]])->withcount('CountStuden')->first();
                        }
                    }
                    $data['check'] = true;
                    $check = count($collection) != 0 ? $collection : array();
                    $data['get_all_class'] = collect($check);
                } else {
                    foreach (Classes::all() as $value) {
                        if (array_search($value->id, $class) !== false && new Carbon($value->finish_date) > now()) {
                            $collection[] = Classes::where([['id', $value->id], ['status', '!=', 0]])->withcount('CountStuden')->first();
                        }
                    }
                    $data['check'] = true;
                    $check = count($collection) != 0 ? $collection : array();
                    $data['get_all_class'] = collect($check);
                }
            }
        } else {
            foreach (Classes::all() as $value) {
                $check_date_class = Classes::where([['id', $value->id], ['status', '!=', 0]])->withcount('CountStuden')->first();
                if (new Carbon($check_date_class->finish_date) > now()) {
                    $collection[] = $check_date_class;
                }
            }
            $data['check'] = true;
            $check = count($collection) != 0 ? $collection : array();
            $data['get_all_class'] = collect($check);
        }
        return view('backend.pages.schedule_learn.index', $data);
    }


    public function store(Request $request)
    {
        if (count(Schedule::where('class_id', $request['class_id'])->get()) != 0) {
            foreach (Schedule::where('class_id', $request['class_id'])->get() as $value) {
                Schedule::destroy($value->id);
            }
        }
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $datacreate['weekday'] = "";
        $datacreate['slot'] = "";
        $weekday = array();
        $slot = array();
        foreach ($data as $key => $value) {
            if ($value != 0 && $key != 'class_id' && $key != 'level_id') {
                $weekday[] = $key;
                $slot[] = (int)$value;
            }
        }
        $class = Classes::where('id', $data['class_id'])->first();
        $date = new Carbon($class->start_date);

        $i = 0;
        while (true) {
            $schedule = array(
                'student_id' => null,
                'user_id' => Auth::user()->id,
                'level_id' => $data['level_id'],
                'class_id' => $class->id,
                'teacher_id' => null,
            );
            foreach ($weekday as $key => $value) {
                $dayInWeek = $value;
                $schedule['weekday'] = $value;
                $schedule['slot'] = $slot[$key];

                switch ($dayInWeek) {
                    case 2:
                        $date = $date->next('Monday');
                        break;

                    case 3:
                        $date = $date->next('Tuesday');
                        break;

                    case 4:
                        $date = $date->next('Wednesday');
                        break;

                    case 5:
                        $date = $date->next('Thursday');
                        break;

                    case 6:
                        $date = $date->next('Friday');
                        break;

                    case 7:
                        $date = $date->next('Saturday');
                        break;
                }
                $schedule['time'] = $date;
                Schedule::create($schedule);
                $i++;
                if ($i >= $class->number_of_sessions) break;
            }
            if ($i >= $class->number_of_sessions) break;
        }
        // update lại ngày bắt đầu và ngày kết thúc trong bảng class
        $date_start = Schedule::where('class_id', $request['class_id'])->first()->time;
        $date_end = Schedule::where('class_id', $request['class_id'])->first()->time;;
        foreach (Schedule::where('class_id', $request['class_id'])->get() as $key_check => $value_check) {
            if ($value_check->time > $date_end) {
                $date_end = $value_check->time;
            }
        }
        $update_date_class = array();
        $update_date_class['start_date'] = $date_start;
        $update_date_class['finish_date'] = $date_end;
        Classes::find($request['class_id'])->update($update_date_class);


        return redirect()->back()->with('thongbao', 'Xếp Lịch Học Cho Lớp Thành Công');
    }
    public function update(Request $request)
    {
        $data = array();
        $data['slot'] = $request['slot'];
        $data['time'] = $request['date_update'];
        Schedule::find($request['id_date_old'])->update($data);
        return redirect()->back()->with('thongbao', 'Chuyển Lịch Học Cho Lớp Thành Công');
    }
}