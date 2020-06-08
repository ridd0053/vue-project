<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script windows.Laravel = { csrfToken: '{{csrf_token()}}' }></script>
        
        
        <title>Taken</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
      
    <body>
    
    <div id="app">
        <titleheader></titleheader>
        
        
        <tasks class="mt-4 ml-5" csrf="{{csrf_token()}}" ></tasks>
          
    </div>

    
    

     <!-- Scripts -->
    
    <script src="/js/app.js" defer>
    
   

    </script>
    </body>
</html>
