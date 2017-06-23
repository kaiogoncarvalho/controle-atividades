<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @lang('welcome.title')</title>

        <!-- Fonts -->
       {{ Html::style('https://fonts.googleapis.com/css?family=Raleway:100,600') }}

        <!-- Styles -->
        {{ Html::style('css/welcome.css') }}
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    @lang('welcome.system')
                </div>

                <div class="links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">@lang('welcome.home')</a>
                    @else
                        <a href="{{ url('/login') }}">@lang('welcome.login')</a>
                        <a href="{{ url('/register') }}">@lang('welcome.register')</a>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
