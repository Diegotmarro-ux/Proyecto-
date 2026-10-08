<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function login()
    {
        
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

      
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('correo', $correo)->first();

       
        if ($usuario && $usuario['password'] === $password) {
            
           
            session()->set([
                'codusuario' => $usuario['codusuario'],
                'nombre' => $usuario['nombre'],
                'administrador' => $usuario['administrador'],
                'logged_in' => true
            ]);

            
            if ($usuario['administrador'] == 1) {
                return redirect()->to('/maestra');
            } else {
                return redirect()->to('/estudiante');
            }

        } else { 
          
            return redirect()->back()->with('error', 'Correo o contraseña incorrectos');
        }
    }

    public function logout()
    {
        
        session()->destroy();
        return redirect()->to('/login');
    }
}