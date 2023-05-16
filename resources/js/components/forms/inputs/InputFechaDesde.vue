
<script setup>
    import {ref} from 'vue';
    import dayjs from 'dayjs';

    const valorFinal = ref('2100-01-01');
    const emit = defineEmits(['input']);
    
    const props = defineProps({
        dias: { required: false, type: [String, Number], default: 30 },
        big: { required: false, type: Boolean, default: false },
        name: { required: false, type: String, default: 'desde' },
        id: { required: false, type: String, default: 'desde' },
        value: { required: false, type: String }
    })

    valorFinal.value = dayjs().subtract(props.dias, 'days').format("YYYY-MM-DD");
</script>

<template>
    <label class="form-label" v-bind:for="props.id">Desde:</label>
    <input type="date" class="form-control" 
            v-bind:class="{'form-control-sm': !props.big}" 
            v-bind:name="props.name" 
            v-bind:id="props.id" 
            v-bind:value="valorFinal"
            v-on:input="emit('input', $event.target.value)"
            >
    <!-- <InputFechaDesde dias="30"></InputFechaDesde> -->
</template>

