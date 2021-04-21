<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/admin" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->role == 3 || Auth::user()->role == 5)
                <li>
                    <a href="{{route('enrollment.index')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Quản trị danh sách đăng ký</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('notifications.index')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Quản trị thông báo</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Học Viên</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('schedule_learn.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Lịch Học</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('schedule_teach.index')}}" class=" waves-effect">
                        <i class="ri-calendar-event-fill"></i>
                        <span>Quản Trị Lịch Dạy</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}" class=" waves-effect">
                        <i class=" ri-list-check"></i>
                        <span>Quản Trị Danh Mục</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('waiting-list.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Danh Sách Chờ</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 5)
                
                <li>
                    <a href="{{route('quiz.index')}}" class=" waves-effect">
                        <i class="ri-pencil-fill"></i>
                        <span>Quản Trị Quiz</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('level.index')}}" class=" waves-effect">
                        <i class=" ri-ball-pen-fill"></i>
                        <span>Quản Trị Level</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('course.index')}}" class=" waves-effect">
                        <i class=" ri-book-open-line"></i>
                        <span>Quản Trị Khoá Học</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('class.index')}}" class=" waves-effect">
                        <i class=" ri-folder-user-line"></i>
                        <span>Quản Trị Lớp Học</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('feedback.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('revenue.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Doanh Thu</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Quản Trị Nhân Viên</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 2 || Auth::user()->role == 5)
                <li>
                    <a href="{{route('news.index')}}" class=" waves-effect">
                        <i class=" ri-newspaper-line"></i>
                        <span>Quản Trị Tin Tức</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('setting.index')}}" class=" waves-effect">
                        <i class=" ri-pages-line"></i>
                        <span>Quản Trị Landing Page</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 4 || Auth::user()->role == 3 || Auth::user()->role == 5)
            <li>
                    <a href="{{route('attendance.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Điểm danh</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
