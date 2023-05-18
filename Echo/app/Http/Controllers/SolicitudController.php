<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Ignition\Contracts\Solution;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view(
            "solicitudes/index",
            [
                "solicitudes" => $solicitudes
            ]
        );
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
        $solicitud = new Solicitud();
        $solicitud->oferta_id = $request->input("oferta_id");
        $solicitud->candidato_id = Auth::user()->candidato->id;
        $solicitud->estado = "enviada";
        $solicitud->save();
        return redirect("home");
    }

    /**
     * Display information of the request to which the user has registered into
     */
    public function show(string $id)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
