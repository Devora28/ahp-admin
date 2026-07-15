@extends('_main.main')
@section('title')
    محصولات
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">محصولات</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">محصولات فروشگاه</a></li>
                            <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row row-cards">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card p-0">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group d-flex w-100 float-start">
                                                    <input type="text" class="form-control border-end-0 my-2" placeholder="Search ...">
                                                    <button class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                                        <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12">
                                                <a href="{{route('add-product-page')}}" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>افزودن محصول جدید</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="row" dir="rtl">
                                    @if(isset($products) && count($products) > 0)
                                        @foreach($products as $product)
                                            <div class="col-md-6 col-xl-4 col-sm-6">
                                                <div class="card">
                                                    <div class="product-grid6">
                                                        <div class="product-image6 p-5">
                                                            <ul class="icons">
                                                                <li>
                                                                    <a href="{{route('product-details',['id'=>$product->id,'slug'=>$product->slug])}}" class="btn btn-primary"> <i class="fe fe-eye">  </i> </a>
                                                                </li>
                                                                <form action="{{route('delete-product',['id'=>$product->id])}}" method="POST">
                                                                    @csrf
                                                                    <li><button class="btn btn-danger"><i class="fe fe-x"></i></button></li>
                                                                </form>
                                                            </ul>
                                                            <a href="{{route('product-details',['id'=>$product->id,'slug'=>$product->slug])}}">
                                                                <img class="img-fluid br-7 w-100" src="{{asset($product->thumbnail)}}" alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <div class="product-content text-center">
                                                                <h1 class="title fw-bold fs-20 truncate-multiline"><a href="{{route('product-details',['id'=>$product->id,'slug'=>$product->slug])}}">{{$product->title}}</a></h1>
                                                                <div class="price">
                                                                    {{number_format(calcDiscount($product->price,$product->discount))}}
                                                                    <span class="ms-4">
                                                                        {{number_format($product->price)}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <a href="{{route('product-details',['id'=>$product->id,'slug'=>$product->slug])}}" class="btn btn-primary mb-1">نمایش</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                        {{$products->links('pagination.pagination')}}
                                </div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                    <!-- ROW-1 CLOSED -->
                </div>
                <!-- ROW-1 END -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
@endsection
@section('script-dependencies')
    <!-- اسکریپت‌های jquery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- input mask -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <!-- jquery ui slider -->
    <script src="{{ asset('assets/plugins/jquery-uislider/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <!-- side menu -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- typeahead -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- perfect scrollbar -->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
    <!-- theme colors -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <!-- sticky -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
