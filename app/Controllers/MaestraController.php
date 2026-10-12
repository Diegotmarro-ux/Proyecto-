<?php

namespace App\Controllers;
 
class MaestraController extends BaseController
{
    public function index()
    {
        $lang = $this->request->getGet('lang') ?? session()->get('lang') ?? 'es';
        session()->set('lang', $lang);

        return view('maestradb', ['lang' => $lang]);
    }
} 