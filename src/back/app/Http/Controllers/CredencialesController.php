<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Credenciales;
class CredencialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credenciales = Credenciales::all();
        return response()->json($credenciales);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'plataform' => 'required|max:255',
            'password' => 'required|max:255',
            'username' => 'required|max:255',
        ]);

        $credencial = new Credenciales($validatedData);
        $credencial->save();

        return response()->json($credencial, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $credencial = Credenciales::findOrFail($id);
        return response()->json($credencial);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'platform' => 'sometimes|nullable|max:255',
            'password' => 'sometimes|nullable|min:6',
            'username' => 'sometimes|nullable|max:255',
        ];
        $validatedData = $request->validate($rules);
        $credencial = Credenciales::findOrFail($id);

        if(isset($validatedData['platform'])){
            $credencial->platform = $validatedData['platform'];
        }

        if(isset($validatedData['password'])){
            $credencial->password = $validatedData['password'];
        }
        if(isset($validatedData['username'])){
            $credencial->username = $validatedData['username'];
        }

        $credencial->save();

        return response()->json($credencial, 200);
    }

  
    public function destroy(string $id)
    {
        $credencial = Credenciales::findOrFail($id);
        $credencial->delete();

        return response()->json(null, 204);
    }
}
