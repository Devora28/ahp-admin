@extends('_main.auth')
@section('title')
    فراموشی رمز عبور
@endsection
@section('content')
    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo-white.png')}}" class="header-brand-img m-0" alt="logo"></a>
                </div>
            </div>
            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form" action="{{route('password-email')}}">
                        @csrf
                            <span class="login100-form-title pb-5">
                                فراموشی رمز عبور
                            </span>
                        <p class="text-muted text-center">ایمیل مربوط به حساب خود را وارد کنید</p>
                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="ایمیل" dir="rtl" name="email">
                        </div>
                        <div class="submit">
                            <button class="login100-form-btn btn btn-primary d-grid">تایید</button>
                        </div>
                        <div class="text-center mt-4">
                            <p class="text-dark mb-0">یادتان آمد؟ <a class="text-primary ms-1" href="{{route('login-page')}}">ورود </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END PAGE -->
@endsection
