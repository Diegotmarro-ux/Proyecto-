<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'codusuario';
    protected $allowedFields = [
        'nombre', 
        'correo', 
        'password', 
        'imagenperfil', 
        'activo', 
        'administrador', 
        'token_reset'
        ];
} 