<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function welcome()
    {
        $lang = $this->request->getGet('lang') ?? session()->get('lang') ?? 'es';
        session()->set('lang', $lang);

        $data['lang'] = $lang;
        return view('w', $data);
    }
    public function login() 
    {
            return view('login');
    }

    public function autenticar ()
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


    public function registro()
    {
        return view('sign');
    }

    public function registrar()
    {
        $nombre = $this->request->getPost('nombre');
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert([
            'nombre'        => $nombre,
            'correo'        => $correo,
            'password'      => $password,
            'administrador' => 0 
        ]);

        return redirect()->to('/login');
    } 
     
public function registrar()
  { 

    {
        $nombre   = $this->request->getPost('nombre');
        $correo   = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

    
        $token = bin2hex(random_bytes(16));

        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert([
            'nombre'             => $nombre,
            'correo'             => $correo,
            'password'           => $password,
            'administrador'      => 0,
            'token_verificacion' => $token,
            'verificado'         => 0
        ]);

        
        $email = \Config\Services::email();
        $email->setTo($correo);
        $email->setSubject('Verifica tu cuenta - Tareas Escolares');
        
        $link = base_url("verificar/{$token}");
        $mensaje = "<h2>¡Hola {$nombre}!</h2><p>Haz clic en el siguiente enlace para activar tu cuenta:</p><a href='{$link}'>Verificar mi cuenta</a>";
        
        $email->setMessage($mensaje);
        $email->send();

        return redirect()->to('/login')->with('error', 'Registro exitoso. Te hemos enviado un correo para activar tu cuenta.');
    }


    public function verificar($token = null)
    {
        

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('token_verificacion', $token)->first();

        if ($usuario) {
            $usuarioModel->update($usuario['codusuario'], [
                'verificado'         => 1,
                'token_verificacion' => null
            ]);
            return redirect()->to('/login')->with('error', '¡Cuenta verificada exitosamente! Ya puedes ingresar.');
        }

        return redirect()->to('/login')->with('error', 'El enlace de verificación es inválido o ya fue utilizado.');
    }
     }

 