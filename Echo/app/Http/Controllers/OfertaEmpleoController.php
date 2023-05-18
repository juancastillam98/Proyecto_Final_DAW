<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\OfertaEmpleo;
use App\Models\Puesto;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class OfertaEmpleoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todas las ofertas de empleo se listarán en la home
        $ofertas_empleo = OfertaEmpleo::all();
        return view(
            "home",
            ["ofertas_empleo" => $ofertas_empleo]
        );
    }

    public function mostrar_ofertas()
    {
        $ofertas_empleo = OfertaEmpleo::all();
        //$usuarios = User::findOrFail(Auth::id());

        //return view("profile.index")->with("ofertas",  $ofertas_empleo);
        //return view("profile.index")->with("ofertas",  $ofertas_empleo)->with("usuario", $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     * $id es el id de la empresa que ha creado la oferta
     */
    public function create(string $id)
    {
        $puestos = Puesto::all();
        $empresa = Empresa::find($id);
        return view(
            "ofertas_empleo/create",
            [
                "empresa" => $empresa,
                "puestos" => $puestos
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $oferta = new OfertaEmpleo;

        $puesto_id = Puesto::select("id")->where("nombre", $request->input("puesto_id"))->first();
        $oferta->puesto_id = $puesto_id->id;
        $oferta->empresa_id = $request->input("empresa_id");
        $oferta->numpuestos = $request->input("numpuestos");
        $oferta->fecha_publicacion = $request->input("fecha_publicacion");
        $oferta->fecha_cierre = $request->input("fecha_cierre");
        $oferta->descripcion = $request->input("descripcion");
        $oferta->requisitos = $request->input("requisitos");
        $oferta->salario = $request->input("salario");
        $oferta->tipo_salario = $request->input("tipo_salario");
        $oferta->save();
        return redirect("profile");
    }

    /**
     * Display the amount of solicituds for a specific puesto
     */
    public function show($id_puesto, $id_empresa)
    {
        $puesto_id = Puesto::find($id_puesto);
        $empresa_id = Empresa::find($id_empresa);

        $oferta_solicitudes = DB::table('oferta_empleos')
            ->select('oferta_empleos.id AS id_oferta', 'oferta_empleos.descripcion AS oferta', 'puestos.nombre AS puesto', DB::raw('COUNT(solicituds.id) AS total_solicitudes'))
            ->leftJoin('solicituds', 'oferta_empleos.id', '=', 'solicituds.oferta_id')
            ->join('puestos', 'oferta_empleos.puesto_id', '=', 'puestos.id')
            ->where('oferta_empleos.empresa_id', $empresa_id->id)
            ->where('oferta_empleos.puesto_id', $puesto_id->id)
            ->groupBy('oferta_empleos.id', 'oferta_empleos.descripcion', 'puestos.nombre')
            ->get();

        return view("ofertas_empleo/show", [
            "oferta_solicitudes" => $oferta_solicitudes,
            "empresa_id" => $empresa_id,
            "puesto_id" =>  $puesto_id
        ]);
    }
    /**
     * Display a list of a specific job offer posted by a specific company for a specific job position, 
     * the name of the candidates along with their corresponding user emails who have applied for that offer
     */
    public function list_users_information($oferta_id, $empresa_id, $puesto_id)
    {
        /*
        $oferta_empleo_id = OfertaEmpleo::find($id_oferta_empleo);
        $empresa_id = OfertaEmpleo::find($id_empresa);
        $puesto_id = OfertaEmpleo::find($id_puesto);
*/
        $oferta_empleo = OfertaEmpleo::where('id', $oferta_id)->firstOrFail();
        $empresa = Empresa::where('id', $empresa_id)->firstOrFail();
        $puesto = Puesto::where('id', $puesto_id)->firstOrFail();

        $oferta_solicitudes = DB::table('oferta_empleos')
            ->select('users.email', 'candidatos.nombre')
            ->join('solicituds', 'oferta_empleos.id', '=', 'solicituds.oferta_id')
            ->join('candidatos', 'solicituds.candidato_id', '=', 'candidatos.id')
            ->join('users', 'candidatos.user_id', '=', 'users.id')
            ->where('oferta_empleos.id', $oferta_empleo->id)
            ->where('oferta_empleos.empresa_id', $empresa->id)
            ->where('oferta_empleos.puesto_id', $puesto->id)
            ->get();

        return view("ofertas_empleo/solicitudes", [
            "oferta_solicitudes" => $oferta_solicitudes
        ]);
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
