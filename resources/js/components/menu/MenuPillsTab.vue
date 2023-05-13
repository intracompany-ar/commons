<script setup> const props = defineProps(['active', 'id', 'icono']); </script>
<template>
    <li class="nav-item" role="presentation">
        <!-- El -tab de v-bind:id="id+'-tab'" es necesario para que no se mezcle con los de los paneles -->
        <a class="nav-link" v-bind:class="{'active': active}" v-bind:id="id+'-tab'" data-bs-toggle="tab" v-bind:href="'#'+id" role="tab" :aria-controls="id" aria-selected="true">
            <i :class="icono"></i> <b><slot></slot></b>
        </a>
    </li>
</template>