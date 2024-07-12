<?php


/**
 * Recibe la url firmada de S3 (temporal), retorna el link completo incluyendo el dominio inicial. Se usa para Sección notices del home
 *
 */
if (! function_exists('urlS3Cdn')) {
    function urlS3Cdn($pathS3) {
        $bucketname       = config('filesystems.disks.s3.bucket');
        $bucketRegion       = config('filesystems.disks.s3.region');
        $bucketURL          = config('filesystems.disks.s3.url').'/';

        // $bucketURLConPath   = $bucketURL.'/reemplazame_por_path';

        return str_replace( 'https://'.$bucketname.'.s3.'.$bucketRegion.'.amazonaws.com/', $bucketURL , $pathS3 );

    }
}