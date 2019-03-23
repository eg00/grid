<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md bg-white">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}">Сетка</a>
            <a class="nav-item nav-link {{ request()->is('department/*') ? 'active' : '' }}"
               href="{{route('department.index')}}">Отделы</a>
            <a class="nav-item nav-link {{ request()->is('person/*') ? 'active' : '' }}"
               href="{{route('person.index')}}">Сотрудники</a>
        </div>
    </nav>
    @include('layouts.messages')
    <main class="py-4">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
