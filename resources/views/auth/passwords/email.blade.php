<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-c-white.svg') }}" sizes="32x32">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo-c-white.svg') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Gym Club - Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('js/settings.js') }}" sync></script>
</head>

<body class=" font-inter skin-default">
<!-- [if IE]> <p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p> <![endif] -->

<div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url({{ asset('images/all-img/page-bg-3.png') }});">
    <div class="lg-inner-column">
        <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
                <a href="{{ route('IndexPage') }}" class="">
                    <img src="{{ asset('public-website/img/logo.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
            <div class="auth-box-3">
                <div class="mobile-logo text-center mb-6 lg:hidden block">
                    <a href="{{ route('IndexPage') }}">
                        <img src="{{ asset('public-website/img/logo.png') }}" class="mb-10 dark_logo" alt="">
                        <img src="{{ asset('public-website/img/logo.png') }}" class="mb-10 white_logo" alt="">
                    </a>
                </div>
                <div class="text-center 2xl:mb-10 mb-5">
                    <h4 class="font-medium mb-4">Forgot Your Password?</h4>
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Reset Password with Gym Club.
                    </div>
                </div>
                <div class="font-normal text-base text-slate-500 dark:text-slate-400 text-center px-2 bg-slate-100 dark:bg-slate-600 rounded
                            py-3 mb-4 mt-10">
                    Enter your Email and instructions will be sent to you!
                </div>
                <!-- BEGIN: Forgot Password Form -->
                <form method="POST" class="space-y-4" action="{{ route('password.email') }}">
                    @csrf
                    <div class="fromGroup">
                        <label class="block capitalize form-label">email</label>
                        <div class="relative ">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark block w-full text-center">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
                <!-- END: Forgot Password Form -->

                <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                    <div class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                        FORGET IT
                    </div>
                </div>
                <div class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                    <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-medium hover:underline">
                        SEND ME BACK
                    </a>
                    TO THE SIGN IN
                </div>
            </div>
        </div>
        <div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
            Unlock your Fitness Power
        </div>
    </div>
</div>

<!-- scripts -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/rt-plugins.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
