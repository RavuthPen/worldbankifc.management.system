<!DOCTYPE html>
<html lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/niceselect/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/gijgo/gijgo.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/vectormap-home/vectormap-2.0.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/text_editor/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/material_icon/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/colors/default.css') }}" id="colorSkinCSS">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="icon" href="{{ URL::asset('/img/favicon.ico') }}" type="image/x-icon" />

    @yield('head')
</head>

<body class="crm_body_bg">
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="">
                <p style="font-weight: bold;font-size: 20px;text-align: center;">WORLD BANK FEDERAL RESERVE </p>
            </a>
            <!-- <a class="small_logo" href="">
                <p style="font-weight: bold;font-size: 20px;text-align: center;">WORLD BANK FEDERAL RECIEV WORLD BANK FEDERAL RECIEVE WORLD BANK FEDERAL RECIEVE WORLD BANK FEDERAL RECIEVE WORLD BANK FEDERAL RECIEVEE</p>
            </a> -->
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>

        <ul id="sidebar_menu">

            @if (Auth::user()->position == 'admin')
                <li class="">
                    <a class="has-arrow" href="{{ url('adm_user') }}" aria-expanded="false">
                        <div class="nav_icon_small">
                            <!-- <img src="{{ URL::to('public/send.png') }}" alt=""> -->
                        </div>
                        <div class="nav_title">
                            <span>Register Admin User</span>
                        </div>
                    </a>
                </li>
            @endif

            <li class="">
                <a class="has-arrow" href="{{ url('user') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <!-- <img src="{{ URL::to('public/send.png') }}" alt=""> -->
                    </div>
                    <div class="nav_title">
                        <span>Register App User</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a class="has-arrow" href="{{ url('account') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Account</span>
                    </div>
                </a>
            </li>

            {{-- <li class="dropdown">

                <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown">
                    </i><span class="ms-1 d-none d-sm-inline">Bootstrap</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="#">App User</a></li>
                    <li><a class="dropdown-item" href="#">CIS</a></li>
                </ul>

            </li> --}}


            {{-- <li class="">
                <a class="has-arrow" href="{{ url('bank_swift') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Bank Swift</span>
                    </div>
                </a>
            </li> --}}



            <li class="">
                <a class="has-arrow" href="{{ url('card') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Card</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a class="has-arrow" href="{{ url('cis_member') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>CIS Member</span>
                    </div>
                </a>
            </li>

            {{-- <li class="">
                <a class="has-arrow" href="{{ url('bank_info') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Bank Information</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="">
                <a class="has-arrow" href="{{ url('khan') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Khan/District</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a class="has-arrow" href="{{ url('sangkat') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Sangkat/Commune</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="">
                <a class="has-arrow" href="{{ url('village') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Village</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="">
                <a class="has-arrow" href="{{ url('bank') }}" aria-expanded="false">
                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>Account Statement</span>
                    </div>
                </a>
            </li> --}}

            <li class="">
                {{-- <a class="has-arrow" href="{{ url('report') }}" aria-expanded="false"> --}}
                <a class="has-arrow" href="#" onclick="window.open('{{ url('/report/rpt_users_trans') }}', '_blank')"
                    aria-expanded="false">

                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>User Transfer Report</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a class="has-arrow" href="#"
                    onclick="window.open('{{ url('/report/rpt_users_list/') }}', '_blank')" aria-expanded="false">

                    <div class="nav_icon_small">
                    </div>
                    <div class="nav_title">
                        <span>User list Report</span>
                    </div>
                </a>
            </li>

        </ul>
    </nav>

    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="#" method="POST" class="d-none">
                        @csrf
                    </form>
                </div> --}}
            </li>
        @endguest
    </ul>

    <section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">

                            {{ Auth::user()->name }} &emsp;
                            <a href="{{ route('admin.logout') }}">Log Out </a>
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                </div>
                            </li> --}}



                            {{-- <div class="profile_info">
                                <!-- <img src="{{ URL::to('public/bank.png') }}" alt="#"> -->
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Neurologist </p>
                                        <h5>Dr. Robar Smith</h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="#">My Profile </a>
                                        <a href="{{ url('/') }}">Log Out </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ menu  -->
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                @yield('content')
            </div>
        </div>
        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>{{ Carbon\Carbon::now()->year }} © WORLD BANK FEDERAL RESERVE </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script src="{{ asset('public/js/jquery-3.4.1.min.js') }}"></script> --}}

    <!-- <script src="{{ asset('public/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/metisMenu.js') }}"></script>
    <script src="{{ asset('public/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/vendors/chartlist/Chart.min.js') }}"></script>
    <script src="{{ asset('public/vendors/count_up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('public/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('public/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('public/vendors/datepicker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('public/js/chart.min.js') }}"></script>
    <script src="{{ asset('public/vendors/chartjs/roundedBar.min.js') }}"></script>
    <script src="{{ asset('public/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('public/vendors/tagsinput/tagsinput.js') }}"></script>
    <script src="{{ asset('public/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('public/vendors/am_chart/amcharts.js') }}"></script>
    <script src="{{ asset('public/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/vendors/scroll/scrollable-custom.js') }}"></script>
    <script src="{{ asset('public/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ asset('public/vendors/apex_chart/apex_dashboard.js') }}"></script>
    <script src="{{ asset('public/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('public/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('public/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('public/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('public/vendors/chart_am/chart-custom.js') }}"></script>
    <script src="{{ asset('public/js/dashboard_init.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @yield('scripts')

</body>

<script type="text/javascript">
    // history.pushState(null, null, null);
    // window.addEventListener('popstate', function () {
    //     history.pushState(null, null, null);
    // });

    // history.pushState(null, null, `{{ route('admin.logout') }}`);
    // window.addEventListener('popstate', function () {
    //     history.pushState(null, null, `{{ route('admin.logout') }}`);
    // });
</script>

</html>
