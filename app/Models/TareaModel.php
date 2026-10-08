<?php

namespace App\Models;

use CodeIgniter\Model;

class TareaModel extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'codtarea';
    protected $allowedFields = ['descripcion', 'codusuario'];
} 