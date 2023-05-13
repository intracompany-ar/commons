<script setup>
    import {ref} from 'vue'
    import ToastAviso from './ToastAviso.vue'
    import { Toast } from 'bootstrap'
    
    const WITH_AUDIO = false;
    const optionToast = ref({ animation: true });
    const avisosDOM = ref([]);
            // [
            //     // {tipo: 'Danger', titulo: 'dang', content: 'Algo dang'},
            //     // {tipo: 'Info', titulo: 'info', content: 'Algo info'},
            //     // {tipo: 'Warning', titulo: 'warn', content: 'Algo warn'},
            //     // {tipo: 'Success', titulo: 'scc', content: 'Algo scc'}
            // ]

    ocultarAvisoBackEnd();

    // LIVEWIRE (usa avisos backend como si fueran frontends)
    document.addEventListener("DOMContentLoaded", () => {
        if (typeof Livewire !== 'undefined') {
            Livewire.hook('message.processed', (message, component) => {
                ocultarAvisoBackEnd();
            })
        }
    });

    function ocultarAvisoBackEnd()
    {
        $(".alert-temporal").fadeTo(10000, 10000).slideUp(500, function(){
            $(".alert-temporal").slideUp(500);
        });
    }

    defineExpose({ notificar });// necesito declarar que es accesible desde fuera
    
    function notificar(tipo, content, titulo = null)
    {
        if ( Array.isArray(content) ) {
            // TODO ver como hago un <ul><li></li></ul>
        };
        let id = tipo+Math.round( Math.random() * 10000000 );
        titulo = titulo ?? tipo;
        switch (titulo) {
            case 'Info': titulo = 'Información'; break;
            case 'Danger': titulo = 'Error'; break;
            case 'Warning': titulo = 'Precaución'; break;
            case 'Success': titulo = 'Éxito'; break;
        };

        avisosDOM.value.push( {tipo: tipo, titulo: titulo, content: content, id: id} );
        console.log(avisosDOM.value); 
        setTimeout( () => { // Le tengo que dar tiempo a vue js que renderize el DOM

            let toastElement = document.getElementById(id);
            if (!toastElement) { console.error('No existe id', id); }
            let toast = new Toast(toastElement, optionToast.value);

            // Cuando se cierre el toast lo elimino del avisosDOM
            toastElement.addEventListener('hidden.bs.toast', function () {
                avisosDOM.value.shift();
                toast = null;
            });

            
            if( WITH_AUDIO ){
                let idTrackToPlay = tipo == 'Danger' || tipo == 'Warning' ? 'notiferror' : 'notifcoldday';
                document.getElementById(idTrackToPlay).play();
            };
            toast.show();

        }, 500);
    }
</script>


<template>
    <!-- Toaster (avisos frontend Bootstrap). Modal es z-index: 1060 => a este pongo 1070 -->
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer" style="z-index: 1070; margin-top: 70px">
        <ToastAviso    v-for="aviso in avisosDOM"
                        v-bind:tipo='aviso.tipo'
                        v-bind:titulo='aviso.titulo'
                        v-bind:id="aviso.id"
                        v-bind:key="aviso.id">
            {{ aviso.content }}
        </ToastAviso>
    </div>
</template>