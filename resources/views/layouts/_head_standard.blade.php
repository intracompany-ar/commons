@vite(config('commons.vite_files_style'))

<style media="screen">
    /* Para que funcione Geogtq, es la que usa fate.com.ar. En lugar de secure_url deberia usar asset, pero en producción no se por qué toma http */
    @font-face {
        font-family: 'Geogtq-Md';
        font-style: normal;
        font-weight: 400;
        src: local('Geogtq-Md'), local('Geogtq-Md'), url( {{ asset('storage/fonts/Geogtq-Md.otf') }} ) format('opentype');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;/*@*/
    }
</style>

<link rel="icon" type="image/x-icon" href="{{ asset('storage/img/img_icons/icono_grupo_32.ico') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/img/img_icons/icono_grupo_180.png') }}">

{{-- JAVASCRIPT --}}
<script defer src="{{ asset('vendor/fonts/fonts.js') }}"></script>
@vite(config('commons.vite_files_js'))
