// Advices
export function info(content, titulo = null){   window.app.notificar('Info', content, titulo) };
export function danger(content, titulo = null){ window.app.notificar('Danger', content, titulo) };
export function warning(content, titulo = null){window.app.notificar('Warning', content, titulo) };
export function success(content, titulo = null){window.app.notificar('Success', content, titulo) };
export function pushCartGeneral(content){ window.app.pushCartGeneral(content) };
export function getCartGeneral(content){ window.app.getCart(content) };

export function router(name, params){ return route(name,params)};

export const today = 
    document.head.querySelector('meta[name="today"]') ? document.head.querySelector('meta[name="today"]').content : '';
export const urlBase = 
    document.head.querySelector('meta[name="url-base"]') ? document.head.querySelector('meta[name="url-base"]').content : '';
export const csrf = 
    document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : 0;
export const authId = 
    document.head.querySelector('meta[name="auth-id"]') ? parseInt(document.head.querySelector('meta[name="auth-id"]').content) : 0;
export function isAuth(){ return authId != 0 }
export const authName = 
    document.head.querySelector('meta[name="auth-name"]') ? document.head.querySelector('meta[name="auth-name"]').content : null;
export const authEmail = 
    document.head.querySelector('meta[name="auth-email"]') ? document.head.querySelector('meta[name="auth-email"]').content : null;
export const appId = 
    document.head.querySelector('meta[name="app-id"]') ? parseInt(document.head.querySelector('meta[name="app-id"]').content) : null;
export const personId = 
document.head.querySelector('meta[name="person-id"]') ? parseInt(document.head.querySelector('meta[name="person-id"]').content) : null;
export const personFirstName = 
document.head.querySelector('meta[name="person-first-name"]') ? document.head.querySelector('meta[name="person-first-name"]').content : null;
export const profilePhoto = 
document.head.querySelector('meta[name="profile-photo"]') ? document.head.querySelector('meta[name="profile-photo"]').content : null;
export function disableSubmits(){
    let submits = document.querySelectorAll('button[type="submit"]');
    for (let i = 0; i < submits.length; i++) { submits[i].disabled = true }
};

export function enableSubmits(){
    let submits = document.querySelectorAll('button[type="submit"]');
    for (let i = 0; i < submits.length; i++) { submits[i].disabled = false }
};

export function showLoaders()
{
    // console.log('Show');
    let loaders = document.getElementsByClassName('loader');
    for (let i = 0; i < loaders.length; i++) { loaders[i].style.visibility = "visible" }
};

export function hideLoaders()
{
    // console.log('Hide');
    let loaders = document.getElementsByClassName('loader');
    for (let i = 0; i < loaders.length; i++) { loaders[i].style.visibility = "hidden" }
};

/**
 * TODO Adaptar, estaba an app.js y lo movi aca
 */
export function setFilters(filtersSelected)
{
    console.debug('Nuevo set de filtros', filtersSelected);
    let filterValues = ['desde','hasta','from','to','company_group_id','company_id','sucursal_id','employment_id','zona_id','zonas','client_id','rubro_cod','tipo_agrup_id','month','year'];
    filterValues.forEach(value => {
        filtros.value[value]= filtersSelected[value];    
    });
};

export function copiar(textoACopiar, modal_id = null)
{
    let inputAux = document.createElement('textarea');
        inputAux.id = 'inputAux';
        inputAux.value = textoACopiar;

    // Esto es porque cuando llamo el copiar desde un modal si lo hago con append body luego no puedo usar select()
    if(modal_id){
        document.getElementById(modal_id).appendChild(inputAux);
    }else{
        document.body.appendChild(inputAux);
    }

    inputAux.select();

    try {
        if( document.execCommand('copy') ){
            window.app.notificar('Info', 'Texto copiado a la portapapeles. Utilícelo con Ctrl+V o Pegar')
        };
    } catch (err) {
        window.app.notificar('Danger', 'Texto copiado a la portapapeles. Utilícelo con Ctrl+V o Pegar')
    };
    document.getElementById("inputAux").remove();
}

