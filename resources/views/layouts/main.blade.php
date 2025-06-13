<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <!-- <link rel="icon"  href="{{asset('img/site/logo/site-logo-favicon.png')}}" type="image/png">  -->
        
        <title>Sistema vendas</title>

        <style>
             @font-face {
            font-family: BeVietnamPro-light;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Light.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-regular;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Regular.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-medium;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Medium.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-semiBold;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-SemiBold.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-bold;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Bold.ttf')}}')format('opentype');
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
        
    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema vendas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>
                        
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vendas">Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/clientes">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vendedores">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <form action="http://localhost:8000/logout" method="POST">
                            @csrf    
                                <a href="http://localhost:8000/logout" class="nav-link" 
                                onclick=" event.preventDefault(); this.closest('form').submit(); ">
                                Log out
                                </a>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-success" href="/login">Login</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if( session('msg') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')

        <footer>
            <p>Desenvolvido por Luiz Marques</p>
        </footer>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</html>