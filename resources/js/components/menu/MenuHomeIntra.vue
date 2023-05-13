<script setup>
    import {ref, onMounted, watch } from 'vue'
    import MenuLink from './MenuLink.vue'
    import MenuHomeElement from './MenuHomeElement.vue'

    const historial = ref([]);
    const companyDepartments = ref([]);
    const loader_historial = ref(false);

    const props = defineProps({
        currentRouteName:{ required: false, type: String, default: '' },
        menus:{ required: false, type: [Array, String], default(){ return [] } },
        historialBackend:{ required: false, type: [Array, String], default(){ return [] } },
        id:{ required: false, type: String, default: 'offcanvasMenu' }
    })

    if (props.currentRouteName == 'home') {
        companyDepartments.value = JSON.parse(props.menus);
        historial.value = JSON.parse(props.historialBackend);
        
        let arrayCompanyDept = companyDepartments.value;
        if (Array.isArray(arrayCompanyDept)) {
            companyDepartments.value = arrayCompanyDept.filter( companyDepartment => companyDepartment.subsystems.length > 0);
        }

    }else{
        getHistorial(); getMenu(); // No juntarlas en Promise all, es solamente cuando requiere las 2 si o si.
    };
    
    onMounted( () => {
        setAutocomplete();
        let myOffcanvas = document.getElementById(props.id);
        myOffcanvas.addEventListener('show.bs.offcanvas', function () {
            document.getElementById('searchSubsystem').value = '';
            document.getElementById('searchSubsystem').focus();// No funciona... no se por qué
        })
    })

    watch(companyDepartments, async() =>  { setAutocomplete() })


    function setAutocomplete()
    {
        // console.log('ini autocomplete');
        if (Array.isArray(companyDepartments.value)) {
            // console.log('set autocomplete', companyDepartments.value);    
            let subsystemsSource = [];
            companyDepartments.value.forEach( companyDepartment => {
                companyDepartment.subsystems.forEach( subsystem => {
                    subsystemsSource.push( {
                            'label': companyDepartment.abbreviation+' / '+subsystem.name,
                            'url': subsystem.ruta,
                        } );
                });
            });
    
            $('#searchSubsystem').autocomplete({
                source: subsystemsSource,
                minLength: 1,
                delay: 100,
                select( event, ui ){ window.location.href = ui.item.url },
            });
        }
    }
    
    function getMenu()
    {
        loader_historial.value = true;
        axios( route('subsystem.menu') )
            .then( response => companyDepartments.value = response.data )
            .then( () => {
                loader_historial.value = false;
                // $('#searchSubsystem').autocomplete({
                //     source: that.companyDepartments,
                //     minLength: 2,
                //     delay: 100,
                //     select( event, ui ){
                //         console.log('Ir a', event);
                //     }
                // });
            });
    }

    function getHistorial()
    {
        loader_historial.value = true;
        axios( route('subsystem.listAccesses') )
            .then( response => historial.value = response.data )
            .then( () => loader_historial.value = false );
    }
</script>


<template>
    
    <aside class="offcanvas offcanvas-start d-print-none" tabindex="-1" v-bind:id="props.id" v-bind:aria-labelledby="props.id+'Label'" style="top: 100px;">
        
        <div id="div_menuHomeIntra"  style="overflow-y: scroll;">

            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="offcanvasLabel"><slot></slot></h4>

                <div class="ui-front">
                    <input type="text" class="form-control mx-4" id="searchSubsystem" autocomplete="off"
                            placeholder="qué subsistema buscas?" autofocus>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>



            <div class="offcanvas-body p-0">
                <div class="accordion">

                    <span v-if="loader_historial">Cargando historial...</span>

                    <MenuHomeElement id="collapseUltVis" accesskey="U" icon="fas fa-history" v-bind:collapsed="props.currentRouteName == 'home' ? false : true">
                        <template v-slot:titulo><u>Ú</u>LTIMOS VISITADOS</template>
                        <template v-slot:cuerpo>
                            <span v-for="row in historial" v-bind:key="row.subsystem_id">
                                <MenuLink v-bind:href="row.url" v-if="row.subsystem_id" >{{ row.subsystem_nombre }}</MenuLink>
                                <MenuLink v-bind:href="row.ruta" v-else>* {{ row.titulo }} </MenuLink>
                            </span>
                        </template>
                    </MenuHomeElement>

                    <MenuHomeElement v-for="companyDepartment in companyDepartments" v-bind:key="companyDepartment.id"
                        v-bind:id="'collapse'+companyDepartment.id"
                        v-bind:title="companyDepartment.abbreviation"
                        v-bind:accesskey="companyDepartment.accesskey"
                        v-bind:icon="companyDepartment.icon_fontawesome"
                    >
                        <template v-slot:titulo>{{ companyDepartment.name.toUpperCase() }}
                            <small class="text-muted">({{ companyDepartment.accesskey }})</small>
                        </template>

                        <template v-slot:cuerpo>
                            <MenuLink v-for="subsystem in companyDepartment.subsystems" v-bind:key="subsystem.id"
                                v-bind:href="subsystem.ruta"
                                v-bind:externo="subsystem.is_route_name === 0"
                                >{{ subsystem.name }}</MenuLink>
                        </template>
                    </MenuHomeElement>

                </div>
            </div>
        </div>
    </aside>
</template>