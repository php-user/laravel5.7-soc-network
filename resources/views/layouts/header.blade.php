<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Social Network') }} @yield('title', '')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/favicon/favicon.ico') }}">

    <!-- Styles -->
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="preload">
    <!-- Force browsers to load CSS before showing the page (especially firefox) -->
    <div id="loadOverlay" style="background-color:#fff; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
    