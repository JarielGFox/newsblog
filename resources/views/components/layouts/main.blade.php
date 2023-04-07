<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>News Blog</title>     

        @livewireStyles
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0" id="main"> 
            <nav class="navbar navbar-expand-lg navbar-success bg-success bg-gradient">
                <div class="container px-5">
                    <a class="navbar-brand text-light" href="{{route('home')}}">News Blog</a> <span class="navbar-brand">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link text-light" href="{{route('home')}}">Homepage</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="#">Chi siamo</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{route('articles.index')}}">Rassegna Stampa</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{route('contacts')}}">Contatti</a></li>
                            @auth
                            <li class="nav-item"><a class="nav-link text-warning" href="{{route('articles.create')}}">Gestisci Articoli</a></li>
                            <li class="nav-item"><a class="nav-link text-warning" href="/usermanager">Gestisci Utenti</a></li>
                            
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link text-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tickets
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('tickets.index')}}">Mostra Tickets</a></li>
                                    <li><a class="dropdown-item" href="{{route('tickets.create')}}">Crea Tickets</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="nav-item">
                                    <a class="nav-link text-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </form>
                            @else
                            <li class="nav-item"><a class="nav-link text-warning" href="/login">Accedi</a></li>
                            <li class="nav-item"><a class="nav-link text-warning" href="/register">Registrati</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav> 

          {{$slot}}
        </main>
        
        <footer class="bg-success bg-gradient py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                    
                </div>
            </div>


                            <!-- Modal -->
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENZIONE</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        SEI SICURO DI VOLER CANCELLARE
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="button" id="confirm" class="btn btn-danger">Conferma</button>
                    </div>
                    </div>
                </div>
                </div>


        </footer>
        @livewireScripts
    </body>
</html>