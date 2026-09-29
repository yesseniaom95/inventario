<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // listar usuarios
    }

    public function show(User $user)
    {
        // mostrar usuario
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // actualizar usuario
    }

    public function destroy(User $user)
    {
        // eliminar usuario
    }
}
