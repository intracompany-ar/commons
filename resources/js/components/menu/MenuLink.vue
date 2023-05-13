<script setup>
    const props = defineProps({
        href:{ required: false, type: String, default: '#' },
        externo:{ required: false, type: Boolean, default: false }
    });
</script>

<template>
    <li class="list-group-item" v-bind:class="{'disabled': ['#', ''].includes(href) }">
        <span v-if="['#', ''].includes(href)"> <i class="fas fa-lock"></i> </span>

        <a v-bind:href="href" v-if="externo" target="_blank" rel="noreferrer noopener">
            <slot></slot>
            <i class="fas fa-external-link-alt"></i>
        </a>
        
        <a v-else v-bind:href="href">
            <slot></slot>
        </a>

    </li>
</template>