<?php

namespace App\Controllers;

class EstudianteController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        $lang = $this->request->getGet('lang') ?? session()->get('lang') ?? 'es';
        session()->set('lang', $lang);

        return view('estudiantedb', ['lang' => $lang]);
    }
}