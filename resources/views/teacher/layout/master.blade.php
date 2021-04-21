@include('teacher.layout.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
@include('teacher.layout.sidebar')

<!-- Main content -->
<div class="main-content">
  <div class="page-content">
          @yield('content')
  </div>
</div>

@include('teacher.layout.footer')
