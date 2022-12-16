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

        @stack('activationVariables')

        @include('commons::layouts._tags_metas')
        @include('layouts._styles_y_favicons')
        @include('layouts._scripts_head')

        @stack('scriptsIni')
    </head>

    <body class="pb-4" style="font-family:Geogtq-Md,Helvetica,Arial,sans-serif;">
        {{-- padding-bottom: 3rem; Arruinda el layout de scrollspy --}} 
        
        <noscript><strong>Esta app no va a funcionar corrrectamente sin javascript.</strong></noscript>
        @include('commons:layouts._audios')

        @extra
            {{-- FACEBOOK INCRUSTADO --}}
            <div id="fb-root"></div>
        @endextra

        <div id="app2"></div>
        
        <div id="app" v-cloak>

            @intra
                <modal-help
                    url-select-company="{{ route('company.select') }}"
                    url-select-responsability-center="{{ route('responsabilityCenter.select', ['todos' => 0]) }}"

                    url-get-database-intervention="{{ route('databaseIntervention.getRowsUserAuth') }}"
                    url-store-database-intervention="{{ route('databaseIntervention.store') }}"

                    url-get-ticket-consultas="{{ route('ticketConsulta.getRowsUserAuth') }}"
                    url-store-ticket-consulta="{{ route('ticketConsulta.storeAuth') }}"

                    url-store-suggestion="{{ route('issue.storeSuggestion')}}"
                    url-store-issue="{{ route('issue.store')}}"
                    
                    v-bind:application-id="{{ $applicationId ?? 1 }}"

                    @auth
                        user-name="{{ auth()->user()->name }}" 
                        user-mail="{{ auth()->user()->email }}" 
                    @endauth

                    ref="modalHelp"
                >
                    @yield('help')
                </modal-help>

                @env('local')
                    {{-- <modal-checkout ref="modalCheckout"></modal-checkout> --}}
                    <offcanvas-checkout ref="offCanvasCheckout"></offcanvas-checkout>
                @endenv

                @include('humanResources.agenda._modal_contactos')
            @endintra

            <header class="d-print-none">
                <x-nav-bar>@yield('subtitle')</x-nav-bar>
                <div class="separador fino"></div>
                @include('commons::layouts._banner')
                {{-- Lo dejo por jetstream pero no lo estoy usando 'header' --}}
                @yield('header')
            </header>

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            @include('commons::layouts._advices')

            @intra
                @auth
                    <menu-home-intra
                        saludo="{{ __('Hello') }}"
                        current-route="{{ Route::currentRouteName() }}"
                        url-get-subsystems="{{ route('subsystem.menu') }}"
                        url-get-historial="{{ route('subsystem.listAccesses') }}"

                        @if ( Route::currentRouteName() == 'home' )
                            v-bind:menus="{{ $menus }}"
                            v-bind:historial-backend="{{ json_encode($historial) }}"
                        @endif

                        ></menu-home-intra>
                @endauth
            @endintra

            <main>
                @yield('contentVue')
            </main>
        </div>

        {{-- PAGE CONTENT --}}
        <main>
            {{-- {{ $slot }} No lo uso porque es para usar <x-app>todo</x-app> como comoponente, yo uso como extends. --}}
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

    @include('layouts._scripts_after_body')
</html>

