<div class="modal" id="{{ $id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog {{ $large }}"
        role="document"
        style="-webkit-box-shadow: none !important;
                background: transparent !important;
                box-shadow: none !important;
                border: none !important;
                position: relative !important;">

        <div class="modal-content">

            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9 col-md-9">
                            <h3 class="modal-title" id="titulomodalppal">
                                {{ $titulo }}
                                <span class="loader"><i style="color: #d72f23" class="fa fa-cog fa-spin fa-fw" ></i></span>
                            </h3>
                        </div>
                        <div class="col-3 col-md-3 text-end d-print-none">
                            <i class="fas fa-times-circle fa-3x" style="cursor: pointer; color: #6a6c6a;" data-bs-dismiss="modal" aria-label="Close"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separador fino" style="margin-top: -0.25em;"></div>

            <div class="modal-body" id="bodymodalppal">{{ $slot }}</div>
            <div class="modal-footer" id="footmodalppal">{{ $footer }}</div>
        </div>
    </div>
</div>
