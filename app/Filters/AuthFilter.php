<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface; 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no ha iniciado sesión, redirigir al login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('Mensaie', 'Debes iniciar sesión primero.');
        }

        // Si la ruta requiere rol de administrador/maestra
        if ($arguments && in_array('admin', $arguments)) {
            if ((int)session()->get('administrador') !== 1) {
                return redirect()->to('/estudiante')->with('Mensaie', 'Acceso denegado. Área para maestras.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se requiere acción posterior
    }
}