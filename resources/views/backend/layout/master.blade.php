@include('backend.layout.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('backend.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div style="background-color: white;">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="main-content">
      <div class="page-content">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 style="color: #007bff" class="mt-1 m-0 font-weight-bold">@yield('title_page')</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
              @yield('content')
        </div>
    </div>
    {{-- <section style="background-color: white" class="content">
        @yield('content')
    </section> --}}
  </div>
  @include('backend.layout.footer')
