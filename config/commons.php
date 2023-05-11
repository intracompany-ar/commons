<?php

return [

    /**
     * Cuando se mira en movil es el color que toma Chrome para el encabezado
     */
    'theme-color' => '#d72f23',

    /**
     * Meta tag. SEO
     */
    'description' => 'IceO, estionar tu empresa va a ser un juego de niños. ERP a tu medida.',
    // Neuper, distribuidor oficial de neumáticos Fate en la zona sur de Provincia de Santa Fe, sur de Córdoba, norte de Buenos Aires y La Pampa. En sus sucursales se brinda servicios de gomeria, alineación, balanceo, tren delantero, frenos.

    /**
     * Meta tag. SEO
     */
    'key-words'   => 'neumáticos, rueda, goma, automóvil, auto, camioneta, transporte, camión, acoplado, chasis, colectivo, agrícola, cosechadora, tractor, seguridad, alineación, balanceo, reconstrucción, vial, ruta, tracción , maquinaria, banda de rodamiento, motoniveladoras , palas cargadoras, suv, infladotires, providers, refate',

    /**
     * Aparece continuamente luego del title
     */
    'subtitle-fix' => 'IceO Software',

    /**
     * 
     */
    'title' => 'App',

    /**
     * Deshabilita la indexación de bots
     */
    'noindex' => true,

    /**
     * El de arriba a la izquierda
     * * Relativo a public
     */
    'logo_path' => 'storage/img/img_icons/icono_grupo_72.png',

    'footer_position_fixed' => true,

    'chat' => true,

    'og_image_path' => 'https://www.fate.com.ar/assets/img/pininfarinasport.jpg',

    'url' => config('app.url') ?? 'https://neuper.com.ar',

    'vite_files_style' => ['resources/sass/app.scss', 'resources/css/app.css', 'resources/css/vendor.css'],

    'vite_files_js' => ['resources/js/app.js'],

    'routes' => ['layout', 'menu-home-intra', 'notifications', 'modal-help'],

    'pwa' => true,

    'audios' => true

];

