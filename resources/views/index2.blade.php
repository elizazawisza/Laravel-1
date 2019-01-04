<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
<header>
    <a :href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <button>Wyloguj</button></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>
<div id="app">
    <v-app>
        <router-view></router-view>
    </v-app>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>
</html>

