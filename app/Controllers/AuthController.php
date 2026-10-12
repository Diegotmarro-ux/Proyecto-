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

            if ((int)$usuario['verificado'] !== 1) {
        return redirect()->back()->with('Mensaje', 'Debes activar tu cuenta desde el correo antes de iniciar sesión.');
    }

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
          
            return redirect()->back()->with('Mensaie', 'Correo o contraseña incorrectos');
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
    $lang = session()->get('lang') ?? 'es';
    $rules = [
        'nombre'          => 'required|min_length[3]',
        'correo'          => 'required|valid_email|is_unique[usuarios.correo]',
        'password'        => 'required|min_length[5]',
        'repeat_password' => 'required|matches[password]'
    ];
   if ($lang === 'en') {
            $errors = [
                'nombre' => [
                    'required'   => 'Full name is required.',
                    'min_length' => 'Name must be at least 3 characters long.'
                ],
                'correo' => [
                    'required'    => 'Email address is required.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_unique'   => 'This email address is already registered.'
                ],
                'password' => [
                    'required'   => 'Password is required.',
                    'min_length' => 'Password must be at least 5 characters long.'
                ],
                'repeat_password' => [
                    'required' => 'You must confirm your password.',
                    'matches'  => 'Passwords do not match.'
                ]
            ];
        } else {
            $errors = [
                'nombre' => [
                    'required'   => 'El nombre completo es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.'
                ],
                'correo' => [
                    'required'    => 'El correo electrónico es obligatorio.',
                    'valid_email' => 'Debes ingresar un correo electrónico válido.',
                    'is_unique'   => 'Este correo electrónico ya se encuentra registrado.'
                ],
                'password' => [
                    'required'   => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 5 caracteres.'
                ],
                'repeat_password' => [
                    'required' => 'Debes confirmar la contraseña.',
                    'matches'  => 'Las contraseñas no coinciden.'
                ]
            ];
        } 

   if (!$this->validate($rules, $errors)) {
    return redirect()->to('/registro')->withInput()->with('errors', $this->validator->getErrors());
}
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
     
     public function recuperar()
{
    return view('fpass');
}

public function enviarRecuperacion()
{
    $lang   = session()->get('lang') ?? 'es';
    $correo = $this->request->getPost('correo');

    $usuarioModel = new UsuarioModel();
    $usuario      = $usuarioModel->where('correo', $correo)->first();

    if (!$usuario) {
        $errMsg = ($lang === 'en') ? 'Email address not found.' : 'El correo no se encuentra registrado.';
        return redirect()->back()->with('error', $errMsg);
    }

    $token = bin2hex(random_bytes(16));
    $usuarioModel->update($usuario['codusuario'], ['token_reset' => $token]);

    $email = \Config\Services::email();
    $email->setTo($correo);
    $link = base_url("restablecer/{$token}");

    if ($lang === 'en') {
        $email->setSubject('Password Reset - Tareas Escolares');
        $mensaje = "<h2>Password Reset Request</h2><p>Click the link below to reset your password:</p><a href='{$link}'>Reset Password</a>";
        $exitoMsg = 'We sent a password reset link to your email.';
    } else {
        $email->setSubject('Restablecer Contraseña - Tareas Escolares');
        $mensaje = "<h2>Solicitud de Restablecimiento</h2><p>Haz clic en el siguiente enlace para cambiar tu contraseña:</p><a href='{$link}'>Restablecer contraseña</a>";
        $exitoMsg = 'Hemos enviado un enlace de restablecimiento a tu correo.';
    }

    $email->setMessage($mensaje);
    $email->send();

    return redirect()->to('/login')->with('mensaje', $exitoMsg);
}
public function restablecer($token = null)
{
    $usuarioModel = new UsuarioModel();
    $usuario      = $usuarioModel->where('token_reset', $token)->first();

    if (!$usuario) {
        $lang   = session()->get('lang') ?? 'es';

        $errMsg = ($lang === 'en') ? 'Invalid or expired link.' : 'El enlace es inválido o ha expirado.';
        
        return redirect()->to('/login')->with('error', $errMsg);
    }

    return view('rpass', ['token' => $token]);
}

public function guardarNuevaPassword()
{
    $lang  = session()->get('lang') ?? 'es';
    $token = $this->request->getPost('token');

    $rules = [
        'password'        => 'required|min_length[5]',
        'repeat_password' => 'required|matches[password]'
    ];

    if ($lang === 'en') {
        $errors = [
            'password'        => ['required' => 'Password is required.', 'min_length' => 'Password must be at least 5 characters.'],
            'repeat_password' => ['required' => 'Please confirm your password.', 'matches' => 'Passwords do not match.']
        ];
    } else {
        $errors = [
            'password'        => ['required' => 'La contraseña es obligatoria.', 'min_length' => 'La contraseña debe tener al menos 5 caracteres.'],
            'repeat_password' => ['required' => 'Confirma tu contraseña.', 'matches' => 'Las contraseñas no coinciden.']
        ];
    }

    if (!$this->validate($rules, $errors)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $usuarioModel = new UsuarioModel();
    $usuario      = $usuarioModel->where('token_reset', $token)->first();

    if ($usuario) {
        $usuarioModel->update($usuario['codusuario'], [
            'password'    => $this->request->getPost('password'),
            'token_reset' => null
        ]);

        $successMsg = ($lang === 'en') ? 'Password updated successfully. You can now log in.' : 'Contraseña actualizada correctamente. Ya puedes ingresar.';
        return redirect()->to('/login')->with('mensaje', $successMsg);
    }

    return redirect()->to('/login')->with('error', 'Token inválido.');
}
}
