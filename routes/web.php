<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             'frontend\HomeController@index')->name('home.index');
Route::get('/news',         'frontend\NewsController@index')->name('news.index');
Route::get('/news/{id}',    'frontend\NewsController@getNews')->name('news.news-detail');
Route::get('/enrollment',        'frontend\EnrollmentController@getForm')->name('enrollment.getForm');
Route::post('/enrollment',       'frontend\EnrollmentController@postForm')->name('enrollment.postForm');
Route::get('/schedule-opening', 'frontend\ScheduleOpeningController@index')->name('schedule-opening.index');
Route::get('/about', 'frontend\AboutController@index')->name('home.about');
// Route::get('/', function () {return redirect()->route('home.index');});
// login và logout

// các chức năng của admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['check_role_staff', 'check_auth'],
], function () {

    Route::resource('/', 'backend\IndexController');
    Route::resource('/account', 'backend\AccountController');
    Route::resource('/password', 'backend\AccountChangePassController');
});


// Check Director
Route::group([
    'prefix' => 'admin',
    'middleware' => ['check_auth','check_role_director'],
], function () {
    Route::resource('quiz', 'backend\QuestionTestController');
    Route::resource('detail_question_test', 'backend\detail_question_test');
    Route::resource('quiz_test', 'backend\QuizController');
    Route::resource('/user', 'backend\UserController');
    Route::resource('/level', 'backend\LevelController');
    Route::resource('/feedback', 'backend\FeedbackController');
    Route::resource('/revenue', 'backend\RevenueController');

});

// Check Manager
Route::group([
    'prefix' => 'admin',
    'middleware' => ['check_auth','check_role_manager'],
], function () {
    Route::resource('/category', 'backend\CategoryController');
    Route::resource('/course', 'backend\CourseController');
    Route::resource('/class', 'backend\ClassController');
    Route::resource('/class-detail', 'backend\ClassDetailController');
    Route::resource('/schedule_learn', 'backend\schedule_learnController');
    Route::resource('/schedule_teach', 'backend\schedule_teachController');
    Route::resource('/notifications', 'backend\NotificationController');
    Route::POST('/notification/store/default', 'backend\ExcelController@student_store_default');
    Route::resource('/student', 'backend\StudentController');
     // show ra lớp cho tạo hc và sửa hv ở phần quản trị hv
     Route::get('/student/create/{slot}/{level}/{course}', 'backend\ExcelController@show_class_add_student');
     Route::get('/student/edit/selected/{slot}/{level}/{level_id_now}/{class_id_now}', 'backend\ExcelController@show_class_edit');
     // end show ra lớp cho tạo hc và sửa hv

     // ajax lịch học
     Route::get('/schedule_learn/show/edit/{id}', 'backend\ExcelController@show_edit_schedule');
     Route::get('/schedule_learn/show/chuyen_lich/{id}', 'backend\ExcelController@show_chuyen_lich_schedule');
     Route::get('/schedule_learn/show/lich_trong/{id_ngay_muon_chuyen}/{ngay_chuyen_sang}', 'backend\ExcelController@show_lich_trong_schedule');
     //end ajax lịch học

     // ajax lịch dạy
     Route::get('/schedule_teach/create/{id}', 'backend\ExcelController@show_teacher_schedule_teach');
     //end ajax lịch dạy

     Route::resource('/attendance', 'backend\AttendanceController');
     Route::resource('/waiting-list', 'backend\WaitingListController');
     Route::resource('/enrollment', 'backend\EnrollmentController');
});

// Check Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['check_auth','check_role_admin'],
], function () {
    Route::resource('/setting', 'backend\SettingController');
    Route::resource('/news', 'backend\NewsController');
    Route::resource('/about', 'backend\AboutController');

});


// Auth Admin
Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {
        Route::get('login', 'backend\AuthController@getLoginForm');
        Route::post('login', 'backend\AuthController@login')->name('auth.login');
        Route::get('logout', 'backend\AuthController@logout')->name('auth.logout');
        Route::get('forgot-password', 'backend\ResetPasswordController@getform')->name('get.forgotpassword');
        Route::post('forgot-password', 'backend\ResetPasswordController@sendCode')->name('post.forgotpassword');
        Route::get('reset-password', 'backend\ResetPasswordController@resetform')->name('get.resetpassword');
        Route::post('reset-password', 'backend\ResetPasswordController@changePassword')->name('post.resetpassword');
    }
);


//Student


Route::group(
    [
        'prefix' => 'student',
    ],
    function () {
        Route::get('login', 'student\AuthController@getLoginForm');
        Route::post('login', 'student\AuthController@login')->name('student.login');
        Route::get('logout', 'student\AuthController@logout')->name('student.logout');
        Route::get('forgot-password', 'student\ResetPasswordController@getform')->name('get.studentforgotpassword');
        Route::post('forgot-password', 'student\ResetPasswordController@sendCode')->name('post.studentforgotpassword');
        Route::get('reset-password', 'student\ResetPasswordController@resetform')->name('get.studentresetpassword');
        Route::post('reset-password', 'student\ResetPasswordController@changePassword')->name('post.studentresetpassword');
    }

);

Route::group(
    [
        'prefix' => 'student',
        'middleware' => ['check_student'],
    ],
    function () {
        Route::resource('do-quiz', 'student\QuizController');
        Route::get('/quiz/update_selected_answer/{question}/{selected_answer}/{level_id}/{quiz}', 'student\ajax_quiz_student_Controller@update_selected_answer');
        Route::get('/quiz/end_time/{level_id}/{quiz}', 'student\ajax_quiz_student_Controller@end_time');

        Route::get('/', 'student\IndexController@index')->name('home.student');
        Route::get('/schedule', 'student\IndexController@schedule')->name('student.scheduleLearn');
        Route::resource('notification', 'student\NotificationController');
        Route::get('feedback', 'student\StudentFeedbackController@getFormFeedback')->name('get.StudentFeedback');
        Route::post('feedback', 'student\StudentFeedbackController@postFormFeedback')->name('post.StudentFeedback');
        Route::get('profile/{id}', 'student\ProfileController@index')->name('student.profile');
        Route::get('attendance', 'student\IndexController@attendance')->name('student.attendance');
        Route::resource('student-password','student\PasswordController');
        Route::get('history','student\IndexController@history_learned_class')->name('student.history_learned');
    }
);

//Teacher
Route::group(
    [
        'prefix' => 'teacher',
        'middleware' => ['check_role_teacher', 'check_auth'],
    ],
    function () {
        Route::get('/', 'teacher\TeacherController@index')->name('home.teacher');
        Route::get('schedule-teach', 'teacher\TeacherController@schedule')->name('teacher.scheduleTeach');
        Route::get('profile/{id}', 'teacher\ProfileController@index')->name('teacher.profile');
        Route::get('schedule-teach/{id}', 'teacher\TeacherController@detailSchedule')->name('teacher.detailSchedule');
        Route::get('schedule-teach/class-list/{id}', 'teacher\TeacherController@classList')->name('teacher.classList');
        Route::resource('roll-call', 'teacher\RollCallController');
        Route::resource('open-quiz', 'teacher\Teacher_qiuz_Controller');
        Route::resource('teacher-password','teacher\PasswordController');
        Route::resource('score', 'teacher\FinalScoreController');
    }
);

Route::group(
    [
        'prefix' => 'teacher',
    ],
    function () {
        Route::get('login', 'teacher\AuthController@getLoginForm');
        Route::post('login', 'teacher\AuthController@login')->name('teacher.login');
        Route::get('logout', 'teacher\AuthController@logout')->name('teacher.logout');
    }
);
