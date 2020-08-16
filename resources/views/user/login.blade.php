<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Automatic Car Share System - User Login</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="{{asset('resources/theme/assets/demo/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{asset('resources/theme/assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url({{asset('resources/theme/assets/app/media/img//bg/bg-3.jpg')}});">
        <div class="m-login__wrapper-1 m-portlet-full-height">
            <div class="m-login__wrapper-1-1">
                <div class="m-login__contanier">
                    <div class="m-login__content">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{asset('resources/theme/assets/app/media/img/logos/logo-2.png')}}">
                            </a>
                        </div>
                        <div class="m-login__title">
                            <h3>Automatic Car Share System</h3>
                        </div>
                        <div class="m-login__desc">

                        </div>
                        <div class="m-login__form-action">
                            <a href="{{url('/register')}}" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">Get An Account</a>
                        </div>
                    </div>
                </div>
                <div class="m-login__border">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Login To Your Account</h3>
                    </div>
                    <form method="post" class="m-login__form m-form">
                        @csrf
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="email" placeholder="Email" name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="Password" placeholder="Password" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                            </div>
                        </div>
                        <div class="m-login__account">
                            @if(!!$errors)
                                @foreach($errors as $error)
                                    <span class="m-login__account-msg text-danger">
                                {{$error}}
                            </span>
                                @endforeach
                            @endif
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->
</body>

<!-- end::Body -->
</html>