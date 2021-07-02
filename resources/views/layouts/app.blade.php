<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    @yield('title')
    </title>
    {{--  <!-- plugins:css -->  --}}
    <link rel="stylesheet" href="{{ asset('public/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/base/vendor.bundle.base.css') }}">
    {{--  <!-- endinject -->  --}}
    {{--  <!-- plugin css for this page -->  --}}
    <link rel="stylesheet" href="{{ asset('public/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    {{--  <!-- inject:css -->  --}}
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    {{--  <!-- endinject -->  --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        {{--  <!-- partial:partials/_navbar.html -->  --}}
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="">لوحة التحكم</a>
                    <a class="navbar-brand brand-logo-mini" href="">لوحة التحكم</a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav navbar-nav-left">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="nav-profile-name">{{ isset(auth()->user()->name) ? auth()->user()->name : ''  }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item text-center" href="{{ route('logout') }}" dir="auto" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
            </div>
        </nav>
        {{--  <!-- partial -->  --}}
        <div class="container-fluid page-body-wrapper">
            {{--  <!-- partial:partials/_sidebar.html -->  --}}
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('') }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">الرئيسية</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                            <span class="menu-title">المشرفين</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                            <span class="menu-title">المستخدمين</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('eaqari.index') }}">العقارين</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('n-user.index') }}">المستخدمين </a></li>
                            </ul>
                        </div>
                    </li>
                        

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.index') }}">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">الطلبات</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.commited') }}">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">الطلبات الجادة</span>
                        </a>
                    </li>
{{-- 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase.index') }}">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">المشتريات</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendor.index') }}">
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                            <span class="menu-title">الموردين</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            {{--  <!-- partial -->  --}}
                <div class="main-panel">
                    <div class="content-wrapper">
                        
                        @yield('content')
                        
                    </div>
                    {{--  <!-- content-wrapper ends -->  --}}
                    {{--  <!-- partial:partials/_footer.html -->  --}}
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between text-center">
                        <span class=" d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                {{--  <!-- partial -->  --}}
            </div>
            <!-- main-panel ends -->
        </div>
        {{--  <!-- page-body-wrapper ends -->  --}}
    </div>
    {{--  <!-- container-scroller -->  --}}

    {{--  <!-- plugins:js -->  --}}
        <script src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/vendors/base/vendor.bundle.base.js') }}"></script>
        {{--  <!-- endinject -->  --}}
    {{--  <!-- Plugin js for this page-->  --}}
    <script src="{{ asset('public/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    {{--  <!-- End plugin js for this page-->  --}}
    {{--  <!-- inject:js -->  --}}
    <script src="{{ asset('public/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/js/template.js') }}"></script>
    {{--  <!-- endinject -->  --}}
    {{--  <!-- Custom js for this page-->  --}}
    <script src="{{ asset('public/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/js/data-table.js') }}"></script>
    <script src="{{ asset('public/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap-notify.min.js') }}"></script>
    {{-- <script src="{{ asset('public/js/datatables/datatables.min.js') }}"></script> --}}
    <script src="{{ asset('public/js/datatables/datatables.min.js') }}"></script>
    {{--  <!-- End custom js for this page-->  --}}
    <script src="{{ asset('public/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/main.js') }}" type="text/javascript"></script>

    @yield('script')
</body>

</html>