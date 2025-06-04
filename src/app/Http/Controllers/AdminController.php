<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        // Compartilha a variável $menu com todas as views deste controller
        view()->share('menu', 'home');
    }

    public function index()
    {
        return view('admin.dashboard2'); // Certifique-se de ter uma view 'admin.dashboard'
    }
}
