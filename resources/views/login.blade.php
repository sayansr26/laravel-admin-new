<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ admin_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ admin_asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link href="{{ admin_asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ admin_asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">
  <!-- Theme style -->
  
  <!-- iCheck -->
  
    <!-- loader-->
    <link href="{{ admin_asset('assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Snacked - Login</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ admin_asset('assets/images/error/login-img.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="card-text mb-4">See your growth and get consulting support!</p>
                                    <form action="{{ admin_url('auth/login') }}" method="post" class="form-body">

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">
                                                @if($errors->has('username'))
                                                @foreach($errors->get('username') as $message)
                                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                                @endforeach
                                                @endif
                                                <label class="form-label">Username</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                                                    <input type="text" class="form-control radius-30 ps-5" id="username" placeholder="{{ trans('admin.username') }}" name="username" value="{{ old('username') }}">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">
                                                @if($errors->has('password'))
                                                @foreach($errors->get('password') as $message)
                                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                                @endforeach
                                                @endif
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5" placeholder="{{ trans('admin.password') }}" name="password">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                                @if(config('admin.auth.remember'))
                                                <div class="form-check form-switch">
                                                    
                                                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name="remember" value="1" {{ (!old('username') || old('remember')) ? 'checked' : '' }}>
                                                      
                                                  <label class="form-check-label" for="flexSwitchCheckChecked">{{ trans('admin.remember_me') }}</label>
                                              </div>
                                              @endif
                                                
                                            </div>
                                            <div class="col-xs-4">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              
                                          </div>
                                            <!-- <div class="col-6 text-end"> <a href="forgot-password.php">Forgot Password ?</a>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.login') }}</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->

    <script src="{{ admin_asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ admin_asset('assets/js/pace.min.js') }}"></script>
    <script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>