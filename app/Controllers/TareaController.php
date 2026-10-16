<?php

namespace App\Controllers;

use App\Models\TareaModel; 

class TareaController extends BaseController
{
    
    public function index()  
    {
        $tareaModel = new TareaModel();
        $lang       = session()->get('lang') ?? 'es';

        $search = $this->request->getGet('search');
        $order  = $this->request->getGet('order') ?? 'DESC'; // DESC = Newer, ASC = Older

        if (!empty($search)) {
            $tareaModel->like('titulo', $search);
        }

        $data = [
            'tareas' => $tareaModel->orderBy('created_at', $order)->paginate(5),
            'pager'  => $tareaModel->pager,
            'search' => $search,
            'order'  => $order,
            'lang'   => $lang 
        ];

        return view('tareas/index', $data); 
    }

public function nueva()
    {

     if (session()->get('administrador') !== '1') {
            return redirect()->to('/tareas')->with('error', 'Acceso restringido a administradores.');
        }

        $lang = session()->get('lang') ?? 'es';
        return view('tareas/tnueva', ['lang' => $lang]);
    }

    public function crear()
    {
        if (session()->get('administrador') !== '1') {
            return redirect()->to('/tareas')->with('error', 'Acceso restringido a administradores.');
        }
        $lang  = session()->get('lang') ?? 'es';
        $rules = [
            'descripcion' => 'required|min_length[3]'
        ];

        $errors = ($lang === 'en') ? [
            'descripcion' => [
                'required'   => 'Description is required.',
                'min_length' => 'Description must be at least 3 characters.'
            ]
        ] : [
            'descripcion' => [
                'required'   => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 3 caracteres.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tareaModel = new \App\Models\TareaModel();
        $descripcion = $this->request->getPost('descripcion');

        $tareaModel->insert([
            'titulo'      => $descripcion,
            'descripcion' => $descripcion,
            'codusuario'  => session()->get('codusuario') ?? session()->get('idusuario') ?? 1,
        ]);

        $msg = ($lang === 'en') ? 'Task created successfully.' : 'Tarea creada exitosamente.';
        return redirect()->to('/tareas')->with('mensaje', $msg);
    }
     
    public function editar($id = null)
    {
        if (session()->get('administrador') != 1) {
            return redirect()->to('/tareas')->with('error', 'Acceso restringido a administradores.');
        }

        $tareaModel = new TareaModel();
        $tarea      = $tareaModel->find($id);

        if (!$tarea) {
            return redirect()->to('/tareas')->with('error', 'La tarea no existe.');
        }

        $lang = session()->get('lang') ?? 'es';

        return view('tareas/teditar', [
            'tarea' => $tarea,
            'lang'  => $lang
        ]);
    }

    public function actualizar($id = null)
    {
        if (session()->get('administrador') != 1) {
            return redirect()->to('/tareas')->with('error', 'Acceso restringido a administradores.');
        }

        $lang  = session()->get('lang') ?? 'es';
        $rules = [
            'descripcion' => 'required|min_length[3]'
        ];

        $errors = ($lang === 'en') ? [
            'descripcion' => [
                'required'   => 'Description is required.',
                'min_length' => 'Description must be at least 3 characters.'
            ]
        ] : [
            'descripcion' => [
                'required'   => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 3 caracteres.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tareaModel  = new TareaModel();
        $descripcion = $this->request->getPost('descripcion');

        $tareaModel->update($id, [
            'titulo'      => $descripcion,
            'descripcion' => $descripcion
        ]);

        $msg = ($lang === 'en') ? 'Task updated successfully.' : 'Tarea actualizada exitosamente.';
        return redirect()->to('/tareas')->with('mensaje', $msg);
    }
       public function ver($id = null)
    {
        $tareaModel = new TareaModel();
        $tarea      = $tareaModel->find($id);

        if (!$tarea) {
            return redirect()->to('/tareas')->with('error', 'La tarea no existe.');
        }

        $lang = session()->get('lang') ?? 'es';

        return view('tareas/tver', [
            'tarea' => $tarea,
            'lang'  => $lang
        ]);
    }
      public function eliminar($id = null)
    {
       
        if (session()->get('administrador') != 1) {
            return redirect()->to('/tareas')->with('error', 'Acceso restringido a administradores.');
        }

        $tareaModel = new TareaModel();
        
        if ($tareaModel->find($id)) {
            $tareaModel->delete($id);
            $lang = session()->get('lang') ?? 'es';
            $msg  = ($lang === 'en') ? 'Task deleted successfully.' : 'Tarea eliminada exitosamente.';
            return redirect()->to('/tareas')->with('mensaje', $msg);
        }

        return redirect()->to('/tareas')->with('error', 'La tarea no existe.');
    }
     
    }
