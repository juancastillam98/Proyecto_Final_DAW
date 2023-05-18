<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $candidato = new Candidato();
        $candidato->user_id = $request->input("user_id");
        $candidato->nombre = $request->input("nombre");
        $candidato->primer_apellido = $request->input("primer_apellido");
        $candidato->segundo_apellido = $request->input("segundo_apellido");
        $candidato->direccion = $request->input("direccion");
        $candidato->telefono = $request->input("telefono");
        $candidato->experiencia_laboral = $request->input("experiencia_laboral");
        $candidato->habilidades = $request->input("habilidades");

        if ($request->hasFile('foto')) {
            /*
            //$nombrefoto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $foto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $candidato->foto = $foto_path;
            $foto_path = $foto->storeAs('public/img_users', $foto);
*/

            $nombrefoto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $candidato->foto = $nombrefoto;
            $request->file('foto')->storeAs('public/img_users', $nombrefoto);
        }
        //$candidato->foto = $request->input("foto");

        $candidato->save();
        return redirect("profile");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function update_photo(Request $request, $id)
    {
        $candidato = Candidato::find($id);
        if ($request->hasFile('foto')) {
            $nombrefoto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $candidato->foto = $nombrefoto;
            $request->file('foto')->storeAs('public/img_users', $nombrefoto);
        }
        $candidato->save();
        return redirect("profile");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
