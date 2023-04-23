<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | صفحه عضویت</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
  <!-- RTL style -->
  <link rel="stylesheet" href="{{ asset('back/dist/css/rtl.css') }}">
</head>
<body class="hold-transition register-page" dir="rtl">
<div class="register-box">
  <div class="register-logo">
  <a href="..">دبستان پسرانه پیشگامان</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">عضویت جدید</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="input-group mb-3">
          <input type="text" class="form-control inputBrClass @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="نام" autofocus>
          <div class="input-group-append">
            <div class="input-group-text brClass">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control inputBrClass @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="new-username" placeholder="نام کاربری">
          <div class="input-group-append">
            <div class="input-group-text brClass">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control inputBrClass @error('password') is-invalid @enderror" id="password"   name="password" required autocomplete="new-password" placeholder="رمز عبور">
          <div class="input-group-append">
            <div class="input-group-text brClass">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control inputBrClass" id="password-confirm" name="password_confirmation" placeholder="تایپ مجدد رمز ورود" required autocomplete="new-password">
                           
          <div class="input-group-append">
            <div class="input-group-text brClass">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <select class="form-control inputBrClass @error('role') is-invalid @enderror" id="cmbtype" name="cmbtype" >
            <option value="student">دانش آموز</option>
            <option value="teacher">معلم</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text brClass">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
          @error('role')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">عضویت</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">من در حال حاضر عضو هستم</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
