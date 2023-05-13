<script setup>
    const props = defineProps({
        icono: { required: false, type: String, default: ''},
        active: { required: false, type: String, default: ''},
        id: { required: true, type: String}
    });
</script>

<template>
    <a class="nav-link mx-1 px-1" v-bind:class="props.active" v-bind:id="id+'-tab'" data-bs-toggle="tab" v-bind:href="'#'+props.id" role="tab" v-bind:aria-controls="props.id" aria-selected="true">
        <span style="font-size: 0.8rem"><i v-bind:class="props.icono"></i></span> 
        <slot></slot>
    </a>
</template>

