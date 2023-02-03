<?php


/**
 * Recibe la url firmada de S3 (temporal), retorna el link completo incluyendo el dominio inicial. Se usa para Sección notices del home
 *
 */
if (! function_exists('urlS3Cdn')) {
    function urlS3Cdn($pathS3) {
        $bucketNombre       = config('filesystems.disks.s3.bucket');
        $bucketRegion       = config('filesystems.disks.s3.region');
        $bucketURL          = config('filesystems.disks.s3.url').'/';

        // $bucketURLConPath   = $bucketURL.'/reemplazame_por_path';

        return str_replace( 'https://'.$bucketNombre.'.s3.'.$bucketRegion.'.amazonaws.com/', $bucketURL , $pathS3 );

    }
}


/**
 * Determinar TIPO_APP en .env
 *
 */

/**
 * Los uso para blade @extra @intra
 */
if (! function_exists('appIsExtra')) {
    function appIsExtra()
    {
        return in_array( config('app.tipo'), ['EXTRA', 'FULL']) && url()->to('/') != config('app.url_intra');
    }
}

if (! function_exists('appIsIntra')) {
    function appIsIntra()
    {
        return in_array( config('app.tipo'), ['INTRA', 'FULL'] ) && url()->to('/') === config('app.url_intra');
    }
}

/**
 * En backend url()->to no existe
 * Los uso para definir rutas a cargar en RouteServiceProvider
 */
if (! function_exists('appIsIntraBackend')) {
    function appIsIntraBackend()
    {
        return in_array( config('app.tipo'), ['INTRA', 'FULL'] );
    }
}

if (! function_exists('appIsExtraBackend')) {
    function appIsExtraBackend()
    {
        return in_array( config('app.tipo'), ['EXTRA', 'FULL']);
    }
}

