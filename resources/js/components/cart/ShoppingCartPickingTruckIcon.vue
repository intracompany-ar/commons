<script setup>
    const props = defineProps({
        quantityRows:{ required: true, type: Number },
        mode: { required: false, type: String, default: 'cart' }
    });
</script>

<template>
    <a  class="dropdown-toggle nav-link"
            data-bs-toggle="dropdown"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            id="dropdown-shopping-cart"
            href="#"
        >
        <i v-bind:class="props.mode == 'truck' ? 'fas fa-truck-loading': 'fas fa-shopping-cart' " aria-hidden="true" v-bind:style="props.quantityRows > 0 ? 'color: #d72f23;' : '' "></i>

        <h6>
            <span class="position-absolute start-80 translate-middle badge bg-danger" style="font-size: 0.7em; top: 25%;" v-if="props.quantityRows > 0">

                {{ props.quantityRows }}

                <span class="visually-hidden">
                    unread messages
                </span>

            </span>
        </h6>
    </a>
</template>