<html>
<link rel='stylesheet' href="{{url('/css/app.css')}}"/>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src='/js/app.js'></script>
</body>
</html>

