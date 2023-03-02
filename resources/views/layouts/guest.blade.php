<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ $title }}</title>
        @include('commons::layouts._tags_metas_public')
        @include('layouts._head_standard')
    </head>
    <body>
        {{-- class="font-sans text-gray-900 antialiased"> TAILWIND  --}}
        {{ $slot }}
        @yield('content')
    </body>
</html>
