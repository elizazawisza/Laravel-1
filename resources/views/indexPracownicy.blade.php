<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
<div id="app">
    <v-app>
        <router-view></router-view>
    </v-app>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>


</html>
