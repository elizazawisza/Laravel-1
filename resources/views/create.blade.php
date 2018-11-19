<!DOCTYPE html>
<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tworzenie</title>

</head>
<header>
    <a :href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><button>Wyloguj</button></a>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;"><input type="hidden" name="_token" value="lMLctIilAh7CNvezZFCBe2sYbunszb6KEso20kGr"></form>
</header>
<body>
<div id="app">
    <iphoneadd basicroute="{{route('kolekcja.index')}}" route="{{route('kolekcja.store')}}" logoutroute="{{route('logout')}}"></iphoneadd>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>

</body>
</html>
<script>
</script>

