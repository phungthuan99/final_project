<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Excel;
use App\Models\{Student, Schedule, Classes, Course, User};
use Arr;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function student_create_excel()
    {
        return view('backend.pages.student.create_excel');
    }

    //    public function student_store_excel()
    //     {
    //         $import = Excel::import(new StudentsImport, request()->file('excel'));
    //         return redirect()->back()->with('thongbao', 'Thêm Học Viên Thành Công');
    //     }

    public function show_class_add_student($slot, $level, $course)
    {
        // check khóa có lớp nào không
        $class = array();
        $get_class_in_tableclass = Classes::where([['course_id', $course], ['level_id', $level], ['start_date', '>=', now()]])->get();

        // tìm lớp đó có ca muốn học k
        foreach ($get_class_in_tableclass as $value) {
            if (Schedule::where([['slot', $slot], ['class_id', $value->id]])->first() != null) {
                $class[] = $value;
            }
        }

        if (count($class) == 0) {
            return -1;
        }
        return $class;
    }


    public function show_class_edit($slot, $level, $level_id_now, $class_id_now)
    {
        // lấy ra lớp mà học viên dg học đã học được bn buổi
        $count_student_class_now = count(Schedule::where([['level_id', $level_id_now], ['class_id', $class_id_now], ['time', '<=', now()]])->get());

        // check xem hs có muốn đổi lịch ở đúng level hiện tại đg học hay k
        if ($level == $level_id_now) {
            // hs muốn đổi lịch ở đúng level hiện tại đg học thì 2 lớp tiến độ phải = nhau hoặc lớp đổi sang phải chậm hơn lớp hiện tại
            // lấy ra các lớp cùng level và slot đang chọn
            $get_class = Schedule::where([['slot', $slot], ['level_id', $level_id_now]])->get();

            // check nếu k có ca thì thong báo luôn
            if (count($get_class) == 0) {
                return -1;
            }

            $finter_id_class = array();
            $class = array();
            foreach ($get_class as $value_class) {
                // lọc id class không bị trùng
                if (array_search($value_class->class_id, $finter_id_class) === false) {
                    // đếm số buổi đã học để check với buổi học lớp hiện tại hs dang học
                    $count_class = count(Schedule::where([['class_id', $value_class->class_id], ['time', '<=', now()]])->get());
                    if ($count_class <= $count_student_class_now && $value_class->class_id != $class_id_now) {
                        $class[] = Classes::find($value_class->class_id);
                    }
                }
            }
        } else {
            // hs muốn đổi lịch ở khác level hiện tại đg học thì ở lớp khác phải chưa học buổi nào hoặc đc 1 buổi
            $class = array();
            $get_class = Schedule::where([['slot', $slot], ['level_id', $level]])->get();

            // check nếu k có ca thì thong báo luôn
            if (count($get_class) == 0) {
                return -1;
            }

            $finter_id_class = array();
            foreach ($get_class as $value_class) {
                // lọc id class không bị trùng
                if (array_search($value_class->class_id, $finter_id_class) === false) {
                    // đếm số buổi đã học để check với buổi học lớp hiện tại hs dang học
                    $count_class = count(Schedule::where([['class_id', $value_class->class_id], ['time', '<=', now()]])->get());
                    if ($count_class < 2) {
                        $class[] = Classes::find($value_class->class_id);
                    }
                }
            }
        }
        // check nếu có lớp mà trùng với lớp đg hoc thi bỏ
        if (count($class) == 0) {
            return -1;
        }

        $check = array();
        foreach ($class as $loc) {
            if (array_search($loc->id, $check) === false) {
                $check[] = $loc->id;
                $loc_class_moi_cai_chi_lay_1[] = $loc;
            }
        }
        return $loc_class_moi_cai_chi_lay_1;
    }

    public function show_edit_schedule($id)
    {
        $check_week_slot = array();
        $week_slot = array();

        foreach (Schedule::where('class_id', $id)->get() as $key => $value) {
            if (array_search($value->weekday, $check_week_slot) === false) {
                $check_week_slot[] = $value->weekday;
                $week_slot[$value->weekday] = $value->slot;
            }
        }
        return $week_slot;
    }

    public function show_chuyen_lich_schedule($id)
    {
        $day_week_slot = array();
        foreach (Schedule::where([['class_id', $id], ['time', '>=', now()]])->get() as $value) {
            $day_week_slot[$value->id] = 'Ngày ' . $value->time . " ( " . 'Thứ ' . $value->weekday . ' : ' . ' Ca ' . $value->slot . " ) ";
        }
        return $day_week_slot;
    }
    public function show_lich_trong_schedule($id_ngay_muon_chuyen, $ngay_chuyen_sang)
    {
        $check = Schedule::where([['teacher_id', Schedule::find($id_ngay_muon_chuyen)->teacher_id], ['time', $ngay_chuyen_sang]])->get();

        $all_slot_null = array();
        $check_slot_da_co = array();
        // kiểm tra xem ngày đấy đã có lịch và ca nào hay chưa
        if (count($check) == 0) {
            for ($j = 1; $j < 7; $j++) {
                $all_slot_null[] = $j;
            }
        } else {
            foreach ($check as $key  => $value) {
                $check_slot_da_co[] = $value->slot;
            }
            for ($i = 1; $i < 7; $i++) {
                if (array_search($i, $check_slot_da_co) === false) {
                    $all_slot_null[] = $i;
                }
            }
        }
        return $all_slot_null;
    }

    public function show_teacher_schedule_teach($id)
    {
        $teacher_selected[] = User::find(Classes::find($id)->teacher_id);

        // đển in ra fonrend
        $week_and_slot = array();
        // tạo 1 mngr rỗng để check
        $finter_week_slot = array();
        // lấy ra thứ và ca của lớp vừa click
        foreach (Schedule::where('class_id', $id)->get() as $value) {
            if (array_search($value->weekday, $finter_week_slot) === false) {
                // đển in ra fonrend
                $week_and_slot[$value->weekday] = $value->slot;
                $finter_week_slot[]=$value->weekday;
            }
        }
        // lấy ra toàn bộ giáo viên chưa có lịch dậy và check giáo viên có lịch dạy có trùng hay k
        $all_teacher = array();
        foreach (User::where([['role', 4], ['status', 1]])->get() as $value) {
            foreach ($week_and_slot as $key => $week_slot) {
                $check = DB::select("SELECT * FROM `schedules`
            INNER JOIN classes ON schedules.class_id = classes.id
            where schedules.teacher_id = $value->id
            and classes.finish_date > CURDATE()
            and  weekday = $key AND slot = $week_slot
            ");
             if (count($check) != 0) {
                break;
            }
            }
            if (count($check) == 0) {
                $all_teacher[] = $value;
            }
        }
        return [$all_teacher, $week_and_slot, $teacher_selected];
    }
}
