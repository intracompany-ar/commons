<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            @auth
                {{ auth()->user()->name }} ·
            @endauth

            @yield('title') · {{ config('commons.subtitle-fix') }}

            @intra
                {{ config('app.title.intra') }}
            @else
                {{ config('app.title.neuper') }}
            @endintra
        </title>


        {{-- Antes: config('app.url') --> No funcionan los links a id dentro de la misma página --> Lo cambio por url()->current(). --}}
        <base href="{{ url()->current() }}">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        {{-- , user-scalable=no no hace falta mientras programe responsive --}}
        <meta name="format-detection" content="telephone=no">
        <meta name="author" content="Dux Ducis Arsen">
        <link rel="manifest" href="/manifest.json">

        <meta name="app-id" content="{{ $applicationId ?? 1 }}">
        <meta name="csrf-token" content="{{ csrf_token() ?? 0 }}">
        <meta name="theme-color" content="{{ config('commons.theme-color') }}">
        <meta name="description" content="{{ config('commons.description') }}">
        <meta name="today" content="{{ date('Y-m-d') }}">
        <meta name="keywords" content="{{ config('commons.key-words') }}">
        
        @intra
            <meta name='robots' content='noindex,nofollow'>
            <meta name="googlebot" content="noindex">
            <meta name="url-base" content="{{ config('app.url_intra') }}">
            
            @auth
                <meta name="auth-id" content="{{ auth()->id() }}">
                <meta name="auth-name" content="{{ auth()->user()->name }}">
                <meta name="auth-email" content="{{ auth()->user()->email }}">
                <meta name="person-id" content="{{ auth()->user()->person_id }}">
                <meta name="person-first-name" content="{{ auth()->user()->person->first_name }}">
                <meta name="profile-photo" content="{{ auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : asset('storage/img/bib.png') }}">
            @endauth
        @else
            @include('commons::layouts._tags_metas_public')
        @endintra

        @include('layouts._styles_y_favicons')

        @include('layouts._scripts_head')
        @stack('scriptsIni')
    </head>

    <body class="pb-4" style="font-family:Geogtq-Md,Helvetica,Arial,sans-serif;">
        {{-- padding-bottom: 3rem; Arruinda el layout de scrollspy --}} 

        <noscript><strong>Esta app no va a funcionar corrrectamente sin javascript.</strong></noscript>

        @include('commons::layouts._audios')

        @extra
            {{-- FACEBOOK INCRUSTADO --}}
            <div id="fb-root"></div>
        @endextra

        <div id="app" v-cloak
            data-title="@yield('subtitle')"
            data-help="@yield('help')"
            @intra
                data-is-intra="true"
            @endintra
            @env('local')
                data-is-local="true"
            @endenv
            data-breadcrumb="@yield('breadcrumb')"
            data-current-route-name="{{ Route::currentRouteName() }}"
            data-saludo="{{ __('Hello') }}"
            
            data-menus-backend="{{ isset($menus) ? json_encode($menus) : null }}"
            data-historial-backend="{{ isset($historial) ? json_encode($historial) : null }}" 
            data-close-session-label="{{ __('Cerrar sesión') }}" 
            
            @intra
                data-logo="{{ asset('storage/img/img_icons/icono_grupo_72.png') }}"
            @else
                data-logo="{{ Storage::disk('s3_public')->url('img/fate/logo_neuper_trasl_letra_blanca.png') }}"
            @endintra

            data-menus-banner='@yield('banner')'
        ></div>
        
        <main> @yield('content') </main>

        {{-- FOOTER --}}
		<footer class="d-print-none
            @intra
                text-light" style="background-color: #6a6c6a; position: fixed;"
            @else
                text-light" style="background-color: #6a6c6a"
            @endintra
            >
			@yield('footer')
        </footer>


        {{-- CHAT --}}
        @intra
            {{-- @env('production')
                <div class="d-print-none">
                    @include('layouts._chat')
                </div>
            @endenv --}}
        @endintra
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