@extends('_main.main')
@section('title')
    پروفایل
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">پروفایل</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">صفحات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">پروفایل</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row" id="user-profile">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="wideget-user mb-2">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row">
                                                <div class="panel profile-cover">
                                                    <div class="profile-cover__action bg-img"></div>
                                                    <div class="profile-cover__img">
                                                        <div class="profile-img-1">
                                                            <img src="{{asset('assets/images/users/21.jpg')}}" alt="img">
                                                        </div>
                                                        <div class="profile-img-content text-dark text-start">
                                                            <div class="text-dark">
                                                                <h3 class="h3 mb-2">
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
                                                                    {{$fullName}}</h3>
                                                                <h5 class="text-muted">{{$role}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn-profile">
                                                        <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-rss"></i> <span>دنبال کردن</span></button>
                                                        <button class="btn btn-secondary mt-1 mb-1"> <i class="fa fa-envelope"></i> <span>پیام دادن</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="px-0 px-sm-4">
                                                    <div class="social social-profile-buttons mt-5 float-end">
                                                        <div class="mt-3">
                                                            <a class="social-icon text-primary" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                                            <a class="social-icon text-primary" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                                            <a class="social-icon text-primary" href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                                                            <a class="social-icon text-primary" href="javascript:void(0)"><i class="fa fa-rss"></i></a>
                                                            <a class="social-icon text-primary" href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                            <a class="social-icon text-primary" href="https://myaccount.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
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
