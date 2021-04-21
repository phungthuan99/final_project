
@section('title',"registration")

{{-- @section('content') --}}
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ asset("") }}">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration </title>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Vali</h1>
    </div>
    <div style="height: 550px" class="login-box">
      <form  class="login-form" action="{{ route('auth.registration') }}" method="POST" id="formLogin">
        @csrf

        <div class="form-group">
          <label class="control-label">NAME</label>
          <br>{!! ShowErrors($errors,'name') !!}
          <input class="form-control" name="name" type="text" placeholder="name" value="{{ old('name') }}" >
        </div>

        <div class="form-group">
          <label class="control-label">EMAIL</label>
          <br>{!! ShowErrors($errors,'email') !!}
          <input class="form-control" name="email" type="text" placeholder="email" value="{{ old('email') }}" >
        </div>

        <div class="form-group">
          <label class="control-label">PHONE</label>
          <br>{!! ShowErrors($errors,'phone') !!}
          <input class="form-control" name="phone" type="text" placeholder="phone" value="{{ old('phone') }}" >
        </div>

        <div class="form-group">
          <label class="control-label">Date_of_Birth</label>
          <br>{!! ShowErrors($errors,'date_of_birth') !!}
          <input class="form-control" name="date_of_birth" type="date" placeholder="Date_of_Birth" value="{{ old('Date_of_Birth') }}" >
        </div>

        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <br>{!! ShowErrors($errors,'password') !!}
          <input class="form-control" name="password" type="password" placeholder="Password" >
        </div>

        {{-- <div class="form-group">
          <label class="control-label">Retype password</label>
          <input class="form-control" name="Retype_password" type="password" placeholder="Retype password" >
        </div> --}}

        <div class="form-group">
          <div class="utility">
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Registration</button>
        </div>
      </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="public/js/validate.js" type="text/javascript" charset="utf-8" async defer></script>
  </body>
  </html>

  {{-- @endsection --}}