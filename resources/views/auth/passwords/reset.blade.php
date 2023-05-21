<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" href="{{ secure_asset('images/logo/logo-c-white.svg') }}" sizes="32x32">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/logo/logo-c-white.svg') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Club - Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ secure_asset('js/settings.js') }}" sync></script>
</head>

<body class=" font-inter skin-default">
<!-- [if IE]> <p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p> <![endif] -->

<div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url({{ asset('images/all-img/page-bg-2.png') }});">
    <div class="lg-inner-column">
        <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
                <a href="{{ route('IndexPage') }}" class="">
                    <img src="{{ secure_asset('public-website/img/logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
            <div class="auth-box-3">
                <div class="mobile-logo text-center mb-6 lg:hidden block">
                    <a href="{{ route('IndexPage') }}">
                        <img src="{{ secure_asset('public-website/img/logo.png') }}" alt="" class="mb-10 dark_logo">
                        <img src="{{ secure_asset('public-website/img/logo.png') }}" alt="" class="mb-10 dark_logo">
                    </a>
                </div>
                <div class="text-center 2xl:mb-10 mb-5">
                    <h4 class="font-medium">{{ __('Reset Password') }}</h4>
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Reset Your Password: Regain Access to Your Gym Club Space Account
                    </div>
                </div>

                <!-- BEGIN: Registration Form -->
                <form class="space-y-4" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="fromGroup">
                        <div class="relative ">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="fromGroup">
                        <label for="password" class="block capitalize form-label">{{ __('Password') }}</label>
                        <div class="relative ">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="fromGroup">
                        <label for="password-confirm" class="block capitalize form-label">{{ __('Confirm Password') }}</label>
                        <div class="relative ">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark block w-full text-center">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
        <div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
            Unlock your Empower Fitness Performance
        </div>
    </div>
</div>

<!-- scripts -->
<script src="{{ secure_asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ secure_asset('js/rt-plugins.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
