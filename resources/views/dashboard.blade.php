<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script windows.Laravel = { csrfToken: '{{csrf_token()}}' }></script>
        <title>Laravel & Vue</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <body>
<div id="app">
        <titleheader text="{{ Auth::user()->name }} "></titleheader>
        <navbar></navbar>
</div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }} taken lijst</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>