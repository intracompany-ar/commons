<script setup>
    const props = defineProps({
        icono: { required: false, type: String, default: ''},
        active: { required: false, type: String, default: ''},
        id: { required: true, type: String}
    });
</script>

<template>
    <a class="nav-link mx-1 px-1" v-bind:class="props.active" v-bind:id="props.id+'-tab'" data-bs-toggle="modal" v-bind:href="'#'+props.id">
        <span style="font-size: 0.8rem"><i v-bind:class="props.icono"></i></span>
        <slot></slot> 
        <span style="font-size: 0.8rem"><i class="far fa-window-restore"></i></span>
    </a>
</template>




    
