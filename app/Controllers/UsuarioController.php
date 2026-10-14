<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $lang = session()->get('lang') ?? 'es';

        $data = [
            'usuarios' => $usuarioModel->orderBy('codusuario', 'DESC')->paginate(5),
            'pager'    => $usuarioModel->pager,
            'lang'     => $lang
        ];

        return view('usuarios/index', $data);
    }

    public function nuevo()
    {
        $lang = session()->get('lang') ?? 'es';
        return view('usuarios/nuevo', ['lang' => $lang]);
    }

    public function guardar()
    {
        $lang  = session()->get('lang') ?? 'es';

        $rules = [
            'nombre'          => 'required|min_length[3]',
            'correo'          => 'required|valid_email|is_unique[usuarios.correo]',
            'password'        => 'required|min_length[5]',
            'repeat_password' => 'required|matches[password]'
        ];

        $errors = ($lang === 'en') ? [
            'nombre'          => ['required' => 'Name is required.', 'min_length' => 'Name must be at least 3 characters.'],
            'correo'          => ['required' => 'Email is required.', 'valid_email' => 'Invalid email address.', 'is_unique' => 'Email already exists.'],
            'password'        => ['required' => 'Password is required.', 'min_length' => 'Password must be at least 5 characters.'],
            'repeat_password' => ['required' => 'Confirm password is required.', 'matches' => 'Passwords do not match.']
        ] : [
            'nombre'          => ['required' => 'El nombre es obligatorio.', 'min_length' => 'El nombre debe tener al menos 3 caracteres.'],
            'correo'          => ['required' => 'El correo es obligatorio.', 'valid_email' => 'Correo no válido.', 'is_unique' => 'El correo ya está registrado.'],
            'password'        => ['required' => 'La contraseña es obligatoria.', 'min_length' => 'La contraseña debe tener al menos 5 caracteres.'],
            'repeat_password' => ['required' => 'Confirma la contraseña.', 'matches' => 'Las contraseñas no coinciden.']
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert([
            'nombre'        => $this->request->getPost('nombre'),
            'correo'        => $this->request->getPost('correo'),
            'password'      => $this->request->getPost('password'),
            'administrador' => 0,
            'verificado'    => 1
        ]);

        $msg = ($lang === 'en') ? 'User created successfully.' : 'Usuario creado exitosamente.';
        return redirect()->to('/usuarios')->with('mensaje', $msg);
    }

public function ver($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios');
        }

        $lang = session()->get('lang') ?? 'es';
        return view('usuarios/ver', ['usuario' => $usuario, 'lang' => $lang]);
    }

    public function editar($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios');
        }

        $lang = session()->get('lang') ?? 'es';
        return view('usuarios/editar', ['usuario' => $usuario, 'lang' => $lang]);
    }

    public function actualizar($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios');
        }

        $lang  = session()->get('lang') ?? 'es';

        $rules = [
            'nombre' => 'required|min_length[3]',
            'correo' => "required|valid_email|is_unique[usuarios.correo,codusuario,{$id}]"
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password']        = 'min_length[5]';
            $rules['repeat_password'] = 'matches[password]';
        }

       $errors = ($lang === 'en') ? [
            'nombre'          => ['required' => 'Name is required.', 'min_length' => 'Name must be at least 3 characters.'],
            'correo'          => ['required' => 'Email is required.', 'valid_email' => 'Invalid email address.', 'is_unique' => 'Email already exists.'],
            'password'        => ['required' => 'Password is required.', 'min_length' => 'Password must be at least 5 characters.'],
            'repeat_password' => ['required' => 'Confirm password is required.', 'matches' => 'Passwords do not match.']
        ] : [
            'nombre'          => ['required' => 'El nombre es obligatorio.', 'min_length' => 'El nombre debe tener al menos 3 caracteres.'],
            'correo'          => ['required' => 'El correo es obligatorio.', 'valid_email' => 'Correo no válido.', 'is_unique' => 'El correo ya está registrado.'],
            'password'        => ['required' => 'La contraseña es obligatoria.', 'min_length' => 'La contraseña debe tener al menos 5 caracteres.'],
            'repeat_password' => ['required' => 'Confirma la contraseña.', 'matches' => 'Las contraseñas no coinciden.']

            ];

        if (!$this->validate($rules,$errors )) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataActualizar = [ 
            'nombre'        => $this->request->getPost('nombre'),
            'correo'        => $this->request->getPost('correo'),
            'verificado'    => $this->request->getPost('active') ? 1 : 0,
            'administrador' => $this->request->getPost('administrator') ? 1 : 0
        ];

        if (!empty($password)) { 
            $dataActualizar['password'] = $password;
        }

        $usuarioModel->update($id, $dataActualizar);

        $msg = ($lang === 'en') ? 'User updated successfully.' : 'Usuario actualizado exitosamente.';
        return redirect()->to('/usuarios/ver/' . $id)->with('mensaje', $msg);
    }

    public function eliminar($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->delete($id);

        $lang = session()->get('lang') ?? 'es';
        
        $msg  = ($lang === 'en') ? 'User deleted successfully.' : 'Usuario eliminado exitosamente.';

        return redirect()->to('/usuarios')->with('mensaje', $msg);
         
        }
          }