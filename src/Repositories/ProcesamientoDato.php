<?php

namespace IntraCompany\Commons\Repositories;

class ProcesamientoDato
{

    /**
     * Quita espacios de la cadena
     *
     */
    static public function quitarEspacios($string)
    {
        return preg_replace('/\s+/', '', $string);
    }

    /**
     * Reemplaza los espacio de la string
     *
     */
    static public function reemplazarEspaciosPorSignoMas($string)
    {
        return preg_replace('/\s+/', '+', $string);
    }

    static public function extraerUltimos4CharNombreFile($fileSubido)
    {
        $nombre_file_subido = $fileSubido->getClientOriginalName();
        return substr( $nombre_file_subido, 0, -4);
    }




}
