<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('home.student')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                <a href="{{route('student.scheduleLearn')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Xem lịch học</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('student.attendance')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Điểm danh</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('do-quiz.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Làm Bài Quiz</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.history_learned')}}" class=" waves-effect">
                        <i class="ri-save-line"></i>
                        <span>Lịch sử học</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
