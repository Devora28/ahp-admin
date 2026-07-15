@extends('_main.main')
@section('title')
    ویرایش پروفایل
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">ویرایش پروفایل</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">صفحات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش پروفایل</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row" dir="rtl">
                    <div class="col-xl-4">
                        <div class="card">
                            <form action="{{route('update-password')}}" method="POST">
                                @csrf
                                <div class="card-header">
                                    <div class="card-title">ویرایش رمز عبور</div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center chat-image mb-5">
                                        <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                            <a href="{{route('profile-page',['id'=>auth()->id()])}}"><img alt="avatar" src="{{asset('assets/images/users/7.jpg')}}" class="brround"></a>
                                        </div>
                                        @php
                                            $fullName = auth()->user()->first_name && auth()->user()->last_name ? auth()->user()->first_name.' '.auth()->user()->last_name : '';
                                            $role = '';
                                            switch(auth()->user()->role){
                                                case 'superadmin':
                                                   $role = 'مدیر اصلی';
                                                break;
                                                case 'admin':
                                                   $role = 'مدیر';
                                                break;
                                                case 'editor':
                                                   $role = 'نویسنده';
                                                break;
                                                case 'support':
                                                   $role = 'پشتیبان';
                                                break;
                                                case 'vendor':
                                                   $role = 'فروشنده';
                                                break;
                                            }
                                        @endphp
                                        <div class="main-chat-msg-name">
                                            <a href="{{route('profile-page',['id'=>auth()->id()])}}">
                                                <h5 class="mb-1 text-dark fw-semibold">{{$fullName}}</h5>
                                            </a>
                                            <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{$role}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="text-align: right">رمز عبور فعلی</label>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 form-control" type="password" placeholder="رمز عبور فعلی" name="current_password">
                                        </div>
                                        @error('current_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="text-align: right">رمز عبور جدید</label>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 form-control" type="password" placeholder="رمز عبور جدید" name="password">
                                        </div>
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="text-align: right">تکرار رمز عبور جدید</label>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 form-control" type="password" placeholder="تکرار رمز عبور جدید" name="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary w-100">بروزرسانی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش اطلاعات کاربری</h3>
                            </div>
                            <form action="{{route('update-admin-profile')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group" style="text-align: right">
                                                <label for="exampleInputname">نام</label>
                                                <input type="text" class="form-control" id="exampleInputname" placeholder="نام" value="{{auth()->user()->first_name}}" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group" style="text-align: right">
                                                <label for="exampleInputname1">نام خانوادگی</label>
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="نام خانوادگی" value="{{auth()->user()->last_name}}" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align: right">
                                        <label for="exampleInputEmail1">آدرس ایمیل</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ایمیل" value="{{auth()->user()->email}}" name="email">
                                    </div>
                                    <div class="form-group" style="text-align: right">
                                        <label for="exampleInputnumber">شماره موبایل</label>
                                        <input type="text" class="form-control" id="exampleInputnumber" placeholder="موبایل" value="{{auth()->user()->mobile}}" name="mobile">
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-success my-1 w-100">بروزرسانی</button>
                                </div>
                            </form>
                        </div>
                        <div class="card panel-theme">
                            <div class="card-header">
                                <div class="float-start">
                                    <h3 class="card-title">مشخصات</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body no-padding">
                                <ul class="list-group no-margin">
                                    <li class="list-group-item d-flex ps-3">
                                        <div class="social social-profile-buttons me-2">
                                            <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-mail"></i></a>
                                        </div>
                                        <a href="javascript:void(0)" class="my-auto">{{auth()->user()->email}}</a>
                                    </li>
                                    <li class="list-group-item d-flex ps-3">
                                        <div class="social social-profile-buttons me-2">
                                            <a class="social-icon text-primary" href="javascript:void(0)"><i class="fe fe-phone"></i></a>
                                        </div>
                                        <a href="javascript:void(0)" class="my-auto">{{auth()->user()->mobile}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 CLOSED -->

            </div>
            <!--CONTAINER CLOSED -->

        </div>
    </div>
    <!--app-content open-->
@endsection
@section('script-dependencies')
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>
    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection

