<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <div class="">
              <ul>
                  <li><a class="" href="#">VueJS with Laravel</a></li>
                  <li><a class="active" href="">Home</a></li>
                  <li class="pull-right"><router-link to="/example">Example</router-link></li>
                  <li class="pull-right"><router-link to="/sample">Sample</router-link></li>
             </ul>
            </div>
            <br/>
            <router-view></router-view>
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
