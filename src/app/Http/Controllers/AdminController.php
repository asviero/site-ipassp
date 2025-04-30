<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Certifique-se de ter uma view 'admin.dashboard'
    }
}
