<script setup>
    const props = defineProps({
        id:{ required: true, type: String },
        icon:{ required: true, type: String },
        accesskey:{ required: true, type: String },
        title:{ required: false, type: String, default: '' },
        collapsed:{ required: false, type: Boolean, default: true },
    });
</script>

<template>
    <div class="accordion-item mb-1" v-bind:title="title">
        <h2 class="accordion-header">
            <button class="accordion-button pb-2 pt-2 ps-1" v-bind:class="{'collapsed': collapsed}" type="button" data-bs-toggle="collapse" v-bind:data-bs-target="'#'+id"
                aria-expanded="false" aria-controls="collapseOne" v-bind:accesskey="accesskey">
                <b><i v-bind:class="icon"></i></b>&nbsp;<slot name="titulo"></slot>
            </button>
        </h2>
        <div v-bind:id="id" class="accordion-collapse collapse" v-bind:class="{'show': !collapsed}" aria-labelledby="headingOne" data-bs-parent="#div_menuHomeIntra">
            <div class="accordion-body p-0">
                <ul class="list-group list-group-flush mt-0">
                    <slot name="cuerpo"></slot>
                </ul>
            </div>
        </div>
    </div>
</template>