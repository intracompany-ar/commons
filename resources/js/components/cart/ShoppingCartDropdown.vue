<script setup>
    import { ref } from 'vue';
    import ListMaterialsPrice from './ListMaterialsPrice.vue';
    import ShoppingCartPickingTruckIcon from './ShoppingCartPickingTruckIcon.vue'
    
    const quantityRows = ref(0)
    const listMaterialsPrice = ref(null)

    defineExpose({getCart, pushRow})
    function pushRow( mode, item_id, code, description, quantity, listPrice = 0, finalPrice = 0 ){
        listMaterialsPrice.value.pushRow(mode, item_id, code, description, quantity, listPrice, finalPrice)
    }
    function getCart(){ listMaterialsPrice.value.getCart() }
</script>

<template>
    <ShoppingCartPickingTruckIcon mode="cart" v-bind:quantity-rows="quantityRows"/>

    <div class="dropdown-menu dropdown-menu-end dropneuper border border-danger border-3" 
        aria-labelledby="navbarDropdownMenuLink"
        style="max-width:100%; overflow-y: scroll;">
        <ListMaterialsPrice ref="listMaterialsPrice" v-on:refreshed-cart-items="quantityRows = $event.length"/>
    </div>
</template>