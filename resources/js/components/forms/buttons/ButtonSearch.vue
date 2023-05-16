<script setup>
    const emit = defineEmits(['click']);
    const props = defineProps({
        neuper:{ required: false, type: Boolean, default: true }
    });
</script>

<template>
    <button type="button" v-on:click="emit('click')" class="btn btn-secondary" v-bind:class="{'btn-neuper': props.neuper}" accesskey="B">
        <i class="fas fa-search fa-2x" style="color: #ffffff; font-size: 1.5em;"></i>
        <slot></slot>
    </button>
</template>