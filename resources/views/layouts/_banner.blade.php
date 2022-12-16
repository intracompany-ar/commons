<div class="container-fluid d-print-none"
    style="vertical-align:middle; margin-bottom: 0.5em; background-color: #e0e3dc; color:#6a6c6a; ">
    <div class="row">

        @intra
            @auth
                {{-- Acceso a menú ppal --}}
                <div class="col-2" style="line-height: 2.2;">
                    <a data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-expanded="false" aria-controls="offcanvasMenu" accesskey="M" title="Menú completo" style="font-size: 1.25rem;">
                        <b><i class="fas fa-bars"></i> <span class="d-none d-sm-inline">Todo</span></b>
                    </a>
                </div>
            @endauth


            <div class="col-10 text-end">
                <div class="p-2">
                    <div style="display: inline-flex; line-height: 0.6rem; font-size: 1rem">
                        @stack('banner')
                    </div>
                </div>
            </div>

        @else
            <div class="col-12 text-end pt-4">
                <h5>
                    <a class="me-4" href="#neumaticos">NEUM&Aacute;TICOS</a>
                    <a class="me-4" href="#servicios">SERVICIOS</a>
                    <a class="me-4" href="#sucursales">SUCURSALES</a>
                    <a class="me-4" href="#modal_create_ticket_consulta" data-bs-toggle="modal">CONTACTO</a>
                    {{-- <a class="me-4" href="{{ route('curriculumVitae.create') }}">TRABAJÁ CON NOSOTROS</a> --}}
                </h5>
            </div>
        @endintra


    </div>
</div>
