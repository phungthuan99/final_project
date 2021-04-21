@include('student.layout.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('student.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="main-content">
      <div class="page-content">
              @yield('content')
      </div>
    </div>
  </div>
  @include('student.layout.footer')