import { ref } from 'vue'
export function useFetchDatatable() 
{
    const dataTableRows = ref([]);
    const dataTableTable = ref(null);

    function setRowsDatatable(url, tableId = '', buttons = [], select = false){
        getRows(url, tableId, buttons, select)
    }

    function setRowsDatatable0(url, filtros = {}, tableId = '', buttons = [], select = false)
    {
        // filtros obj { fecha: '2021-01-01', tipo: 10}
        Object.keys(filtros).forEach( filtroKey => {
            let filtroValue = filtros[filtroKey] == '' ? ' ' : filtros[filtroKey];
            url = url.replace(':'+filtroKey, filtroValue).replace('%3A'+filtroKey, filtroValue); // El %3A porque si agrego la variable get sin laravel, con url?variable=valor  route() encode los : como %3A
        });
        getRows(url, tableId, buttons, select)
    }

    function getRows(url, tableId, buttons, select)
    {
        axios( url, {
            dataType: 'json',
            headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
            mode: 'no-cors',
            credentials: 'include'
        })
        .then( response => {
            resetDataTable();
            dataTableRows.value = response.data;
        })
        .catch( error => resetDataTable() )
        .then( () => {
            if(tableId != ''){
                // console.log('hola', tableId);
                dataTableTable.value = $('#'+tableId).DataTable({
                        stateSave: true,
                        buttons: buttons,
                        select: select
                    }
                )
                // console.log(dataTableTable.value);
            }
        })
    }

    function resetDataTable(){
        dataTableRows.value = [];
        if(dataTableTable && dataTableTable.value){ dataTableTable.value.destroy() };
    }

    return { dataTableRows, setRowsDatatable0, resetDataTable, dataTableTable}
}

export function useFetch() 
{
    const dataTableRows = ref([])
    const dataTableTable = ref(null)

    function setRowsDatatable(url, tableId = '', buttons = [], select = false){

        axios( url, {
            dataType: 'json',
            headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
            mode: 'no-cors',
            credentials: 'include'
        })
        .then( response => {
            resetDataTable();
            dataTableRows.value = response.data;
        })
        .catch( error => resetDataTable() )
        .then( () => {
            if(tableId != ''){
                // console.log('hola', tableId);
                dataTableTable.value = $('#'+tableId).DataTable({
                        stateSave: true,
                        buttons: buttons,
                        select: select
                    }
                )
                // console.log(dataTableTable.value);
            }
        })
    }

    function resetDataTable(){
        dataTableRows.value = [];
        if(dataTableTable && dataTableTable.value){ dataTableTable.value.destroy() };
    }
    return { dataTableRows, setRowsDatatable, resetDataTable, dataTableTable}
}





import {Modal} from 'bootstrap'
export function closeModals()
{
    let modals = document.getElementsByClassName('modal');
    for (let i = 0; i < modals.length; i++) {
        let modal = Modal.getInstance(modals[i]);// Getinstance toma instancia ya existente. No usar new Modal
        // Bootstrap solo crea la instancia del modal si alguna vez fue abierto, sino es solo código
        if(modal){ modal.hide() }
    }
};

export function openModal(modalId)
{
    let element = document.getElementById(modalId);
    if (element) {
        let modal = new Modal(element);
        modal.show();    
    }else{ console.error('No existe el modal_id'); }
}



// etiq: el id del input desde donde se va a buscar y se va a poner el label
// val: el id del input donde se va a guardar el value

/**
 * Envía la cadena buscada al backend y solo retorna esos valores
 */
export function autocompleteBackEnd(urlac, etiq, val, etiq2 = null, callback_select = null, minLength = 3){
    setAutocomplete(urlac, etiq, null, val, etiq2, callback_select, minLength ) 
};

/**
 * Busca todos los datos y luego carga el autocomplete. Usar cuando no sea demasiados datos, evaluar la velocidad
 */
export function autocompleteFrontEnd(urlac, etiq, val = '', etiq2 = null, callback_select = null, minLength = 3)
{
    axios(urlac)
        .then( response => setAutocomplete(urlac, etiq, response.data, val, etiq2, callback_select, minLength ) )
};

