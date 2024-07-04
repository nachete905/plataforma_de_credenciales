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
        try {
            $usuarios = Usuario::all();
            return response()->json($usuarios, 202);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al obtener usuarios'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255|unique:usuarios',
                'password' => 'required|string|min:6',
                'encriptionword' => 'required|string|min:6',
            ]);

            $usuario = new Usuario();
            $usuario->email = $validatedData['email'];
            $usuario->password = bcrypt($validatedData['password']);
            $usuario->encriptionword = $validatedData['encriptionword'];
            $usuario->save();

            return response()->json($usuario, 201);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al crear usuario'], 500);
        }
    }



    public function show($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json($usuario,202);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    public function buscarEmail($email){
        try {
            $usuario = Usuario::where('email', $email)->firstOrFail();

            return response()->json(['id' => $usuario->id], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
                'password' => 'sometimes|nullable|required|min:6',
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
            return response()->json($usuario, 210);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al actualizar usuario'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();

            return response()->json(null, 204);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al borrar usuario'], 500);
        }
    }
}
