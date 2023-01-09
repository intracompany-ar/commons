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
        @routes(['menu-home-intra', 'notifications', 'modal-help'])
    </head>

    <body class="pb-4" style="font-family:Geogtq-Md,Helvetica,Arial,sans-serif;">
        {{-- padding-bottom: 3rem; Arruinda el layout de scrollspy --}} 

        <noscript><strong>Esta app no va a funcionar corrrectamente sin javascript.</strong></noscript>

        @include('commons::layouts._audios')

        @extra
            {{-- FACEBOOK INCRUSTADO --}}
            <div id="fb-root"></div>
        @endextra

        <div id="app" v-cloak>
            @include('commons::layouts._advices')
            
            <header class="d-print-none">
                <x-nav-bar>@yield('subtitle')</x-nav-bar>
                <div class="separador fino"></div>
                @include('commons::layouts._banner')
            </header>
    
            @intra
                <modal-help ref="modalHelp">
                    @yield('help')
                </modal-help>

                @auth
                    <menu-home-intra
                        id="menuPrincipal"
                        current-route="{{ Route::currentRouteName() }}"
                        @if ( Route::currentRouteName() == 'home' )
                            v-bind:menus="{{ $menus }}"
                            v-bind:historial-backend="{{ json_encode($historial) }}"
                        @endif
                    >{{ __('Hello') }}</menu-home-intra>
                @endauth

                @env('local')
                    {{-- <modal-checkout ref="modalCheckout"></modal-checkout> --}}
                    {{-- <offcanvas-checkout ref="offCanvasCheckout"></offcanvas-checkout> --}}
                @endenv

                @include('humanResources.agenda._modal_contactos')
            @endintra
            
            @yield('contentVue')
        </div>

        {{-- PAGE CONTENT --}}
        <main>
            @yield('content')
        </main>

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
            @env('production')
                <div class="d-print-none">
                    @include('layouts._chat')
                </div>
            @endenv
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

    @stack('scriptsEnd')
</html>