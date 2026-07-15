@extends('_main.main')
@section('title') صفحه اصلی @endsection
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header flex justify-content-center">
                    <h1 class="page-title">داشبورد اصلی</h1>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">کل کاربران</h6>
                                                <h2 class="mb-0 number-font">{{$users?number_format($users):0}}</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-muted fs-12">
                                            <span class="text-secondary">
                                                <i class="fe fe-arrow-up-circle text-secondary"></i>
                                                {{$userWeekPercent}}%
                                            </span>
                                            هفته گذشته
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">کل سود</h6>
                                                <h2 class="mb-0 number-font">0</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <canvas id="leadschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-muted fs-12">
                                            <span class="text-pink">
                                                <i class="fe fe-arrow-down-circle text-pink"></i>
                                                0%
                                            </span>
                                            هفته گذشته
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">کل هزینه ها</h6>
                                                <h2 class="mb-0 number-font">0</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <canvas id="profitchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-muted fs-12">
                                            <span class="text-green">
                                                <i class="fe fe-arrow-up-circle text-green"></i>
                                                0%
                                            </span>
                                            هفته گذشته
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">کل مخارج</h6>
                                                <h2 class="mb-0 number-font">0</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="chart-wrapper mt-1">
                                                    <canvas id="costchart" class="h-8 w-9 chart-dropshadow"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-muted fs-12">
                                            <span class="text-warning">
                                                <i class="fe fe-arrow-up-circle text-warning"></i>
                                                0%
                                            </span>
                                            یک‌سال گذشته
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 END -->

                <!-- ROW-2 -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تجزیه و تحلیل فروش</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                    <div class="d-flex text-center justify-content-center me-3"><span
                                            class="dot-label bg-primary my-auto"></span>کل فروش</div>
                                    <div class="d-flex text-center justify-content-center"><span
                                            class="dot-label bg-secondary my-auto"></span>کل سفارشات</div>
                                </div>
                                <div class="chartjs-wrapper-demo">
                                    <canvas id="transactions" class="chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body pb-0 bg-recentorder">
                                <h3 class="card-title text-white">سفارشات اخیر</h3>
                                <div class="chartjs-wrapper-demo">
                                    <canvas id="recentorders" class="chart-dropshadow"></canvas>
                                </div>
                            </div>
                            <div id="flotback-chart" class="flot-background"></div>
                            <div class="card-body">
                                <div class="d-flex mb-4 mt-3">
                                    <div
                                        class="avatar avatar-md bg-secondary-transparent text-secondary bradius me-3">
                                        <i class="fe fe-check"></i>
                                    </div>
                                    <div class="">
                                        <h6 class="mb-1 fw-semibold">سفارشات تحویل شده</h6>
                                        <p class="fw-normal fs-12"> <span class="text-success">0%</span>
                                            افزایش </p>
                                    </div>
                                    <div class=" ms-auto my-auto">
                                        <p class="fw-bold fs-20">0</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="avatar  avatar-md bg-pink-transparent text-pink bradius me-3">
                                        <i class="fe fe-x"></i>
                                    </div>
                                    <div class="">
                                        <h6 class="mb-1 fw-semibold">سفارشات لغو شده</h6>
                                        <p class="fw-normal fs-12"> <span class="text-success">0%</span>
                                            افزایش </p>
                                    </div>
                                    <div class=" ms-auto my-auto">
                                        <p class="fw-bold fs-20 mb-0">0</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <!-- ROW-2 END -->
                <!-- ROW-3 -->
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title fw-semibold">فعالیت روزانه</h4>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="task-list">
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-primary"></i>
                                            <h6 class="fw-semibold">اتمام کار
                                                <span class="text-muted fs-11 mx-2 fw-normal">
                                                    06 فروردین 1405
                                                </span>
                                            </h6>
                                            <p class="text-muted fs-12">احمدرضا وظیفه اش را تمام کرد در
                                                <a href="#" class="fw-semibold">مدیریت پروژه</a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit">
                                                <span class="fe fe-edit"></span>
                                            </a>
                                            <a href="#" class="text-muted">
                                                <span class="fe fe-trash-2"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-secondary"></i>
                                            <h6 class="fw-semibold">
                                                کامنت جدید
                                                <span class="text-muted fs-11 mx-2 fw-normal">06 فروردین 1405</span>
                                            </h6>
                                            <p class="text-muted fs-12">
                                                فیروز یک کامنت گذاشت درباره ی
                                                <a href="#" class="fw-semibold"> پروژه لاراول </a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit">
                                                <span class="fe fe-edit"></span>
                                            </a>
                                            <a href="#" class="text-muted">
                                                <span class="fe fe-trash-2"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-success"></i>
                                            <h6 class="fw-semibold">اتمام کار<span
                                                    class="text-muted fs-11 mx-2 fw-normal">06 فروردین 1405</span>
                                            </h6>
                                            <p class="text-muted fs-12">کامبیز وظیفه اش را تمام کرد در
                                                <a href="#" class="fw-semibold">
                                                    افزودن محصول</a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit"><span
                                                    class="fe fe-edit"></span></a>
                                            <a href="#" class="text-muted"><span
                                                    class="fe fe-trash-2"></span></a>
                                        </div>
                                    </li>
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-warning"></i>
                                            <h6 class="fw-semibold">کار عقب افتاده<span
                                                    class="text-muted fs-11 mx-2 fw-normal">06 فروردین 1405</span>
                                            </h6>
                                            <p class="text-muted mb-0 fs-12">
                                                سهراب یک کار انجام نشده دارد در
                                                <a href="#" class="fw-semibold"> محصولات </a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit"><span
                                                    class="fe fe-edit"></span></a>
                                            <a href="#" class="text-muted"><span
                                                    class="fe fe-trash-2"></span></a>
                                        </div>
                                    </li>
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-danger"></i>
                                            <h6 class="fw-semibold">کامنت جدید<span
                                                    class="text-muted fs-11 mx-2 fw-normal">06 فروردین 1405</span>
                                            </h6>
                                            <p class="text-muted mb-0 fs-12">
                                                دلبر یک کامنت گذاشت درباره ی
                                                <a href="#" class="fw-semibold"> مدیریت </a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit"><span
                                                    class="fe fe-edit"></span></a>
                                            <a href="#" class="text-muted"><span
                                                    class="fe fe-trash-2"></span></a>
                                        </div>
                                    </li>
                                    <li class="d-sm-flex">
                                        <div>
                                            <i class="task-icon bg-info"></i>
                                            <h6 class="fw-semibold">اتمام کار<span
                                                    class="text-muted fs-11 mx-2 fw-normal">06 فروردین 1405</span>
                                            </h6>
                                            <p class="text-muted fs-12">
                                                کامبیز وظیفه اش را تمام کرد در
                                                <a href="#" class="fw-semibold"> سفارشات </a>
                                            </p>
                                        </div>
                                        <div class="ms-auto d-md-flex">
                                            <a href="#" class="text-muted me-2" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit" aria-label="Edit"><span
                                                    class="fe fe-edit"></span></a>
                                            <a href="#" class="text-muted"><span
                                                    class="fe fe-trash-2"></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">گزارش های فروش در نقاط جهان</h3>
                                </div>
                            </div>
                            <div class="card-body p-0 mt-2">
                                <div class="">
                                    <div id="world-map-markers1" class="worldh world-map h-250"></div>
                                </div>
                                <div class="table-responsive mt-2 text-center">
                                    <table class="table text-nowrap border-dashed mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-start">دستگاه</th>
                                            <th class="">ایران</th>
                                            <th class="">هند</th>
                                            <th class="">بحرین</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-start p-4"><span class="sales-icon text-primary mx-2 brround bg-primary-transparent p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                </span>
                                                <span class="mobile">موبایل</span>
                                            </td>
                                            <td class="p-4">17%</td>
                                            <td class="p-4">22%</td>
                                            <td class="p-4">11%</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start p-4">
                                                <span class="sales-icon text-secondary mx-2 brround bg-secondary-transparent p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                                        <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                                                    </svg>
                                                </span>دسکتاپ</td>
                                            <td class="p-4">34%</td>
                                            <td class="p-4">76%</td>
                                            <td class="p-4">58%</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start p-4">
                                                <span class="sales-icon text-danger mx-2 brround bg-danger-transparent p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-tablet" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                </span>تبلت</td>
                                            <td class="p-4">56%</td>
                                            <td class="p-4">83%</td>
                                            <td class="p-4">66%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--end /table-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title fw-semibold">مرورگر ها</h4>
                            </div>
                            <div class="card-body">
                                <div class="browser-stats">
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/chrome.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Chrome</h6>
                                                <h6 class="fw-semibold mb-1">35,502 <span
                                                        class="text-success fs-11">(<i
                                                            class="fe fe-arrow-up"></i>12.75%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-primary" style="width: 70%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/opera.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Opera</h6>
                                                <h6 class="fw-semibold mb-1">12,563 <span
                                                        class="text-danger fs-11">(<i
                                                            class="fe fe-arrow-down"></i>15.12%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-secondary" style="width: 40%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/ie.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">IE</h6>
                                                <h6 class="fw-semibold mb-1">25,364 <span
                                                        class="text-success fs-11">(<i
                                                            class="fe fe-arrow-down"></i>24.37%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-success" style="width: 50%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/firefox.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Firefox</h6>
                                                <h6 class="fw-semibold mb-1">14,635 <span
                                                        class="text-success fs-11">(<i
                                                            class="fe fe-arrow-down"></i>15.63%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-danger" style="width: 50%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/edge.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Edge</h6>
                                                <h6 class="fw-semibold mb-1">15,453 <span
                                                        class="text-danger fs-11">(<i
                                                            class="fe fe-arrow-down"></i>23.70%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-warning" style="width: 10%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/safari.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Safari</h6>
                                                <h6 class="fw-semibold mb-1">10,054 <span
                                                        class="text-success fs-11">(<i
                                                            class="fe fe-arrow-up"></i>11.04%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-info" style="width: 40%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-lg-3 col-xl-3 col-xxl-2 mb-sm-0 mb-3">
                                            <img src="{{asset('assets/images/browsers/netscape.svg')}}" class="img-fluid"
                                                 alt="img">
                                        </div>
                                        <div class="col-sm-10 col-lg-9 col-xl-9 col-xxl-10 ps-sm-0">
                                            <div class="d-flex align-items-end justify-content-between mb-1">
                                                <h6 class="mb-1">Netscape</h6>
                                                <h6 class="fw-semibold mb-1">35,502 <span
                                                        class="text-success fs-11">(<i
                                                            class="fe fe-arrow-up"></i>12.75%)</span></h6>
                                            </div>
                                            <div class="progress h-2 mb-3">
                                                <div class="progress-bar bg-green" style="width: 30%;"
                                                     role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-3 END -->
                <!-- ROW-4 -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">سفارشات اخیر</h3>
                            </div>
                            <div class="card-body pt-4">
                                <div class="grid-margin">
                                    <div class="">
                                        <div class="panel panel-primary">
                                            <div class="tab-menu-heading border-0 p-0">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs product-sale">
                                                        <li><a href="{{url()->current()}}" class="{{request('sort','all') == 'all'? 'active' : ''}}">همه سفارشات</a></li>
                                                        <li><a href="{{url()->current()}}?sort=shipped"
                                                               class="{{request('sort') == 'shipped' ? 'active' : ''}}">ارسال شده</a></li>
                                                        <li><a href="{{url()->current()}}?sort=pending"
                                                               class="{{request('sort') == 'pending' ? 'active' : ''}}">درانتظار</a></li>
                                                        <li><a href="{{url()->current()}}?sort=cancelled"
                                                               class="{{request('sort') == 'cancelled' ? 'active' : ''}}">لغو شده</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body border-0 pt-0">
                                                @if(isset($recentOrders) && $recentOrders->count())
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-nowrap mb-0" dir="rtl" id="order-table">
                                                            <thead class="border-top text-center">
                                                            <tr>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 5%;">کد رهگیری</th>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 5%;">گیرنده</th>
                                                                <th class="bg-transparent border-bottom-0">آدرس گیرنده</th>
                                                                <th class="bg-transparent border-bottom-0">
                                                                    تاریخ</th>
                                                                <th class="bg-transparent border-bottom-0">
                                                                    مبلغ(تومان)</th>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 10%;">وضعیت</th>
                                                                <th class="bg-transparent border-bottom-0"
                                                                    style="width: 5%;">عملیات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                            @foreach(@$recentOrders as $order)
                                                                <tr class="border-bottom">
                                                                    <td class="text-center">
                                                                        <div class="mt-0 mt-sm-2 d-block">
                                                                            <h6 class="mb-0 fs-14 fw-semibold">
                                                                                #{{$order->order_code}}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="mt-0 mt-sm-3 d-block">
                                                                                @php
                                                                                $firstName = $order->user->first_name;
                                                                                $lastName = $order->user->last_name;
                                                                                $userOrder = $firstName && $lastName? $firstName.' '.$lastName:'بدون نام';
                                                                                @endphp
                                                                                <h6 class="mb-0 fs-14 fw-semibold">
                                                                                    {{$userOrder}}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="mt-0 mt-sm-3 d-block">
                                                                                <p class="mb-0 fs-14 fw-semibold">{{$order->address->address??'خالی'}}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="mt-sm-2 d-block">
                                                                            27 فروردین 1405
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="fw-semibold mt-sm-2 d-block">
                                                                            {{number_format($order->total_price)}}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        @switch($order->status)
                                                                            @case('pending')
                                                                                <div class="mt-sm-1 d-block">
                                                                                    <span class="badge bg-warning-transparent rounded-pill text-warning p-2 px-3">منتظر تاببد</span>
                                                                                </div>
                                                                            @break
                                                                            @case('processing')
                                                                                <div class="mt-sm-1 d-block">
                                                                                    <span class="badge bg-info-transparent rounded-pill text-info p-2 px-3">درحال پردازش</span>
                                                                                </div>
                                                                            @break
                                                                            @case('shipped')
                                                                                <div class="mt-sm-1 d-block">
                                                                                    <span class="badge bg-primary-transparent rounded-pill text-primary p-2 px-3">ارسال شده</span>
                                                                                </div>
                                                                            @break
                                                                            @case('completed')
                                                                                <div class="mt-sm-1 d-block">
                                                                                    <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">تکمیل شده</span>
                                                                                </div>
                                                                            @break
                                                                            @case('cancelled')
                                                                                <div class="mt-sm-1 d-block">
                                                                                    <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">لغو شده</span>
                                                                                </div>
                                                                            @break
                                                                        @endswitch
                                                                    </td>
                                                                    <td>
                                                                        <div class="g-2">
                                                                            <a class="btn text-primary btn-sm"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-original-title="Edit"><span
                                                                                    class="fe fe-edit fs-14"></span></a>
                                                                            <a class="btn text-danger btn-sm"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-original-title="Delete"><span
                                                                                    class="fe fe-trash-2 fs-14"></span></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        {{ $recentOrders->links('pagination.pagination') }}
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center py-5">
                                                        <div class="text-center w-100">
                                                            <div class="mb-3">
                                                                <i class="fe fe-package text-muted" style="font-size: 48px;"></i>
                                                            </div>
                                                            <h5 class="mb-2 fw-semibold">سفارشی موجود نیست</h5>
                                                            <p class="text-muted mb-0 px-3">
                                                                در حال حاضر موردی برای نمایش در این بخش پیدا نشد
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-4 END -->
            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
@endsection
@section('script-dependencies')
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
    <!-- PIETY CHART JS-->
    <script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/rounded-barchart.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/irregular-data-series.js') }}"></script>
    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/dashboard.sampledata.js') }}"></script>
    <!-- INTERNAL Vector js -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SIDE-MENU JS-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>
    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('assets/js/index1.js') }}"></script>
    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
