<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            @auth
                {{ auth()->user()->name }} ·
            @endauth

            @yield('title') ·

            @intra
                {{ config('app.title.intra') }}
            @else
                @urlcontiene( 'neuper' )
                    {{ config('app.title.neuper') }}
                @elseurlcontiene( 'neumaticossantarosa' )
                    {{ config('app.title.nstarosa') }}
                @endurlcontiene
            @endintra
        </title>

        @include('commons::layouts._tags_metas')
        @include('layouts._styles_y_favicons')
        @include('layouts._scripts_head')
        
        @stack('scriptsIni')
        @routes(['layout', 'menu-home-intra', 'notifications', 'modal-help'])
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
                @urlcontiene('neuper')
                    data-logo="{{ Storage::disk('s3_public')->url('img/fate/logo_neuper_trasl_letra_blanca.png') }}"
                @elseurlcontiene('neumaticossantarosa')
                    data-logo="{{ Storage::disk('s3_public')->url('img/michelin/starosa.png') }}"
                @endurlcontiene
            @endintra

            data-menus-banner='@yield('banner')'
        ></div>
        
        <main> @yield('content') </main>

        {{-- FOOTER --}}
		<footer class="d-print-none
            @intra
                text-light" style="background-color: #6a6c6a; position: fixed;"
            @else
                @urlcontiene( 'neuper' )
                    text-light" style="background-color: #6a6c6a"
                @elseurlcontiene( 'neumaticossantarosa' )
                    site-footer"
                @endurlcontiene
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

    <script src="{{ asset( mix('js/app.js')) }}"></script>

    @intra
        {{-- <script src="{{ asset( mix('js/app_intranet.js')) }}"></script> --}}
    @else
        <script src="{{ asset( mix('js/app_extranet.js')) }}"></script>
        {{-- FACEBOOK --}}
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0&appId=1728936417381958&autoLogAppEvents=1" nonce="XB74hhg2"></script>
    @endintra

    <script>
        $(function() { 
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
    @stack('scriptsEnd')
</html>