<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
            'encriptionword' => 'required|string|min:6',
        ]);

        $usuario = new Usuario();
        $usuario->email = $validatedData['email'];
        $usuario->password = bcrypt($validatedData['password']);
        $usuario->encriptionword = $validatedData['encriptionword'];
        $usuario->save();

        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json($usuario);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define las reglas de validación, pero no exijas campos a menos que estén presentes
        $rules = [
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
            'encriptionWord' => 'sometimes|required|max:255',
        ];

        $validatedData = $request->validate($rules);

        $usuario = Usuario::findOrFail($id);

        if (isset($validatedData['email'])) {
            $usuario->email = $validatedData['email'];
        }
        if (isset($validatedData['encriptionWord'])) {
            $usuario->encriptionWord = $validatedData['encriptionWord'];
        }
        if (isset($validatedData['password'])) {
            $usuario->password = bcrypt($validatedData['password']);
        }

        $usuario->save();
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
}
