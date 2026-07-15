@extends('_main.auth')
@section('title')
    رمز عبور جدید
@endsection
@section('content')
    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo-white.png')}}" class="header-brand-img" alt=""></a>
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form" method="post" action="{{route('reset-password')}}">
                        @csrf
                        <span class="login100-form-title pb-5">
                                رمز عبور جدید
                            </span>
                        <div class="panel panel-primary">
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0" type="password" placeholder="رمز عبور" dir="rtl" name="password">
                                        </div>
                                        @error('password')
                                        <p class="text-danger text-sm-center">{{$message}}</p>
                                        @enderror
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0" type="password" placeholder="تکرار رمز عبور" dir="rtl" name="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
                                        <p class="text-danger text-sm-center">{{$message}}</p>
                                        @enderror
                                        <div class="container-login100-form-btn">
                                            <button class="login100-form-btn btn-primary">
                                                تایید
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->
@endsection