function setAutocomplete(urlac, etiq, availableTags = null, val = '', etiq2 = null, callback_select = null, minLength = 3 )
{
    let options = {
        source( request, response ) {
            // console.log('Req', request); console.log('Res', response);
            response( $.ui.autocomplete.filter( availableTags, request.term ) );    
            
        },
        minLength: minLength,
        delay: 400,

        focus( event, ui ) { // console.log('focus autocomplete');
            setLabelAutocomplete(ui, etiq, val, etiq2)
        },

        select(event, ui) {
            event.preventDefault(); // console.log('select autocomplete', ui, etiq, val, etiq2);
            setLabelAutocomplete(ui, etiq, val, etiq2);

            if( callback_select ){ callback_select(ui) };// Tiene que ir después del setLabelAutocomplete
        },

        change(event,ui){
            event.preventDefault(); // console.log('change');
            setLabelAutocomplete(ui, etiq, val, etiq2);
        }
    };
    options.source = !availableTags ? urlac : options.source;// Es backend
    $( '#'+etiq+'').autocomplete(options)

};

function setLabelAutocomplete(ui, etiq, val, etiq2)
{
    // console.debug('1Emit value-founded', ui, etiq, val, etiq2);
    if(ui.item)
    {
        // console.debug('2Emit value-founded', ui.item);
        // emit('value-founded', {'item': ui.item });
        document.getElementById(etiq).value = ui.item.label;
        if (val) { document.getElementById(val).value = ui.item.value; };
        if( etiq2 ){ document.getElementById(etiq2).value = ui.item.label2 };
    }
}; 


const REG_EXP_MAIL = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const REG_EXP_DIST_DE_NUMERO = /[^0-9]/g;

export function isEmail( text ){
    return REG_EXP_MAIL.test( String(text).toLowerCase() );
};

export function validarCuit(cuitNoValidado) {
    cuitNoValidado = cuitNoValidado.toString();

    let cuitSoloNumeros = cuitNoValidado.replace(REG_EXP_DIST_DE_NUMERO, '');

    if(cuitSoloNumeros.length != 11) {  return false };

    let acumulado 	    = 0;
    let arrayDigitos 	= cuitSoloNumeros.split("");
    let ultimoDigito    = arrayDigitos.pop(); // elimina el último elemento y lo retorna

    arrayDigitos.forEach( (element, key) => {
        acumulado += arrayDigitos[9 - key] * (2 + (key % 6));
    });

    let verif = (11 - (acumulado % 11)) == 11
                ? 0
                :11 - (acumulado % 11);

    return ultimoDigito == verif;
}

/**
 * A partir de un tipo entidad y un dni calcula el cuit
 * 
 * @param string,integer dni
 * @param string tipoEntidadParam  20, 30 por ejemplo
 * @return integer  NroCuit
 */
export function calculateCuitFromDni(dni, tipoEntidadParam)
{
    let documentArr = dni.toString().split('');// Array con lo numeros
    let tipoEntidadArr = tipoEntidadParam.split('');// Conver string en array Ej: '20' en [2,0]
    let digitos = tipoEntidadArr.concat(documentArr);

    let multiplicadores = [5,4,3,2,7,6,5,4,3,2];
    let suma = 0;
    digitos.forEach( (digito, key) => {
        suma += parseInt(digito) * multiplicadores[key];
    });

    let resto = suma % 11;
    let xyInicial = tipoEntidadParam;
    let verificador = '';

    if( 11-resto == 10 ){// Implica que el verificador es 10, y solo pueden tener 1 digito => se cambia el xy incial
        xyInicial = tipoEntidadParam == '30' ? 33 : 23;

        switch (tipoEntidadParam) {
            case '20':
            case '30':
                verificador = 9; break;
            case '27':
                verificador = 4; break;
            default:
                verificador = 11-resto; break;
        }

    }else if( 11-resto == 11){
        xyInicial = tipoEntidadParam;
        verificador =  0;
    }else{
        xyInicial = tipoEntidadParam;
        verificador =  11-resto;
    };

    return xyInicial+dni+verificador;
}