<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Sales Corporation' }}</title>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{-- <link rel="stylesheet" href="./css/bootstrap.min.css"> --}}
        
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <style>
            body {
                background-color: beige;
            }
        </style>
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Offcanvas navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <button x-data x-on:click="$dispatch('open-modal', {name : 'sidebar' })" class="px-3 py-1 bg-teal-500 text-white rounded">Sidebar</button>
            </div>
        </nav>  
    
        <div class="flex">
            <div class="offcanvas offcanvas-start position-sticky" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            {{-- {{ $slot }} --}}
        </div>

        <div>
            <x-sidebar-modal name="sidebar" title="menu">
                <x-slot:body>
                    <nav>
                        <ul>
                            <li><a wire:navigate href="{{ route('products') }}">Products</a></li>
                            <li><a wire:navigate href="{{ route('customers') }}">customers</a></li>
                        </ul>
                    </nav>
                </x-slot>
            </x-sidebar-modal>
            {{ $slot }}
        </div>
        {{-- <script src="./js/bootstrap.bundle.min.js"></script> --}}
    </body>
</html>
