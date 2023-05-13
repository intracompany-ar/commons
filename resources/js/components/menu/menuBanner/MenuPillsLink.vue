<script setup>
    const props = defineProps({
        icono: { required: false, type: String, default: ''},
        id: { required: false, type: String, default: 'link'},
        href: { required: false, type: String, default: '#'},
        target: { required: false, type: String, default: '_blank'}
    })
</script>

<template>
    <a  class="nav-link mx-1 px-1" 
        v-bind:id="props.id+'-tab'" v-bind:href="props.href" role="tab" v-bind:target="props.target"
        rel="noreferrer noopener" v-bind:aria-controls="props.id" aria-selected="true" >
        
        <span style="font-size: 0.8rem"><i v-bind:class="props.icono"></i></span>
        <slot></slot>
        <span v-if="props.target == '_blank'" style="font-size: 0.8rem"><i class="fas fa-external-link-alt"></i></span>
    </a>
</template>



