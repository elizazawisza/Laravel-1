<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<header>
    <a :href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <button>Wyloguj</button></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>
<div id="app">
    <router-view></router-view>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>
</html>

