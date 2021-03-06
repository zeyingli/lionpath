<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="ios">
<head>
    <title>{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif</title>

    <meta charset="utf-8">
    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
  	<meta name="apple-mobile-web-app-status-bar-style" content="default">
  	<meta name="theme-color" content="#2196f3">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

    <meta name="author" content="Waterproof - Zeying L.">

    <meta name="description" content="@if (trim($__env->yieldContent('site_description')))@yield('site_description') @endif">

    {{-- SEO Meta --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif">
    <meta name="twitter:description" content="@if (trim($__env->yieldContent('site_description')))@yield('site_description') @endif">
    <meta name="twitter:site" content="@PSU">
    <meta name="twitter:image" content="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}/images/psu_logo.png" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif" />
    <meta property="og:description" content="@if (trim($__env->yieldContent('site_description')))@yield('site_description') @endif" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ config('app.name', 'LionPATH Mobile') }} | @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif" />
    <meta property="og:image" content="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}/images/psu_logo.png" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ config('app.cdn') }}images/favicon/lionpath-logo.png?version={{ config('app.version') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ config('app.cdn') }}images/favicon/lionpath-logo.png?version={{ config('app.version') }}">
	<meta name="msapplication-TileColor" content="#da532c">

    {{-- CSS/Misc --}}
    <link href="{{ mix('/css/webapp.css') }}" rel="stylesheet" id="theme">

    {{-- Optimization --}}
    <link rel="canonical"  href="{{ url()->current() }}" />
    <link rel='dns-prefetch' href="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}" />

    {{-- Google Tag Manager --}}
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-ML52ZRJ');</script>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
		function LionPATH() {}
		LionPATH.token = "{{ csrf_token() }}";
	</script>

</head>

<body class="color-theme-blue push-content-right theme-light">
	{{-- Google Tag Manager (noscript) --}}
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML52ZRJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<div class="loader justify-content-center">
        <div class="maxui-roller align-self-center"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
	<div class="wrapper">
		@guest
			@yield('login')
		@else

		{{-- Sidebar Menu --}}
		<div class="sidebar sidebar-left">
			<div class="profile-link">
				<a href="javascript:void(0)" class="media">
                    <div class="w-auto h-100">
                        <figure class="avatar avatar-40"><img src="{{ config('app.cdn') }}images/user.png"> </figure>
                    </div>
                    <div class="media-body">
                        <h5>
                            {{ Auth::user()->name }}
                            <span class="badge badge-light ml-1">Student - IST</span>
                        </h5>
                        <p>Joined since {{ Auth::user()->created_at->timezone('America/New_York')->format('Y.m.d') }}</p>
                    </div>
                </a>
            </div>

            <nav class="navbar">
                <ul class="navbar-nav">
                    {{-- Dashboard --}}
                	<li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">dashboard</i> Dashboard
                            </div>
                        </a>
                    </li>
                    {{-- Schedule --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">schedule</i> Schedule
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/schedule/class') }}" class="sidebar-close  dropdown-item">
                             Class Schedule
                            </a>
                            <a href="{{ url('/schedule/exam') }}" class="sidebar-close dropdown-item">
                             Exam Schedule
                            </a>
                            <a href="http://registrar.psu.edu/academic_calendar/calendar_index.cfm" class="sidebar-close dropdown-item">
                             Academic Calendar
                            </a>
                            <a href="{{ url('/find/class') }}" class="sidebar-close dropdown-item">
                             Classroom Locations
                            </a>
                        </div>
                    </li>
                    {{-- Enrollment --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">class</i> Enrollment
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" class="sidebar-close  dropdown-item">
                             Add Class
                            </a>
                            <a href="javascript:void(0)" class="sidebar-close dropdown-item">
                             Drop Class
                            </a>
                            <a href="javascript:void(0)" class="sidebar-close dropdown-item">
                             Shopping Cart
                            </a>
                        </div>
                    </li>
                    {{-- Academics --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">school</i> Academic Record
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" class="sidebar-close  dropdown-item">
                             My Academics
                            </a>
                            <a href="javascript:void(0)" class="sidebar-close dropdown-item">
                             My Grades
                            </a>
                            <a href="javascript:void(0)" class="sidebar-close dropdown-item">
                             View Unofficial Transcript
                            </a>
                        </div>
                    </li>
                    {{-- Help Center --}}
                    <li class="nav-item">
                        <a href="https://lionpathsupport.psu.edu" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">help</i> Help Center
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="profile-link text-center">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-white btn-block px-3">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            {{-- Copyright Information --}}
            <div class="sticky-bottom">
                <div class="row mt-5">
                    <div class="col-12">
                        <p class="ml-3 text-white">
                            Release Version: {{ config('app.version') }}
                            <span class="badge badge-light ml-1">Demo Only</span>
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="ml-3 text-white">
                            &copy; Copyright {{ date('Y') }} <strong>Penn State University</strong>
                            <br> All Rights Reserved.
                        </p>
                        <p class="ml-3 text-white">
                                Group Semester Project
                            <br>Instructed by: Prof.Johnson Kinyua
                            <br>IST 421, Section 001, Fall 2018
                        </p>     
                    </div>
                </div>
            </div>

        </div>

        <div class="page">
        	{{-- Header --}}
        	<header class="row m-0 fixed-header no-shadow">
        		<div class="left">
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons icon">menu</i></a>
                </div>
                <div class="col center">
                    <a href="{{ url('/dashboard') }}" class="logo">
                        <figure><img src="{{ config('app.cdn') }}images/lionpath-logo-2.png" alt="LionPATH"></figure>LionPATH Mobile
                    </a>
                </div>
            </header>

        	@yield('content')
        </div>
		@endguest

	</div>
	
	{{-- Scripts --}}
	<script src="{{ mix('/js/webapp.js') }}"></script>

	@yield('footer_scripts')

</body>

</html>