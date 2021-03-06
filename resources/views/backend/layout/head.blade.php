<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{$title ?? ''}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Powerfull dashboard Admin" name="description" />
    <meta content="Aan Zaenu" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        
    <link href="{{asset('backend/css/icons.min.css?v=0.2')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/bootstrap.min.css?v=0.1')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('backend/css/app.min.css?v=0.4')}} " rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="{{asset('backend/css/custom.css?v=1.5')}} " rel="stylesheet" type="text/css"/>
    @yield('css')
</head>