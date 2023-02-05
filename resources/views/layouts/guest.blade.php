<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @auth
            <title>
                {{ auth()->user()->name }} - @yield('title') -
                Intranet
            </title>
        @else
            <title>
                Intranet - 
                @yield('title')
            </title>
        @endauth

        @include('commons::layouts._tags_metas_public')
        
        @include('layouts._styles_y_favicons')
        @include('layouts._scripts_head')
    </head>
    <body>
        {{-- class="font-sans text-gray-900 antialiased"> TAILWIND  --}}
        {{ $slot }}
        @yield('content')
    </body>
</html>
