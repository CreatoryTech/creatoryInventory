<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links li a{
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

             .links ul{
                list-style-type: square;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Inventory
                </div>

<!--            <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->

                <div class="links">
                <ul>
                   <li> <a href="{{ route('factory.raw.index') }}">Raw Material Entry</a></li>
                   <li> <a href="{{ route('factory.finished.index') }}">Finished Goods Entry</a></li>
                   <li> <a href="{{ route('factory.stock.index') }}">Stock in/out Entry</a></li>
                   <li> <a href="{{ route('factory.supplier.create') }}">Supplier Information</a></li>
                   <li> <a href="{{ route('factory.raw.challan') }}">Factory Challan</a></li>
                   <li>  <a href="{{ route('factory.finished.challan') }}">Production Challan</a></li>
                   <li>  <a href="{{ route('clients.index') }}">Clients List</a></li>
                   <li>  <a href="{{ route('clients.create') }}">New Clients</a></li>
                   <li>  <a href="{{ route('invoices.create') }}">New Invoices</a></li>
                   <li>  <a href="{{ route('raw_material','pdf') }}">Raw PDF</a></li>
                   <li>  <a href="{{ route('raw_material','report') }}">Raw Report</a></li>

                   <li>  <a href="{{ route('clientsIndex') }}">Clients Report</a></li>
                   <li>  <a href="{{ route('finishedIndex') }}">FinishedGood Report</a></li>
                   <!--  <a href="https://github.com/laravel/laravel">GitHub</a> -->
                   </ul>
                </div>
            </div>
        </div>
    </body>
</html>
