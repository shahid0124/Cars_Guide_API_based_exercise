<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-us"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en-us"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en-us"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="en-us"><![endif]-->
<html class="desktop portrait" lang="en-us">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom_styles.css')}}" rel="stylesheet">
    <link href="{{asset('css/loginorregister.css')}}" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    @yield('content')
</body>

@yield('script')

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/loginorregister.js')}}"></script>
