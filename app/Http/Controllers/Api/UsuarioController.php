<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new Usuario();
        $usuario->nombre=$request->nombre;
        $usuario->apellido=$request->apellido;
        $usuario->tipo_id=$request->tipo_id;
        $usuario->num_id=$request->num_id;
        $usuario->fecha_nac=$request->fecha_nac;
        $usuario->contrasena=$request->contrasena;

        $usuario->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario= Usuario::findOrFail($request->$id);
        $usuario->nombre=$request->nombre;
        $usuario->apellido=$request->apellido;
        $usuario->tipo_id=$request->tipo_id;
        $usuario->num_id=$request->num_id;
        $usuario->fecha_nac=$request->fecha_nac;
        $usuario->contrasena=$request->contrasena;

        $usuario->save();
        return $usuario;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::destroy($id);
        return $usuario;
    }
}
