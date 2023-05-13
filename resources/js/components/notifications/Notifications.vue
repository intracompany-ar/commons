<script setup>
    import {ref, computed} from 'vue';
    import BadgeCantNotificaciones from './BadgeCantNotificaciones.vue';
    import {authId, info, urlBase} from '../../../commons';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import 'dayjs/locale/es';
    dayjs.locale('es');
    dayjs.extend(relativeTime);

    const notificationsReads = ref(null);
    const notificationsUnreads = ref([]);
    const loading = ref(false);

    getNoLeidas();// No poner antes que los refs porque usa loading

    const cantidadSinLeer = computed( () => { return notificationsUnreads.value ? notificationsUnreads.value.length : 0 });

    function showNotification()
    {
        if( !notificationsReads.value ){  getLeidas() };
        if( cantidadSinLeer.value > 0 ){ axios.put( route('notificacion.marcarTodasComoLeidas') ) };
    }

    function getLeidas()
    {
        loading.value = true;
        axios( route('notificacion.getLeidas') )
            .then( response => notificationsReads.value = response.data )
            .then( () => loading.value = false );
    }

    function getNoLeidas()
    {
        loading.value = true;
        axios( route('notificacion.getNoLeidas') )
            .then( response => {
                notificationsUnreads.value = response.data;
                if(notificationsUnreads.value.length > 0){
                    document.getElementById('notifsmell').play();
                };
            })
            .then( () => loading.value = false );
    }

    /**
     * Echo se carga en app.js --> bootstrap.js al final,(como la doc Laravel) 
     * Acá utilizo un canal privado del usuario authId
     */
    Echo.private(`App.Models.User.${authId}` )
        .notification((notification) => {
            // console.log(notification);
            // // {link: "cuitSituacionConsulta/10", mensaje: "URGENTE. Solicitud de calificación de CUIT.20339229903 adpalarich", id: "3f8af904-7b9a-4ff9-a14d-ebf2ea84ec58", type: "App\\Notifications\\CuitSituacionConsultaCreatedNotification"}

            getNoLeidas();

            switch (notification.type) {

                case 'App\\Notifications\\CollectionNoticeCreatedNotification':
                    info('Nuevo aviso de cobro centralizado', 'COBRO CENTRALIZADO');
                    break;
                case 'App\\Notifications\\CollectionNoticeApprovalCreatedNotification':
                    info('Cobro confirmado', 'COBRO CONFIRMADO');
                    break;
                case 'App\\Notifications\\CuitSituacionConsultaCreatedNotification':
                    info('Nueva consulta de situación de CUIT', 'SITUACIÓN CUIT');
                    break;
                case 'App\\Notifications\\CuitSituacionRespuestaCreatedNotification':
                    info('Consulta de CUIT respondida', 'SITUACIÓN CUIT');
                    break;

                default:
                    break;
            }
        });

    /**
     * Notificaciones en Chrome, creo que lo hice funcionar y no lo usé porque no puedo usarlo con chrome cerrado
     */
    function requestNotificationPermission()
    {
        switch (Notification.permission) {
            case 'granted':
                alert('Las notificaciones ya están activadas.'); break;
            case 'denied':
                alert('Las notificaciones para esta web han sido bloqueadas por usted.'); break;
            default:
                Notification.requestPermission()
                    .then( result => {
                        if(result !== 'granted') { console.error('Permission not granted for Notification') }
                    });
        }
    }
    // VALORES POSIBLES PARA OPTIONS DE LOCAL NOTIFICATIONS
        //             const options = {
        //   "//": "Visual Options",
        //   "body": "<String>",
        //   "icon": "<URL String>",
        //   "image": "<URL String>",
        //   "badge": "<URL String>",
        //   "vibrate": "<Array of Integers>",
        //   "sound": "<URL String>",
        //   "dir": "<String of 'auto' | 'ltr' | 'rtl'>",
        //   "//": "Behavioural Options",
        //   "tag": "<String>",
        //   "data": "<Anything>",
        //   "requireInteraction": "<boolean>",
        //   "renotify": "<Boolean>",
        //   "silent": "<Boolean>",
        //   "//": "Both Visual & Behavioural Options",
        //   "actions": "<Array of Strings>",
        //   "//": "Information Option. No visual affect.",
        //   "timestamp": "<Long>"
        // }

    // showLocalNotification(title, body){
    //     const options = {
    //         body: body,
    //         // here you can add more properties like icon, image, vibrate, etc.
    //     };
    //     new Notification(title, options);
    // }
</script>

<template>
    <a  class="dropdown-toggle nav-link"
        data-bs-toggle="dropdown"
        role="button"
        aria-haspopup="true"
        aria-expanded="false"
        v-on:click="showNotification"
        id="dropdown-campana-notificacion"
        href="#"
    >
        <i class="fa fa-bell" aria-hidden="true" v-bind:style="cantidadSinLeer > 0 ? 'color: #d72f23;' : '' "></i>
        <BadgeCantNotificaciones v-if="cantidadSinLeer > 0">{{ cantidadSinLeer }}</BadgeCantNotificaciones>
    </a>

    <div class="dropdown-menu dropdown-menu-end dropneuper" aria-labelledby="navbarDropdownMenuLink"
            style="width: min-content; max-width:100%; overflow-y: scroll;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h5><b>Notificaciones</b></h5>
                </div>

                <!-- {{--
                    Funciona ok, pero todavía no lo estoy aprovechando porque no puedo activar pusher(lara Echo) con chrome cerrado
                    <div class="col-4">
                    <button class="btn btn-primary btn-sm" v-on:click="requestNotificationPermission">Activar notificación en celular</button>

                    <button class="btn btn-primary btn-sm" v-on:click="showLocalNotification('hola', 'bodyyy' )">Notif test</button>

                    </div> --}} -->
            </div>

            <div class="row">
                <div class="col-12">
                    <b>Nuevas</b>
                    <p v-if="cantidadSinLeer == 0" class="text-muted">Sin notificaciones nuevas</p>
                </div>

                <div class="col-12" v-for="noLeida in notificationsUnreads" v-bind:key="noLeida.id">
                    <a  class="dropdown-item px-0"
                        v-bind:href="urlBase +'/'+ noLeida.data.link">
                        <span style="color: #d72f23;"><i class="fas fa-circle"></i></span>
                        {{ noLeida.data.mensaje }}
                        <br>
                        <small class="text-muted">{{ dayjs(noLeida.created_at).fromNow() }}</small>
                    </a>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <b>Anteriores</b>
                </div>

                <div class="col-12 text-center" v-if="loading">
                    <div class="spinner-border spinner-border-sm text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                
                <div class="col-12" v-for="notificacion in notificationsReads" v-bind:key="notificacion.id">
                    <a class="dropdown-item px-0 " v-bind:href="urlBase+'/'+notificacion.data.link" v-bind:title="notificacion.read_at">
                        {{ notificacion.data.mensaje }}
                        <br>
                        <small class="text-muted">{{ dayjs(notificacion.created_at).fromNow() }}</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>