@extends('_main.main')
@section('title')
    جزئیات محصول
@endsection
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">جزئیات محصول</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">محصولات اینترنتی</a></li>
                            <li class="breadcrumb-item active" aria-current="page">جزئیات محصول</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row" dir="rtl">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-sm">
                                    <div class="col-xl-5 col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="product-carousel">
                                                    <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                                        <div class="carousel-inner">
                                                            @if(isset($product->thumbnail))
                                                                <div class="carousel-item active"><img src="{{asset($product->thumbnail)}}" alt="img" class="img-fluid mx-auto d-block">
                                                                    <div class="text-center mt-5 mb-5 btn-list">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($product->images) && count($product->images) > 0)
                                                    <div class="clearfix carousel-slider">
                                                        <div id="thumbcarousel" class="carousel slide" data-bs-interval="t">
                                                            <div class="carousel-inner">
                                                                <ul class="carousel-item active">
                                                                    @foreach($product->images as $index => $image)
                                                                        <li data-bs-target="#Slider" data-bs-slide-to="{{$index}}" class="thumb active m-2"><img src="{{asset($image->image_path)}}" alt="img"></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                        <div class="mt-2 mb-4" style="text-align: right">
                                            <h3 class="mb-3 fw-semibold">{{$product->title}}</h3>
                                            <h4 class="mt-4"><b>جزئیات :</b></h4>
                                            <p>{{$product->description}}</p>
                                            <p>{{$product->description_short}}</p>
                                            <h3 class="mb-4"><span class="me-2 fw-bold fs-25">{{number_format(calcDiscount($product->price,$product->discount))}}</span><span><del class="fs-18 text-muted">{{number_format($product->price)}}</del></span></h3>
                                            <div class=" mt-4 mb-5"><span class="fw-bold me-2">تخفیف :</span><span class="fw-bold text-primary">%{{$product->discount}}</span>
                                            <div class=" mt-4 mb-5">
                                                <span class="fw-bold me-2">
                                                    وضعیت موجودی :
                                                </span>
                                                @if($product->stock < 1)
                                                    <span class="fw-bold text-danger">ناموجود</span>
                                                @else
                                                    <span class="fw-bold text-success">موجود در انبار به تعداد : {{$product->stock}}</span>
                                                @endif
                                            </div>
                                            <div class="colors d-flex me-3 mt-4 mb-5">
                                                <span class="mt-2 fw-bold">رنگ :</span>
                                                <div class="row gutters-xs ms-4">
                                                    <div class="col-3">
                                                        <label class="colorinput">
                                                            <input name="color" type="radio" value="azure" class="colorinput-input" checked="">
                                                            <span class="colorinput-color bg-danger rounded-10"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="colorinput">
                                                            <input name="color" type="radio" value="indigo" class="colorinput-input">
                                                            <span class="colorinput-color bg-dark rounded-10"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="colorinput">
                                                            <input name="color" type="radio" value="purple" class="colorinput-input">
                                                            <span class="colorinput-color bg-info rounded-10"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="colorinput">
                                                            <input name="color" type="radio" value="pink" class="colorinput-input">
                                                            <span class="colorinput-color bg-success rounded-10"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                                <div class="btn-list mt-4">
                                                    <button class="btn ripple btn-primary" data-bs-target="#product-edit-modal" data-bs-toggle="modal">ویرایش محصول</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="card productdesc">
                            <div class="card-body">
                                <div class="panel panel-primary">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs">
                                                <li><a href="#tab5" class="active" data-bs-toggle="tab">جزئیات</a></li>
                                                <li><a href="#tab6" data-bs-toggle="tab">ویژگی ها</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab5">
                                                <h4 class="mb-5 mt-3 fw-bold">جزئیات :</h4>
                                                <p class="mb-3 fs-15">{{$product->description}}</p>
                                                <p class="mb-3 fs-15">{{$product->description_short}}</p>
                                            </div>
                                            <div class="tab-pane pt-5" id="tab6">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        @if(isset($product->p_attributes) && !empty($product->p_attributes))
                                                            @foreach($product->p_attributes as $key => $value)
                                                                <tr>
                                                                    <td class="fw-bold">{{$key}}</td>
                                                                    <td>{{$value}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">خدمات مشتری</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="customer-services mb-2">
                                            <div class="icon-content">
                                                <span><i class="bi bi-truck"></i></span>
                                                <h4>اطلاعات تحویل</h4>
                                            </div>
                                            <p>Lorem Ipsum به سادگی متن ساختگی از صنعت چاپ و حروف چینی است. لورم ایپسوم دارد</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="customer-services mb-2">
                                            <div class="icon-content">
                                                <span><i class="bi bi-arrow-repeat"></i></span>
                                                <h4>7 روز مهلت تست</h4>
                                            </div>
                                            <p>Lorem Ipsum به سادگی متن ساختگی از صنعت چاپ و حروف چینی است. لورم ایپسوم دارد</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="customer-services">
                                            <div class="icon-content">
                                                <span><i class="bi bi-credit-card-2-front"></i></span>
                                                <h4>12 ماه گارانتی شرکتی</h4>
                                            </div>
                                            <p>Lorem Ipsum به سادگی متن ساختگی از صنعت چاپ و حروف چینی است. لورم ایپسوم دارد</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
        <!-- Inout modal -->
        <div class="modal fade" id="product-edit-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">ویرایش محصول</h6>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" dir="rtl">
                        <form action="{{route('update-product',['id'=>$product->id])}}" method="POST" id="updatProductForm">
                            @csrf
                            <div class="mb-3" style="text-align: right">
                                <label for="title" class="col-form-label">نام محصول :</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3" style="text-align: right">
                                <label for="description" class="col-form-label">توضیحات :</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3" style="text-align: right">
                                <label for="description_short" class="col-form-label">توضیحات کوتاه :</label>
                                <textarea class="form-control" id="description_short" name="description_short"></textarea>
                            </div>
                            <div class="mb-3" style="text-align: right">
                                <label for="price" class="col-form-label">قیمت :</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="mb-3" style="text-align: right">
                                <label for="discount" class="col-form-label">تخفیف :</label>
                                <input type="number" class="form-control" id="discount" name="discount">
                            </div>
                            <div class="mb-3" style="text-align: right">
                                <label for="status" class="col-form-label">وضعیت :</label>
                                <select name="status" class="form-control form-select">
                                    <option value="0" {{$product->is_active == 0 ? 'selected' : ''}}>غیرفعال</option>
                                    <option value="1" {{$product->is_active == 1 ? 'selected' : ''}}>فعال</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-success" form="updatProductForm">بروزرسانی</button>
                        <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">لغو</button>
                    </div>
                </div>
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
    <!-- INPUT MASK JS -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>
    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- Perfect SCROLLBAR JS -->
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
