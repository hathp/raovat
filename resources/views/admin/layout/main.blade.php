<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{ $page_title or 'Hoster' }} | Admin Control Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Hoster CMS" name="description" />
    <meta content="Hoster" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.layout.partials.css') {{-- Stylesheet --}}
</head>

<body class="page-header-fixed page-sidebar-fixed page-sidebar-fixed page-sidebar-closed-hide-logo page-sidebar-closed page-container-bg-solid">
    @include('admin.layout.partials.layout-header-top') {{-- Header top --}}

    <div class="page-container"> {{-- Containter --}}
        @include('admin.layout.partials.layout-sidebar-left') {{-- Sidebar left --}}
        <div class="page-content-wrapper"> {{-- Content --}}
            <div class="page-content" style="min-height:1001px">
                {{-- Breadcum --}}
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Page Layouts</span>
                        </li>
                    </ul>
                </div>

                {{-- Page title --}}
                @unless(isset($no_page_title))
                <h3 class="page-title"> {{ $page_title or 'Title' }} </h3> {{-- Page Title --}}
                @endunless

                {{-- Notification --}}
                @include('flash::message')

                @yield('content')
            </div>
        </div>
    </div>

    @include('admin.layout.partials.layout-footer')


    @include('admin.layout.partials.js') {{-- JavaScript --}}
</body>

</html>