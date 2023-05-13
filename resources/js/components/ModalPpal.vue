<script setup>
    const props = defineProps({
        id:{ required: true, type: String },
        // :large="true"
        large:{ required: false, type: Boolean, default: false }, 
        titulo:{ required: false, type: String, default: '' },
        dark:{ required: false, type: Boolean, default: false }
    });
</script>


<template>
    <div class="modal" v-bind:id="props.id" tabindex="-1" role="dialog">
        <div v-bind:class="'modal-dialog '+(props.large ? 'modal-lg' : '')" 
            role="document" 
            style="-webkit-box-shadow: none !important;
                    background: transparent !important;
                    box-shadow: none !important;
                    border: none !important;
                    position: relative !important;
                    padding: 0 0 0 0 !important;
                    ">
            <div class="modal-content">

                <div class="modal-header" v-bind:class="{'bg-dark':  props.dark, 'text-white': props.dark}">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-9 col-md-9">
                                <h3 class="modal-title" id="titulo_modal_ppal">
                                    {{ props.titulo }}
                                    <span class="loader"><i style="color: #d72f23" class="fa fa-cog fa-spin fa-fw" ></i></span>
                                </h3>
                            </div>
                            <div class="col-3 col-md-3 d-print-none">
                                    <i class="fas fa-times-circle fa-3x" style="cursor: pointer; color: #6a6c6a;" data-bs-dismiss="modal" aria-label="Close"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="separador fino" style="margin-top: -0.25em;"></div>

                <div class="modal-body" id="bodymodalppal" style="min-height: 500px;">
                    <slot name="bodymodal"></slot>
                </div>

                <div class="modal-footer" id="footmodal">
                    <slot name="footmodal"></slot>
                </div>
            </div>
        </div>


        <!-- <ModalPpal titulo="Seleccionar" id="modal_seleccionador" :large="true">
            <template v-slot:bodymodal>
                cosas
            </template>
        </ModalPpal> -->
    </div>
</template>