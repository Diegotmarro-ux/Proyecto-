<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class PerfilController extends BaseController
{
  
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find(session()->get('codusuario'));

        return view('perfil', [
            'usuario' => $usuario,
            'lang'    => session()->get('lang') ?? 'es'
        ]);
    }

 
    public function validarPassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('validar_password', ['lang' => session()->get('lang') ?? 'es']);
    }

    public function verificarPassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $usuario      = $usuarioModel->find(session()->get('codusuario'));
        $password     = $this->request->getPost('password');

        if (password_verify($password, $usuario['password']) || $password === $usuario['password']) {
            return redirect()->to('/perfil/editar');
        }

        $errorMsg = (session()->get('lang') === 'en') ? 'Incorrect password.' : 'Contraseña incorrecta.';
        return redirect()->to('/perfil/validar-password')->with('error', $errorMsg);
    }

  
    public function editar()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $usuario      = $usuarioModel->find(session()->get('codusuario'));

        return view('editar', [
            'usuario' => $usuario,
            'lang'    => session()->get('lang') ?? 'es'
        ]);
    }

    public function guardar()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $codusuario   = session()->get('codusuario');
        $nuevoNombre  = $this->request->getPost('nombre');
        $nuevoCorreo  = $this->request->getPost('correo');

        $usuarioModel->update($codusuario, [
            'nombre' => $nuevoNombre,
            'correo' => $nuevoCorreo
        ]);

        session()->set('nombre', $nuevoNombre);

        $msg = (session()->get('lang') === 'en') ? 'Profile updated successfully.' : 'Perfil actualizado correctamente.';
        return redirect()->to('/perfil')->with('mensaje', $msg);
    }


    public function cambiarPassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('cambiar_password', ['lang' => session()->get('lang') ?? 'es']);
    }

    public function guardarPassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel    = new UsuarioModel();
        $usuario         = $usuarioModel->find(session()->get('codusuario'));
        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');
        $repeatPassword  = $this->request->getPost('repeat_password');

        if (!password_verify($currentPassword, $usuario['password']) && $currentPassword !== $usuario['password']) {
            $error = (session()->get('lang') === 'en') ? 'Current password incorrect.' : 'Contraseña actual incorrecta.';
            return redirect()->to('/perfil/cambiar-password')->with('error', $error);
        }

        if ($newPassword !== $repeatPassword) {
            $error = (session()->get('lang') === 'en') ? 'New passwords do not match.' : 'Las nuevas contraseñas no coinciden.';
            return redirect()->to('/perfil/cambiar-password')->with('error', $error);
        }

        $usuarioModel->update(session()->get('codusuario'), [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        $msg = (session()->get('lang') === 'en') ? 'Password changed successfully.' : 'Contraseña cambiada exitosamente.';
        return redirect()->to('/perfil')->with('mensaje', $msg);
    }

  
    public function cambiarFoto()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('cambiar_foto', ['lang' => session()->get('lang') ?? 'es']);
    }

    public function guardarFoto()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $nombreFoto = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $nombreFoto);

            $usuarioModel = new UsuarioModel();
            $usuarioModel->update(session()->get('codusuario'), [
                'foto' => $nombreFoto
            ]);
        }

        $msg = (session()->get('lang') === 'en') ? 'Image updated successfully.' : 'Imagen actualizada correctamente.';
        return redirect()->to('/perfil')->with('mensaje', $msg);
    }

 
    public function eliminarFoto()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('eliminar_foto', ['lang' => session()->get('lang') ?? 'es']);
    }

    public function confirmarEliminarFoto()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $usuarioModel = new UsuarioModel();
        $usuarioModel->update(session()->get('codusuario'), [
            'foto' => null
        ]);

        $msg = (session()->get('lang') === 'en') ? 'Image deleted successfully.' : 'Imagen eliminada correctamente.';
        return redirect()->to('/perfil')->with('mensaje', $msg);
    }
} 