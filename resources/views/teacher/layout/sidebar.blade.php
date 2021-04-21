<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
            <a href="{{route('home.teacher')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Danh sách lớp</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('teacher.scheduleTeach')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Xem lịch dạy</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('score.index')}}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Nhập điểm thi cuối khoá</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
