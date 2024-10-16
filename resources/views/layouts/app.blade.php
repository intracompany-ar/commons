<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title id="title">
            @yield('title') {{ config('commons.title') }}
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
            <meta name="actualizopassw" content="{{ auth()->user()->actualizopassw }}">
            <meta name="person-first-name" content="{{ auth()->user()->person?->first_name }}">
            <meta name="profile-photo" content="{{ auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : asset('storage/img/bib.png') }}">
        @endauth

        @include('commons::layouts._head_standard')
        @stack('scriptsIni')
    </head>

    <body class="pb-4" style="font-family:Geogtq-Md,Helvetica,Arial,sans-serif;">
        <noscript>
            <strong>Esta app no va a funcionar corrrectamente sin javascript.</strong>
        </noscript>

        @if (config('commons.audios'))
            {{-- <audio id="notifsmell" src="{{ asset('storage/audio/notifsmell.mp3') }}" preload="auto"></audio> --}}
            <audio id="notifsmell" src="{{ asset('vendor/audio/notifgunsguitar.mp3') }}" preload="auto"></audio>
            <audio id="notifcoldday" src="{{ asset('vendor/audio/notifcoldday.mp3') }}" preload="auto"></audio>
            <audio id="notiferror" src="{{ asset('vendor/audio/notiferror.mp3') }}" preload="auto"></audio>
        @endif

        {{-- FACEBOOK INCRUSTADO --}}
        @if (config('commons.facebook'))
            {{-- FACEBOOK INCRUSTADO --}}
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v18.0&appId=1728936417381958" nonce="DMN6QhSp"></script>
        @endif

        <div id="app" v-cloak
            
            data-token="{{ session('token') }}"

            data-title="@yield('subtitle')"
            data-help="@yield('help')"
            
            data-now-backend="{{ now() }}"

            data-version-backend="{{ json_decode(file_get_contents(base_path('composer.json')), true)['version'] }}"
            
            data-breadcrumb="@yield('breadcrumb')"
            
            data-saludo="{{ __('Hello') }}"
            
            data-menus-backend="{{ isset($menus) ? json_encode($menus) : null }}"
            data-historial-backend="{{ isset($historial) ? json_encode($historial) : null }}" 
            data-close-session-label="{{ __('Cerrar sesión') }}" 
            data-show-logo="@yield('logo')"            
            data-logo="{{ config('commons.logo.path') }}"
            data-width-logo="{{ config('commons.logo.width') }}" 

            data-success ="{{ session('success') ?? null }}"
            data-status ="{{ session('status') ?? null }}"
            data-fail ="{{ session('fail') ?? null }}"
            data-error ="{{ session('error') ?? null }}"
            data-info ="{{ session('info') ?? null }}"
            data-errors="{{ isset($errors) ? ($errors->any() ? json_encode($errors->all()) : null) : null }}"

            data-auth='{{ json_encode(
                auth()->user()->load([
                    'person:id,entity_id,name',
                    'person.lastEmployment:id,entity_id,sucursal_actual_id',
                    'person.lastEmployment.sucursalActual:id,name',
                    'company:id,name,entity_id',
                ])
                ->only('id', 'name', 'email', 'person_id', 'profile_photo_url', 'person', 'company')
            ) }}'
        ></div>

        <main> @yield('content') </main>
        
        {{-- FOOTER --}}
		<footer class="d-print-none text-light" 
            style="background-color: #6a6c6a; @if(config('commons.footer_position_fixed')) position: fixed; @endif">
			@yield('footer')
        </footer>


        {{-- CHAT --}}
        @if(config('commons.chat'))
            <div class="d-print-none">
                <div id="chat-container"></div>
            </div>
        @endif
    </body>
    
    @stack('scriptsEnd')
    <script>
        window.flash = @json(['front_route' => session('front_route')]);
    </script>
</html>