<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"
          content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />
    <!-- TITLE -->
    <title>@yield('title')</title>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />
    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />
    @yield('style-dependencies')
</head>
<body class="app sidebar-mini ltr light-mode">
<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->
<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <!-- app-Header -->
        <div class="app-header header sticky">
            <div class="container-fluid main-container">
                <div class="d-flex">
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
                    <!-- sidebar-toggle-->
                    <a class="logo-horizontal" href="#">
                        <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                             alt="logo">
                    </a>
                    <!-- LOGO -->
                    <div class="main-header-center ms-3 d-none d-lg-block">
                        <input type="text" class="form-control" id="typehead" placeholder="... جست و جو">
                        <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="d-flex order-lg-2 ms-auto header-right-icons">
                        <!-- SEARCH -->
                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                        </button>
                        <div class="navbar navbar-collapse responsive-navbar p-0">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                <div class="d-flex order-lg-2">
                                    <div class="dropdown d-lg-none d-flex">
                                        <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                            <i class="fe fe-search"></i>
                                        </a>
                                        <div class="dropdown-menu header-search dropdown-menu-start">
                                            <div class="input-group w-100 p-2">
                                                <input type="text" class="form-control" placeholder="Search....">
                                                <div class="input-group-text btn btn-primary">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- COUNTRY -->
                                    <div class="d-flex country">
                                        <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                            <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                            <span class="light-layout"><i class="fe fe-sun"></i></span>
                                        </a>
                                    </div>
                                    <!-- CART -->
                                    <div class="dropdown d-flex">
                                        <a class="nav-link icon full-screen-link nav-link-bg">
                                            <i class="fe fe-minimize fullscreen-button"></i>
                                        </a>
                                    </div>
                                    <!-- FULL-SCREEN -->
                                    <div class="dropdown  d-flex notifications">
                                        <a class="nav-link icon" data-bs-toggle="dropdown"><i
                                                class="fe fe-bell"></i><span class=" pulse"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <div class="drop-heading border-bottom">
                                                <div class="d-flex">
                                                    <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">اعلان ها
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="notifications-menu">
                                                <a class="dropdown-item d-flex" href="notify-list.html">
                                                    <div class="me-3 notifyimg  bg-primary brround box-shadow-primary">
                                                        <i class="fe fe-mail"></i>
                                                    </div>
                                                    <div class="mt-1 wd-80p">
                                                        <h5 class="notification-label mb-1">
                                                            درخواست جدید دریافت شد
                                                        </h5>
                                                        <span class="notification-subtext">3 روز پیش</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="notify-list.html">
                                                    <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                                                        <i class="fe fe-check-circle"></i>
                                                    </div>
                                                    <div class="mt-1 wd-80p">
                                                        <h5 class="notification-label mb-1">
                                                            پروژه تایید شده است
                                                        </h5>
                                                        <span class="notification-subtext">2 ساعت پیش</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="notify-list.html">
                                                    <div class="me-3 notifyimg  bg-success brround box-shadow-success">
                                                        <i class="fe fe-shopping-cart"></i>
                                                    </div>
                                                    <div class="mt-1 wd-80p">
                                                        <h5 class="notification-label mb-1">پروژه شما تحویل شده است
                                                        </h5>
                                                        <span class="notification-subtext">30 دقیقه پیش</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="notify-list.html">
                                                    <div class="me-3 notifyimg bg-pink brround box-shadow-pink">
                                                        <i class="fe fe-user-plus"></i>
                                                    </div>
                                                    <div class="mt-1 wd-80p">
                                                        <h5 class="notification-label mb-1">درخواست دوستی</h5>
                                                        <span class="notification-subtext">1 روز پیش</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
                                            <a href="notify-list.html"
                                               class="dropdown-item text-center p-3 text-muted">نمایش همه اعلان ها</a>
                                        </div>
                                    </div>
                                    <!-- NOTIFICATIONS -->
                                    <div class="dropdown  d-flex message">
                                        <a class="nav-link icon text-center" data-bs-toggle="dropdown">
                                            <i class="fe fe-message-square"></i><span class="pulse-danger"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <div class="drop-heading border-bottom">
                                                <div class="d-flex">
                                                    <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">شما # پیام دارید</h6>
                                                    <div class="ms-auto">
                                                        <a href="#" class="text-muted p-0 fs-12">خواندن همه</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="message-menu message-menu-scroll">
                                                <a class="dropdown-item d-flex" href="chat.html">
                                                    <span class="avatar avatar-md brround me-3 align-self-center cover-image" data-bs-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
                                                    <div class="wd-90p">
                                                        <div class="d-flex">
                                                            <h5 class="mb-1">Peter Theil</h5>
                                                            <small class="text-muted ms-auto text-end">
                                                                6:45 am
                                                            </small>
                                                        </div>
                                                        <span>Commented on file Guest list....</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="chat.html">
                                                    <span class="avatar avatar-md brround me-3 align-self-center cover-image" data-bs-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
                                                    <div class="wd-90p">
                                                        <div class="d-flex">
                                                            <h5 class="mb-1">Peter Theil</h5>
                                                            <small class="text-muted ms-auto text-end">
                                                                6:45 am
                                                            </small>
                                                        </div>
                                                        <span>Commented on file Guest list....</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="chat.html">
                                                    <span class="avatar avatar-md brround me-3 align-self-center cover-image" data-bs-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
                                                    <div class="wd-90p">
                                                        <div class="d-flex">
                                                            <h5 class="mb-1">Peter Theil</h5>
                                                            <small class="text-muted ms-auto text-end">
                                                                6:45 am
                                                            </small>
                                                        </div>
                                                        <span>Commented on file Guest list....</span>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="chat.html">
                                                    <span class="avatar avatar-md brround me-3 align-self-center cover-image" data-bs-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
                                                    <div class="wd-90p">
                                                        <div class="d-flex">
                                                            <h5 class="mb-1">Peter Theil</h5>
                                                            <small class="text-muted ms-auto text-end">
                                                                6:45 am
                                                            </small>
                                                        </div>
                                                        <span>Commented on file Guest list....</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
                                            <a href="#" class="dropdown-item text-center p-3 text-muted">نمایش همه پیام ها</a>
                                        </div>
                                    </div>
                                    @auth('admin')
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="#" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="{{asset('assets/images/users/21.jpg')}}" alt="profile-user"
                                                     class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name}}</h5>
                                                        <small class="text-muted">
                                                            @switch(Auth::guard('admin')->user()->role)
                                                                @case('superadmin')
                                                                    مدیر کل
                                                                    @break
                                                                @case('admin')
                                                                    ادمین
                                                                    @break
                                                                @case('editor')
                                                                    نویسنده
                                                                    @break
                                                                @case('support')
                                                                    پشتیبان
                                                                    @break
                                                                @case('vendor')
                                                                    فروشنده
                                                                    @break
                                                            @endswitch
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="profile.html">
                                                    <i class="dropdown-icon fe fe-user"></i> پروفایل
                                                </a>
                                                <a class="dropdown-item" href="email-inbox.html">
                                                    <i class="dropdown-icon fe fe-mail"></i> دریافتی
                                                    <span class="badge bg-facebook-gradient rounded-pill float-end">4</span>
                                                </a>
                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button class="dropdown-item bg-danger-transparent">
                                                        <i class="dropdown-icon fe fe-alert-circle"></i> خروج
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /app-Header -->
        <!--APP-SIDEBAR-->
        <div class="sticky">
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="app-sidebar">
                <div class="side-header">
                    <a class="header-brand1" href="{{route('home')}}">
                        <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{asset('assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo"
                             alt="logo">
                        <img src="{{asset('assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                        <img src="{{asset('assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                             alt="logo">
                    </a>
                    <!-- LOGO -->
                </div>
                <div class="main-sidemenu">
                    <div class="slide-left disabled" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                        </svg>
                    </div>
                    <ul class="side-menu">
                        <li class="sub-category">
                            <h3>اصلی</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.html"><i
                                    class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">داشبورد</span></a>
                        </li>
                        <li class="sub-category">
                            <h3>کیت صفحات</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                <i class="side-menu__icon fe fe-slack"></i>
                                <span class="side-menu__label">صفحات</span>
                                <i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="#">صفحات</a></li>
                                <li><a href="{{route('profile-page',['id'=>auth()->id()])}}" class="slide-item">پروفایل</a></li>
                                <li><a href="{{route('edit-profile-page',['id'=>auth()->id()])}}" class="slide-item">ویرایش پروفایل</a></li>
                                <li><a href="notify-list.html" class="slide-item">لیست اعلان ها</a></li>
                                <li><a href="{{route('users-list')}}" class="slide-item">لیست کاربران</a></li>
                                <li><a href="settings.html" class="slide-item">تنظیمات</a></li>
                                <li><a href="blog.html" class="slide-item">وبلاگ</a></li>
                                <li><a href="blog-details.html" class="slide-item">جزئیات وبلاگ</a>
                                </li>
                                <li><a href="blog-post.html" class="slide-item">مقاله وبلاگ</a></li>
                            </ul>
                        </li>
                        <li class="sub-category">
                            <h3>صفحات فروشگاه</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-shopping-bag"></i><span
                                    class="side-menu__label">محصولات</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="#">محصولات</a></li>
                                <li><a href="{{route('products-list')}}" class="slide-item">محصولات</a></li>
                                <li><a href="{{route('add-product-page')}}" class="slide-item">افزودن محصول</a></li>
                            </ul>
                        </li>
                        <li class="sub-category">
                            <h3>صفحات احراز هویت</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-users"></i><span
                                    class="side-menu__label">احراز هویت</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="#">احراز هویت</a></li>
                                <li><a href="{{route('login-page')}}" class="slide-item">ورود</a></li>
                                <li><a href="register.html" class="slide-item">ثبت نام</a></li>
                                <li><a href="forgot-password.html" class="slide-item">فراموشی رمز عبور</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                                                   width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                        </svg></div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->
        </div>
        <!--app-content open-->
        @yield('content')
        <!--app-content close-->
    </div>
    <!-- FOOTER -->
    <footer class="footer" dir="rtl">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    تمامی حقوق برای فروشگاه
                    <a href="#"> اهرون‌شاپ </a>
                    محفوظ است.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->
</div>
<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
@yield('script-dependencies')
</body>
</html>
