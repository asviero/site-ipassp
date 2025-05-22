<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        // Compartilha a variável $menu com todas as views deste controller
        view()->share('menu', 'usuarios');
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('admin.usuarios.index', compact('users'));
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', ['user' => $usuario]);
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->only('name', 'email');
        $data['updated_by'] = auth()->id(); // Adiciona o ID do usuário que atualizou

        $usuario->update($data);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário removido.');
    }
}
