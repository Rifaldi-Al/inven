<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
<meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
<meta name="author" content="PIXINVENT">
<title>@yield('title')</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/vendors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/vendors/css/charts/morris.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/vendors/css/extensions/unslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/vendors/css/weather-icons/climacons.min.css') }}">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/app.css') }}">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/core/colors/palette-gradient.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/core/colors/palette-gradient.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/plugins/calendars/clndr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/fonts/meteocons/style.min.css') }}">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('asset_dashboard/css/app.css') }}">
<link rel="icon" href="{{ asset('img/sinarmas-removebg-preview.png') }}">
@stack('css')
