<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="au theme template" name="description">
    <meta content="Hau Nguyen" name="author">
    <meta content="au theme template" name="keywords">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('Admin/css/font-face.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" media="all"
        rel="stylesheet">
    {{-- font awesome cdn --}}
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        referrerpolicy="no-referrer" rel="stylesheet" />
    <!-- Bootstrap CSS-->
    <link href="{{ asset('Admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" media="all" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <!-- CSS only -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('Admin/vendor/animsition/animsition.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" media="all"
        rel="stylesheet">
    <link href="{{ asset('Admin/vendor/wow/animate.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/css-hamburgers/hamburgers.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/slick/slick.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/select2/select2.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" media="all" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset('Admin/css/theme.css') }}" media="all" rel="stylesheet">

    {{-- tailwind css  --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img alt="Cool Admin" src="{{ asset('Admin/images/icon/logo.png') }}" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow">
                                <i class="fas fa-newspaper"></i>News</a>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop mb-5">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <h4>Admin Dashbord Panel</h4>
                                <div class="header-button">
                                    <div class="noti-wrap">
                                        <div class="noti__item js-item-menu">
                                            <i class="zmdi zmdi-notifications"></i>
                                            <span class="quantity">3</span>
                                            <div class="notifi-dropdown js-dropdown">
                                                <div class="notifi__title">
                                                    <p>You have 3 Notifications</p>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c1 img-cir img-40">
                                                        <i class="zmdi zmdi-email-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>You got a email notification</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c2 img-cir img-40">
                                                        <i class="zmdi zmdi-account-box"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Your account has been blocked</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c3 img-cir img-40">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>You got a new file</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__footer">
                                                    <a href="#">All notifications</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img alt="John Doe"
                                                    src={{ asset('Admin/images/icon/avatar-03.jpg') }} />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#">Jhon Doe</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img alt="John Doe"
                                                                src={{ asset('image/defaultUser.jpg') }} />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">Jhon Doe</a>
                                                        </h5>
                                                        <span class="email">admin@gmail.com</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-key"></i>Change Password</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <form action="#" class="py-2 text-center" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger"><i
                                                                class="zmdi zmdi-power mr-2"></i>Logout</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

            </div>
            <div style="height:50px"></div>
            <div class="py-5 px-2">
                @yield('contents')
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="{{ asset('Admin/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('Admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
        <!-- Vendor JS       -->
        <script src="{{ asset('Admin/vendor/slick/slick.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/wow/wow.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('Admin/vendor/chartjs') }}/Chart.bundle.min.js')}}"></script>
        <script src="{{ asset('Admin/vendor/select2/select2.min.js') }}"></script>

        <!-- Main JS-->
        <script src="{{ asset('Admin/js/main.js') }}"></script>

        {{-- Bootstrap Js 5 --}}
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
</body>

</html>
<!-- end document-->
