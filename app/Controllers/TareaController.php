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
}