<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use DB;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestos = Puesto::all();
        return view("puestos/index", [
            "puestos" => $puestos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = Puesto::all();
        return view(
            "puestos/create",
            [
                "puestos" => $puestos
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $puesto = new Puesto;
        $puesto->nombre = $request->input("nombre");
        $puesto->descripcion = $request->input("descripcion");
        $puesto->salario_min = $request->input("salario_min");
        $puesto->salario_max = $request->input("salario_max");
        $puesto->save();
        return redirect("puestos");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $puesto = Puesto::find($id);
        return view("puestos/show", [
            "puesto" => $puesto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $puesto = Puesto::find($id);
        return view("puestos/edit", [
            "puesto" => $puesto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $puesto = Puesto::find($id);
        $puesto->nombre = $request->input("nombre");
        $puesto->descripcion = $request->input("descripcion");
        $puesto->salario_min = $request->input("salario_min");
        $puesto->salario_max = $request->input("salario_max");
        $puesto->save();
        return redirect("puestos");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table("puestos")->where("id", "=", $id)->delete();
        return redirect("puestos");
    }
}
