
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
    <title>Welcome to your Gym Club</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ secure_asset('js/settings.js') }}" sync></script></head>
<body class="font-inter skin-default">
<div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url({{ asset('images/all-img/page-bg.png') }});">
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
                        <img src="{{ asset('images/logo/logo-white.png') }}" alt="" class="mb-10 white_logo">
                    </a>
                </div>
                <div class="text-center 2xl:mb-10 mb-5">
                    <h4 class="font-medium">Gym Tracker</h4>
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Log in to your account and embark on your fitness journey with us
                    </div>
                </div>
                <!-- BEGIN: Login Form -->
                <form class="space-y-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="fromGroup">
                        <label class="block capitalize form-label">email</label>
                        <div class="relative">
                            <input type="email" name="email" class="form-control py-2" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="text-danger" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fromGroup">
                        <label class="block capitalize form-label">password</label>
                        <div class="relative">
                            <input type="password" name="password" class="form-control py-2" placeholder="Password" required autocomplete="current-password">
                        </div>
                        @error('password')
                        <span class="text-danger" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="hidden" {{ old('remember') ? 'checked' : '' }}>
                            <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed in</span>
                        </label>
                        <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium" href="{{ route('password.request') }}">Forgot
                            Password?
                        </a>
                    </div>
                    <button class="btn btn-dark block w-full text-center">Sign in</button>
                </form>
                <!-- END: Login Form -->
                <!-- Add necessary footer content -->
            </div>
        </div>
        <div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
            Empower Your Fitness Journey

        </div>
    </div>
</div>
<!-- Add necessary scripts -->
<script src="{{ secure_asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ secure_asset('js/rt-plugins.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
