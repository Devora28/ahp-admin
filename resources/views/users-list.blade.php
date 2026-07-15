@extends('_main.main')
@section('title')
لیست کاربران
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
                            <h1 class="page-title">لیست کاربران</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">برنامه ها</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        @if(isset($users) && count($users) > 0)
                            <!-- ROW OPEN -->
                            <div class="row row-cards">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="input-group mb-5">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header border-bottom-0">
                                            <div class="page-options ms-auto">
                                                <form action="" method="GET">
                                                    <select class="form-control select2 w-100" name="sort" onchange="this.form.submit()">
                                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>جدیدترین</option>
                                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>قدیمی‌ترین</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="e-table px-5 pb-5">
                                            <div class="table-responsive table-lg">
                                                <table class="table border-top table-bordered mb-0" dir="rtl">
                                                    <thead>
                                                    <tr>
                                                        <th class="align-middle text-center">شناسه</th>
                                                        <th class="align-middle text-center">نام و نام خانوادگی</th>
                                                        <th class="align-middle text-center">ایمیل</th>
                                                        <th class="align-middle text-center">موبایل</th>
                                                        <th class="align-middle text-center">کد ملی</th>
                                                        <th class="align-middle text-center">وضعیت</th>
                                                        <th class="align-middle text-center">تاریخ عضویت</th>
                                                        <th class="align-middle text-center">تصویر</th>
                                                        <th class="align-middle text-center">عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                {{$user->id}}
                                                            </td>
                                                            @php
                                                                $fullName = $user->first_name && $user->last_name ? $user->first_name.' '.$user->last_name : 'ندارد'
                                                            @endphp
                                                            <td class="text-nowrap align-middle text-center">{{$fullName}}</td>
                                                            <td class="text-nowrap align-middle text-center">{{$user->email}}</td>
                                                            <td class="text-nowrap align-middle text-center">{{$user->mobile}}</td>
                                                            <td class="text-nowrap align-middle text-center">{{$user->national_code}}</td>
                                                            <td class="text-nowrap align-middle text-center">
                                                                @switch($user->status)
                                                                    @case('active')
                                                                        فعال
                                                                    @break
                                                                    @case('inactive')
                                                                        غیرفعال
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                            <td class="text-nowrap align-middle text-center"><span>{{$user->created_at}}</span></td>
                                                            <td class="align-middle text-center"><img alt="image" class="avatar avatar-md br-7" src="{{$user->profile_img?asset($user->profile_img):asset('assets/images/users/1.jpg')}}"></td>
                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <button class="btn btn-sm btn-primary badge edit-user-btn" data-bs-target="#edit-form-modal" data-bs-toggle="modal" data-id="{{$user->id}}" data-first-name="{{$user->first_name}}" data-last-name="{{$user->last_name}}" data-email="{{$user->email}}" data-mobile="{{$user->mobile}}" data-national-code="{{$user->national_code}}" type="button">Edit</button>
                                                                    <button class="btn btn-sm btn-primary badge delete-user-btn" type="button" data-bs-target="#trash-form-modal" data-bs-toggle="modal" data-id="{{$user->id}}"
                                                                    data-name="{{$fullName}}"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$users->links('pagination.pagination')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL-END -->
                            </div>
                            <!-- ROW CLOSED -->
                        @else
                            <div class="d-flex align-items-center justify-content-center py-5">
                                <div class="text-center w-100">
                                    <div class="mb-3">
                                        <i class="fe fe-package text-muted" style="font-size: 48px;"></i>
                                    </div>
                                    <h5 class="mb-2 fw-semibold">سفارشی موجود نیست</h5>
                                    <p class="text-muted mb-0 px-3">
                                        در حال حاضر موردی برای نمایش در این بخش پیدا نشد.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>
    </div>
    {{-- trash modal --}}
    <div class="modal fade" id="trash-form-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">هشدار</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <p id="delete-user-message">آیا از حذف کاربر اطمینان دارید؟</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <form id="delete-user-form" action="" method="POST">
                        @csrf
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    <button class="btn btn-light" data-bs-dismiss="modal">لغو</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit modal --}}
    <div class="modal fade" id="edit-form-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">ویرایش اطلاعات کاربری</h6>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" dir="rtl" action="" method="POST">
                        @csrf
                        <div class="mb-3" style="text-align: right;">
                            <label for="first-name-edit" class="col-form-label">نام:</label>
                            <input type="text" class="form-control" id="first-name-edit" name="first-name">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="last-name-edit" class="col-form-label">نام خانوادگی:</label>
                            <input type="text" class="form-control" id="last-name-edit" name="last-name">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="email-edit" class="col-form-label">ایمیل:</label>
                            <input type="text" class="form-control" id="email-edit" name="email">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="mobile-edi" class="col-form-label">موبایل:</label>
                            <input type="text" class="form-control" id="mobile-edit" name="mobile">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="password-edit" class="col-form-label">رمز عبور:</label>
                            <input type="password" class="form-control" id="password-edit" name="password">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="national-code-edit" class="col-form-label">کد ملی:</label>
                            <input type="text" class="form-control" id="national-code-edit" name="national-code">
                        </div>
                        <div class="mb-3" style="text-align: right;">
                            <label for="status-edit" class="col-form-label">وضعیت:</label>
                            <select class="form-control select2 w-100" name="status" id="status-edit">
                                <option value="active">فعال</option>
                                <option value="inactive">غیرفعال</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-success" form="edit-user-form">ذخیره تغییرات</button>
                    <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">لغو</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /*trash*/
            const deleteButtons = document.querySelectorAll('.delete-user-btn');
            const deleteForm = document.getElementById('delete-user-form');
            const deleteMessage = document.getElementById('delete-user-message');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const userId = this.getAttribute('data-id');
                    const userName = this.getAttribute('data-name');
                    deleteForm.action = `/delete-user/${userId}`;
                    deleteMessage.textContent = `آیا از حذف کاربر ${userName} اطمینان دارید؟`;
                });
            });
            /*edit*/
            const editButtons = document.querySelectorAll('.edit-user-btn');
            const editForm = document.getElementById('edit-user-form');
            const firstNameInput = document.getElementById('first-name-edit');
            const lastNameInput = document.getElementById('last-name-edit');
            const emailInput = document.getElementById('email-edit');
            const mobileInput = document.getElementById('mobile-edit');
            const nationalInput = document.getElementById('national-code-edit');
            editButtons.forEach(btn => {
                btn.addEventListener('click', function (){
                    const userId = this.getAttribute('data-id');
                    const firstName = this.getAttribute('data-first-name');
                    const lastName = this.getAttribute('data-last-name');
                    const email = this.getAttribute('data-email');
                    const mobile = this.getAttribute('data-mobile');
                    const nationalCode = this.getAttribute('data-national-code');
                    firstNameInput.value = firstName;
                    lastNameInput.value = lastName;
                    emailInput.value = email;
                    mobileInput.value = mobile;
                    nationalInput.value = nationalCode;
                    editForm.action = `/edit-user/${userId}`;
                });
            });
        });
    </script>
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
    <!-- Select2 JS-->
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
