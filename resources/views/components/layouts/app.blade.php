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
        @include('styles.layout')
        @include('styles.auth')
        
        @auth
            <div class="main-layout">
                
                @livewire('side-bar')
                <div class="main-section">
                    <nav class="navbar">
                        <a href="" class="main-icon menu-icon">
                            <x-iconsax-lin-arrow-left />
                        </a>
                        <a href="" class="main-icon menu-icon">
                            Sales
                        </a>
                    </nav>
                    <div class="main-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <div class="auth-section">

                <div class="auth-container">
                    <div class="auth-layout">
                        <div class="auth-presentation">
                            <h2 class="auth-title main-title">Sales record</h2>
                        
                            <p class="auth-text main-text">Keep a track on your sales history</p>
                        
                        </div>
                        <img src="{{ url('image/travail-equipe.png') }}" alt="">
                    </div>
                    {{ $slot }}
                </div>
            </div>
        @endguest

    </body>
</html>
