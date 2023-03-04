<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            @auth
                {{ auth()->user()->name }} ·
            @endauth

            @yield('title') 

            · {{ config('commons.subtitle-fix') }}
            · {{ config('commons.title') }}
        </title>

        {{-- Antes: config('app.url') --> No funcionan los links a id dentro de la misma página --> Lo cambio por url()->current() --}}
        <base href="{{ url()->current() }}">

        @include('commons::layouts._tags_metas_public')
        
        <meta name="app-id" content="{{ $applicationId ?? 1 }}">
        <meta name="csrf-token" content="{{ csrf_token() ?? 0 }}">
        <meta name="theme-color" content="{{ config('commons.theme-color') }}">
        <meta name="today" content="{{ date('Y-m-d') }}">
        <meta name="url-base" content="{{ config('commons.url') }}">

        @if( config('commons.noindex') )
            <meta name='robots' content='noindex,nofollow'>
            <meta name="googlebot" content="noindex">
        @else
            <meta name="description" content="{{ config('commons.description') }}">
            <meta name="keywords" content="{{ config('commons.key-words') }}">
            {{-- Redes Sociales --}}
            <meta property="og:url" content="{{ config('commons.url') }}">
            <link rel="canonical" href="{{ config('commons.url') }}"/>

            <meta property="og:type" content="article">
            <meta property="og:title" content="{{ config('commons.title') }}">
            <meta property="og:description" content="{{ config('commons.description') }}">
            <meta property="og:image" content="{{ config('commons.og_image') }}">
        @endif

        @auth
            <meta name="auth-id" content="{{ auth()->id() }}">
            <meta name="auth-name" content="{{ auth()->user()->name }}">
            <meta name="auth-email" content="{{ auth()->user()->email }}">
            <meta name="person-id" content="{{ auth()->user()->person_id }}">
            <meta name="person-first-name" content="{{ auth()->user()->person->first_name }}">
            <meta name="profile-photo" content="{{ auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : asset('storage/img/bib.png') }}">
        @endauth

        {{-- STYLES --}}
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/css/vendor.css'])

        <style media="screen">
            /* Para que funcione Geogtq, es la que usa fate.com.ar. En lugar de secure_url deberia usar asset, pero en producción no se por qué toma http */
            @font-face {
                font-family: 'Geogtq-Md';
                font-style: normal;
                font-weight: 400;
                src: local('Geogtq-Md'), local('Geogtq-Md'), url( {{ asset('storage/fonts/Geogtq-Md.otf') }} ) format('opentype');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;/*@*/
            }
        </style>

        <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/img_icons/icono_grupo_32.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/img/img_icons/icono_grupo_180.png') }}">

        {{-- JAVASCRIPT --}}
        @include('layouts._head_standard')
        @stack('scriptsIni')
    </head>

    <body class="pb-4" style="font-family:Geogtq-Md,Helvetica,Arial,sans-serif;">
        {{-- padding-bottom: 3rem; Arruinda el layout de scrollspy --}} 

        <noscript>
            <strong>Esta app no va a funcionar corrrectamente sin javascript.</strong>
        </noscript>

        @include('commons::layouts._audios')

        {{-- FACEBOOK INCRUSTADO --}}
        <div id="fb-root"></div>

        <div id="app" v-cloak
            data-title="@yield('subtitle')"
            data-help="@yield('help')"
            
            @env('local')
                data-is-local="true"
            @endenv

            data-breadcrumb="@yield('breadcrumb')"
            data-current-route-name="{{ Route::currentRouteName() }}"
            data-saludo="{{ __('Hello') }}"
            
            data-menus-backend="{{ isset($menus) ? json_encode($menus) : null }}"
            data-historial-backend="{{ isset($historial) ? json_encode($historial) : null }}" 
            data-close-session-label="{{ __('Cerrar sesión') }}" 
            
            data-logo="{{ config('commons.logo_path') }}"
            data-menus-banner='@yield('banner')'
        ></div>
        
        <main> @yield('content') </main>

        {{-- FOOTER --}}
		<footer class="d-print-none text-light" 
            style="background-color: #6a6c6a; 
                @if(config('commons.footer_position_fixed')) position: fixed; @endif
            ">
			@yield('footer')
        </footer>


        {{-- CHAT --}}
        @if(config('commons.chat'))
            @env('production')
                <div class="d-print-none">
                    <div id="chat-container"></div>
                </div>
            @endenv
        @endif
    </body>
    
    @stack('scriptsEnd')
    {{-- Importante este al final, porque el último routes carga el Ziggy, y está en scriptsEnd; sino da error --}}
    @routes(['layout', 'menu-home-intra', 'notifications', 'modal-help'])

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            @if (session('success'))
                window.app.success( "{{ session('success') }}" );
            @endif

            @if (session('status'))
                window.app.success( "{{ session('status') }}" );
            @endif

            @if (session('fail'))
                window.app.danger( "{{ session('fail') }}" );
            @endif

            @if (session('error'))
                window.app.danger( "{{ session('error') }}" );
            @endif

            @if(Session::has('info'))
                window.app.info( "{{ session('info') }}" );
            @endif

            @if (isset($errors))
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        window.app.warning( "{{ $error }}" );
                    @endforeach
                @endif
            @endif
        });
    </script>
    
</html>