<script setup>
    import {ref, computed, watch, onMounted} from 'vue'
    import { getCartGeneral } from '../../commons';
    
    const emit = defineEmits(['click', 'refreshedCartItems', 'subtotal'])

    const props = defineProps({
        // Para desactivarlos en CreateSalesOrders
        checkoutButton:{ required: false, type: Boolean, default: true },
        avisoCarroVacio:{ required: false, type: Boolean, default: true },
    });

    const mode = ref('cart'); // puede ser truck, para usar en Comprob Stock
    const cartItems =  ref([])

    /**
     * Carga inicial
     */
    getCart()

    /**
     * Lo uso para actualizar el aviso de cant items en el carro del ícono 
     */
    watch(cartItems, async() =>  { emit('refreshedCartItems', cartItems.value) }, { deep: true})

    const subtotal = computed(() =>  {
        let acum = 0;
        if (cartItems.value.length > 0) {
            cartItems.value.forEach(cartItem => {
                acum += parseFloat(cartItem.finalPrice) * cartItem.quantity;
            });
        }
        emit('subtotal', acum)
        return acum;
    })

    /**
     * METHODS
     */
    defineExpose({reset, getCart, pushRow})

    function pushRow( mode, item_id, code, description, quantity, listPrice = 0, finalPrice = 0 ){
        if(mode == 'truck'){ mode.value = 'truck' };

        let indexYaExistiaEnDespacho = articuloYaExistiaEnEsteDespacho(item_id);
        // Si el nuevo item ya había sido cargado 
        // --> sumar mismo artículo
        // TODO la opción, por ahora solo sumo -->ó mandar un aviso de confirmación y las cantidades o reemplazar según el usuario elija
        if( indexYaExistiaEnDespacho ){
            cartItems.value[indexYaExistiaEnDespacho].quantity += parseInt( quantity );
        }else{
            let cartItem = {
                    item_id: item_id,
                    code: code,
                    description: description,
                    quantity: quantity,
                    listPrice: listPrice,
                    finalPrice: finalPrice
                };
            cartItems.value.push(cartItem);

            refreshCart();
        };
    }

    function refreshCart(){
        axios.post( route('cartItem.store'), {cartItems: cartItems.value})
    }

    function getCart(){
        axios(route('cartItem.index')).then( response => cartItems.value = response.data );
    }


    function deleteItem( key ){
        if (confirm('Desea eliminar este elemento del carrito?')) {
            cartItems.value.splice(key, 1);
            refreshCart();
            getCartGeneral();
        }
    }

    function reset(){
        cartItems.value = [];
        refreshCart();
        getCartGeneral();
    }

    function clearCart(){
        if (confirm('Desea vaciar este carrito?')) { reset() }
    }

    /**
     * Determinar si un articulo_id ya está el carrito
     */
    function articuloYaExistiaEnEsteDespacho(item_id){
        let banderaReturn = false
        cartItems.value.forEach( (cartItem, index) => {
            banderaReturn = cartItem.item_id == item_id ? index : banderaReturn;
        })
        return banderaReturn;
    }

</script>

<template>
    <div v-if="cartItems.length == 0">
        <div class="container-fluid" v-if="props.avisoCarroVacio"><h5>Carro vacío</h5></div>
    </div>

    <div class="container-fluid" v-else>
        
        <div class="row" v-for="(item, key) in cartItems">
            <input type="hidden" v-bind:name="'cartItems['+key+'][quantity]'" v-bind:value="item.quantity">
            <input type="hidden" v-bind:name="'cartItems['+key+'][finalPrice]'" v-bind:value="item.finalPrice">
            <input type="hidden" v-bind:name="'cartItems['+key+'][description]'" v-bind:value="item.description">
            <input type="hidden" v-bind:name="'cartItems['+key+'][item_id]'" v-bind:value="item.item_id">
            <input type="hidden" v-bind:name="'cartItems['+key+'][code]'" v-bind:value="item.code">
            <input type="hidden" v-bind:name="'cartItems['+key+'][listPrice]'" v-bind:value="item.listPrice">

            <div class="col-11">
                <!-- {{ item.item_id }}  -->
                <!-- {{ item.listPrice }}  -->
                {{ item.quantity }} X
                <b v-if="mode == 'cart'">$ {{ item.finalPrice }} </b>
                <span class="text-muted ms-2">{{ item.code }}</span> 
                <span v-bind:title="item.description">{{ item.description.substring(0,30) }}</span>
            </div>

            <div class="col-1 text-right">
                <a href="#" v-on:click.prevent="deleteItem(key)">
                    <i class="far fa-times-circle"></i>
                </a>
            </div>

            <hr class="m-0">
        </div>

        <div class="row" >
            <div class="col-8">
                <span v-if="mode == 'cart'" class="text-muted pt-2">Subtotal</span>
                <span class="h4 mt-4">$ {{ subtotal }}</span>

                <a href="#" class="badge rounded-pill text-bg-danger" 
                    v-on:click.prevent="clearCart">Vaciar Carro</a>
            </div>

            <div class="d-grid gap-2 col-4 mx-auto" v-if="props.checkoutButton">
                <button type="button" class="btn btn-primary"
                    v-if="mode == 'cart'"
                    v-on:click.prevent="emit('click', cartItems)">
                    CHECKOUT
                </button>
                <!-- View Cart -> show_cart -->
            </div>
        </div>

    </div>
</template>