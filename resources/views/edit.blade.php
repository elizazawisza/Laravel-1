<!DOCTYPE html>
<html>
<link rel='stylesheet' href="{{url('/css/app.css')}}"/>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edytowanie</title>

</head>
<header>
    <a :href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><button>Wyloguj</button></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>
<body>
<div id="app">
    <iphoneedit route="{{route('kolekcja.update',$id)}}" :data="{{$kolekcja}}" backroute="{{route('kolekcja.index')}}" ></iphoneedit>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>

</body>
</html>
