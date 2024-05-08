<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Sales Corporation' }}</title>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{-- <link rel="stylesheet" href="./css/bootstrap.min.css"> --}}
        
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    </head>
    <body>
        @include('styles.main')
        
        <div class="main-layout">
            @include('components.sidebar')
    
            <div class="main-section">
                <nav class="navbar">
                    <button x-data x-on:click="$dispatch('open-modal', {name : 'sidebar' })" class="px-3 py-1 bg-teal-500 text-white rounded">Sidebar</button>
                    <button x-data x-on:click="$dispatch('close-modal', {name : 'sidebar' })">X</button>
                </nav>
                <div class="main-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
