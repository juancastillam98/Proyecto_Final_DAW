<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use DB;

class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view(
            "empresas/index",
            [
                "empresas" => $empresas
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("empresas/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->user_id = $request->input("user_id");
        $empresa->nombre = $request->input("nombre");
        $empresa->telefono = $request->input("telefono");
        /* $empresa->email = $request->input("email"); */
        $empresa->cif = $request->input("cif");
        $empresa->web = $request->input("web");
        $empresa->direccion = $request->input("direccion");
        $empresa->empleados = $request->input("empleados");
        $empresa->descripcion = $request->input("descripcion");
        $empresa->save(); //el save es como el insert en la bd

        return redirect("empresas");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view("empresas/show", [
            "empresa" => $empresa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view("empresas/edit", [
            "empresa" => $empresa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->nombre = $request->input("nombre");
        $empresa->telefono = $request->input("telefono");
        $empresa->email = $request->input("email");
        $empresa->direccion = $request->input("direccion");
        $empresa->save();
        return redirect("empresas");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table("empresas")->where("id", "=", $id)->delete();
        return redirect("empresas");
    }
}
