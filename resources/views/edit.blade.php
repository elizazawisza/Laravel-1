<!DOCTYPE html>
<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edytowanie</title>

</head>
<body>
<div id="app">
    <iphoneedit route="{{route('kolekcja.update',$id)}}" :data="{{$kolekcja}}" backroute="{{route('kolekcja.index')}}" ></iphoneedit>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>

</body>
</html>
