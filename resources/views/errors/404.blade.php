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
        <titleheader></titleheader>
        <navbar></navbar>

<div class="container">
    <div class=>
        <div >
        <h1 class="mt-5">Jammer... de pagina kon niet gevonden worden.</h1>
        <h3 class=>Als een pagina niet gevonden kan worden levert dit een 404 foutmelding op.</h3>
        <h4 class=>De pagina die je probeerde te zoeken werd niet gevonden.</h4>
        
        <h5 class="mt-5">Maak gebruik van de navigatie balk om naar een andere pagina te gaan.</h5>
        <p>of kijk is naar deze onderstaande pagina's: </p>
            
        </div>
        
        <div class="row">
            
            <div class="d-flex justify-content-center m-2  mt-2">
                <a href="/">
                <div class="card-group ">
                    <div class="card-block card card-body">
                        <my-btn text="Homepagina" type="button" class="ml-4"></my-btn>
                        <p>Ga naar de homepagina</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="d-flex justify-content-center m-2  mt-2">
                <div class="card-group">
                     <div class="card-block card card-body">
                        <my-btn text="Pagina 2" type="button" class="ml-4"></my-btn>
                        <p>Ga naar de homepagina</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center m-2 mt-2">
                <div class="card-group">
                    <div class="card-block card card-body">
                        <my-btn text="Pagina 3" type="button" class="ml-4"></my-btn>
                        <p>Ga naar de homepagina</p>
                    </div>
                </div>
            </div>
    </div>
    </div>  
</div>

</div>

    
    

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>