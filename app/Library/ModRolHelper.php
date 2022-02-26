<?php
namespace App\Library;

use App\Models\ModuloRol;

class ModRolHelper
{
    /**
     * 
     * @param int $modId
     * @param array [insert, delete, update] o boolean $admin
     * @param array [insert, delete, update] o boolean $supervisor
     * @param array [insert, delete, update] o boolean $solicitante
     * @param array [insert, delete, update] o boolean $consultas
     * @return boolean
     */
    public static function set($modId)
    {
        
        ModuloRol::create([
            'modulo_id' => $modId,
            'rol_id' => 1,
            'ms_insert' => true,
            'ms_delete' => true,
            'ms_update' => true
        ]);
        
        
        return true;
    }
}