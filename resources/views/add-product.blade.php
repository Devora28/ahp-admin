@extends('_main.main')
@section('title')
     افزودن محصول
@endsection
@section('content')
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">افزودن محصول</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">صفحات</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">افزودن محصول</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <!-- ROW-1 OPEN -->
                        <div class="row" dir="rtl">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">افزودن محصول جدید</div>
                                    </div>
                                    <form action="{{route('add-product')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">نام محصول :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="نام محصول" name="title">
                                                </div>
                                                @error('title')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">قیمت :</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" placeholder="قیمت" name="price">
                                                </div>
                                                @error('price')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">تخفیف(درصدی) :</label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" placeholder="تخفیف" name="discount">
                                                </div>
                                                @error('discount')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">دسته بندی ها :</label>
                                                <div class="col-md-9">
                                                    <select name="category" class="form-control form-select select2">
                                                        @if(isset($categories) && count($categories) > 0)
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                @error('category')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">توضیحات محصول :</label>
                                                <div class="col-md-9 mb-4">
                                                    <textarea class="content" name="description"></textarea>
                                                </div>
                                                @error('description')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <!--End Row-->
                                            <!--Row-->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">تصویر اصلی :</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="image">
                                                </div>
                                                @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <!--End Row-->
                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <button class="btn btn-primary">افزودن</button>
                                                    <a href="{{route('add-product-page')}}" class="btn btn-default float-end">لغو</a>
                                                </div>
                                            </div>
                                            <!--End Row-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /ROW-1 CLOSED -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>
    </div>
@endsection
@section('script-dependencies')
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>
    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('assets/plugins/wysiwyag/wysiwyag.js') }}"></script>
    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
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
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'یک دسته بندی انتخاب کنید'
            });
        });
    </script>
@endsection
