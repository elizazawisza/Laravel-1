<html>

<link rel='stylesheet' href="{{url('style.css')}}"/>

<meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="app">
        <iphoneshow basicroute="{{route('kolekcja.index')}}" :data="{{$kolekcja}}"></iphoneshow>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>
</html>