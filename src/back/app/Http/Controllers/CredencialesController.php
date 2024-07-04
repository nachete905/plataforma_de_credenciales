<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Credenciales;
use App\Models\Usuario;


class CredencialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $credenciales = Credenciales::all();
            return response()->json($credenciales, 202);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al obtener credenciales'], 500);
        }
    }



public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'platform' => 'required|max:255',
            'password' => 'required|min:6|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email', // Agregar validación para el email del usuario
        ]);

        // Buscar al usuario por email
        $usuario = Usuario::where('email', $validatedData['email'])->firstOrFail();

        // Crear la nueva credencial y asignar el id del usuario
        $credencial = new Credenciales();
        $credencial->platform = $validatedData['platform'];
        $credencial->password = $validatedData['password'];
        $credencial->username = $validatedData['username'];
        $credencial->usuario_id = $usuario->id; // Asignar el id del usuario

        $credencial->save();

        return response()->json($credencial, 201);
    } catch (\Illuminate\Database\QueryException $e) {
        return response()->json(['error' => 'Error al crear credencial'], 500);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $credencial = Credenciales::findOrFail($id);
            return response()->json($credencial);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'credencial no encontrado'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'platform' => 'sometimes|nullable|max:255',
                'password' => 'sometimes|nullable|min:6',
                'username' => 'sometimes|nullable|max:255',
            ];
            $validatedData = $request->validate($rules);
            $credencial = Credenciales::findOrFail($id);

            if (isset($validatedData['platform'])) {
                $credencial->platform = $validatedData['platform'];
            }

            if (isset($validatedData['password'])) {
                $credencial->password = $validatedData['password'];
            }
            if (isset($validatedData['username'])) {
                $credencial->username = $validatedData['username'];
            }

            $credencial->save();

            return response()->json($credencial, 200);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json(['error' => 'Error al actualizar credencial'], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $credencial = Credenciales::findOrFail($id);
            $credencial->delete();

            return response()->json(true, 204);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Error al borrar credencial'], 500);
        }
    }
}
