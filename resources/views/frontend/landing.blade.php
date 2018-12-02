<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'LionPATH Mobile') }} | Landing Page</title>

    <meta charset="utf-8">
    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="author" content="LionPATH - Zeying L.">

    <meta name="description" content="{{ config('app.name', 'LionPATH Mobile') }} | Landing Page">

    {{-- SEO Meta --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif">
    <meta name="twitter:description" content="@if (trim($__env->yieldContent('site_description')))@yield('site_description') @endif">
    <meta name="twitter:site" content="@PSU">
    <meta name="twitter:image" content="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif" />
    <meta property="og:description" content="@if (trim($__env->yieldContent('site_description')))@yield('site_description') @endif" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ config('app.name', 'LionPATH Mobile') }} @if (trim($__env->yieldContent('site_title')))@yield('site_title') @endif" />
    <meta property="og:image" content="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ config('app.cdn') }}images/favicon/apple-touch-icon.png?version={{ config('app.version') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ config('app.cdn') }}images/favicon/apple-touch-icon.png?version={{ config('app.version') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ config('app.cdn') }}images/favicon/favicon-32x32.png?version={{ config('app.version') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ config('app.cdn') }}images/favicon/favicon-16x16.png?version={{ config('app.version') }}">
	<link rel="manifest" href="{{ config('app.cdn') }}images/favicon/site.webmanifest?version={{ config('app.version') }}">
	<link rel="mask-icon" href="{{ config('app.cdn') }}images/favicon/safari-pinned-tab.svg?version={{ config('app.version') }}" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

    {{-- CSS --}}
    <link href="{{ mix('/css/landing.css') }}" rel="stylesheet" id="theme">

    {{-- Optimization --}}
    <link rel="canonical"  href="{{ url()->current() }}" />
    <link rel='dns-prefetch' href="{{ config('app.cloudfront') }}" />

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

	<script src="{{ mix('/js/landing.js') }}"></script>

</head>

<body class="fixed-header h-100" class="page-template page-template-homepage page-template-homepage-php page page-id-16">
	{{-- Google Tag Manager (noscript) --}}
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML52ZRJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<div class="loader-logo">
        <img src="{{ config('app.cdn', 'https://cdn.zeyingli.com/waterproof/') }}images/black-logo.png" alt="LionPATH"><br>
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    <div id="page" class="wrapper">
    	<header id="masthead" class="border-bottom" role="banner">
    		<nav class="navbar navbar-expand-xl">
    			<a href="{{ url('/') }}" class="site-branding navbar-brand">
                    <img src="{{ config('app.cdn', 'https://cdn.zeyingli.com/lionpath/') }}images/psu_logo-notext.png" alt="Penn State">
                    <h5 class="text-uppercase visible-md"><span>Penn State</span><small>LionPATH Student Information System - Mobile</small></h5>
                </a>

                <button id="menu-toggle" class="btn btn-link sq-btn rounded-0 border-right text-dark navbar-toggler"><span class="fa fa-bars"></span></button>

                <div class="d-flex col p-0">
                	<div id="site-header-menu" class="site-header-menu justify-content-center">
                		<div class="collapse navbar-collapse main-navigation" id="site-navigation" role="navigation" aria-label="Primary Menu">
                			<div class="custom-menu-class">
                				<ul id="menu-main-menu" class="menu">
                					<li id="menu-item-7" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7"><a href="{{ url('/dashboard')}}">Mobile Demo</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="d-flex ml-auto align-self-center pr-3">
					</div>
				</div>
				</nav>
			</header>

			<div id="content" class="main-container">
				<main id="main" class="site-main" role="main">
					<article id="post-16" class="post-16 page type-page status-publish hentry">
						<div class="entry-content">
							<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner bg-white">
									<div class="carousel-item active align-content-center ">
										<div class="container" style="min-height: 1000px">
											<div class="row h-100 ">
												<div class="col-sm-12 col-md-4 col-lg-6 align-self-center text-right">
													<h3 class="mt-0">Refreshing</h3>
													<h1 class="display-2 mt-0 text-primary">LionPATH</h1>
													<h2 class="f-light mt-0">* Brand New Responsive Design</h2>
													<h5 class="f-light mt-1 mb-3">Unique Features for Mobile Only</h5>
													<p class="mt-4">
														- Integrated Google Maps <br>
														- Exam Notifications <br>
														Many more, etc.
													</p>
													<br>
	                       							<img src="{{ config('app.cdn') }}images/lionpathqrcode.png" alt="QR Code" width="120" height="auto" class="" style="width:119px" />
	                       						</div>

                       							<div class="col">
							                        <div class="phonex d-flex text-center">
							                            <img src="{{ config('app.cdn') }}images/iphonerg.png" alt="" class="float-right w-100 phoneximg">
							                            <img src="{{ config('app.cdn') }}images/iphone-top.png" alt="" class="phonextop" />
							                            <iframe src="{{ url('/dashboard') }}"></iframe>
							                        </div>
							                    </div>
								            </div>
								        </div>
								    </div>
								</div>
							</div>
						</div>
				</article>
			</main>
		</div>
	</div>

</body>

</html>

