<?php

use Illuminate\Support\Facades\Cache;

$user = Cache::get('auth_user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>Quản lý sự kiện - supper event</title>
    @yield('title')
    <link rel=icon href="{{asset('image/logo2.png')}}" sizes="57x57" type="image/png">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js'></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

    <!-- MetisMenu CSS -->
    <!-- <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet"> -->

    <!-- Timeline CSS -->
    <!-- <link href="{{asset('css/timeline.css')}}" rel="stylesheet"> -->

    <!-- Custom CSS -->


    <!-- Morris Charts CSS -->
    <!-- <link href="{{asset('morris.css')}}" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{asset('js/fileInput.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="{!! route('home') !!}">Quản lý sự kiện</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <a href="{!! route('home') !!}"><img class="img-responsive img-rounded"
                                src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                alt="User picture"></a>
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ $user}}
                        </span>
                        <span class="user-role">Quản trị viên</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Tổng quan</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Trạng thái</span>
                                <!-- <span class="badge badge-pill badge-warning">New</span> -->
                            </a>
                        </li>
                        <!-- <li class="sidebar-dropdown">
                            <a href="{!! route('article.create') !!}">
                                <i class="fa fa-calendar"></i>
                                <span>Thêm bài viết</span>
                                
                            </a>
                        </li> -->
                        <!-- <li class="sidebar-dropdown">
                            <a href="{!! route('article.index') !!}">
                                <i class="far fa-newspaper"></i>
                                <span>Xem bài viết</span>
                            </a>
                        </li>  -->
                        <li class="sidebar-dropdown">
                            <a href="{!! route('events') !!}">
                                <i class="fa fa-chart-line"></i>
                                <span>Hoạt động</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-check"></i>
                                <span>Điểm danh</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Quản lý</span>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-user-graduate"></i>
                                <span>Sinh viên</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span>Tệp tin</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">1</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <!-- <span class="badge-sonar"></span> -->
                </a>
                <a href="{!! route('login') !!}">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            @yield('main')
        </main>
        <!-- page-content" -->
    </div>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script>
    feather.replace()
    </script>
</body>

</html>