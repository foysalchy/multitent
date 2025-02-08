<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Scripts -->
</head>
<body>
    <style>
        a{
             text-decoration: none;
             background: white;
             text-align: center;
             padding: 10px;
             border-radius: 10px;
             margin-bottom: 10px;
             display: block;
             border: 1px solid
        }
   </style>
    <div id="app">
          
        <main class="py-4">
            <div class="row"> 
                <div class="col-md-3">
                   <div class="sidebar">
                    <a href="{{route('merchant.store.index')}}">Store Manage</a>
          
         
                    <a href="{{route('merchant.category.index')}}">Category Manage</a>
         
        
                   <a href="{{route('merchant.product.index')}}">Product Manage</a>
        
       
             
                       <a   href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </div>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
