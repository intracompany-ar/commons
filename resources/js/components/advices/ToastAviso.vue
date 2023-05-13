<script setup>
    const props = defineProps(['titulo', 'tipo', 'id']);
</script>

<template>
    <div class="toast align-items-center"
        v-bind:class="{   'text-white bg-primary': props.tipo == 'Info',
                    'text-white bg-danger': props.tipo == 'Danger',
                    'text-white bg-success': props.tipo == 'Success',
                    'bg-warning': props.tipo == 'Warning'
                }"
        data-bs-delay="7000"
        data-bs-autohide="true"
        role="alert" aria-live="assertive" aria-atomic="true" 
        v-bind:id="props.id">
        <div class="toast-header">
            <strong class="me-auto">
                <i class="fas fa-info-circle" v-if="props.tipo == 'Info'"></i>
                <i class="fas fa-exclamation-circle" v-if="props.tipo == 'Danger'"></i>
                <i class="fas fa-exclamation-triangle" v-if="props.tipo == 'Warning'"></i>
                <i class="far fa-check-circle" v-if="props.tipo == 'Success'"></i>

                {{ props.titulo }}
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"><slot></slot></div>
    </div>
</template>