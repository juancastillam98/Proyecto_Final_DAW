<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Candidato;
use App\Models\Empresa;
use App\Models\OfertaEmpleo;
use App\Models\Puesto;
use App\Models\Solicitud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class ProfileController extends Controller
{
    public function index()
    {
        $esCandidato = false;
        $tieneEmpresa = false;
        $ofertas_empleo = OfertaEmpleo::all();
        $empresa_info = Empresa::find(1);
        $puestos = Puesto::all();

        $solicitudes = Solicitud::all();

        //si el usuario está dado de alta como candidato
        if (Auth::user()->candidato != null) {
            $esCandidato = true;
            $candidatoActual = Auth::user()->candidato->id;
            $candidato_info = Candidato::find(Auth::user()->candidato->id);

            //Listado de las solicitudes del candidato
            $solicitudes_empresas = Empresa::select(['empresas.nombre', 'puestos.nombre as puestos', 'solicituds.created_at'])
                ->join('oferta_empleos', 'empresas.id', '=', 'oferta_empleos.empresa_id')
                ->join('puestos', 'oferta_empleos.puesto_id', '=', 'puestos.id')
                ->join('solicituds', 'oferta_empleos.id', '=', 'solicituds.oferta_id')
                ->join('candidatos', 'solicituds.candidato_id', '=', 'candidatos.id')
                ->where('candidatos.id', '=', $candidatoActual)
                ->groupBy('empresas.nombre', 'puestos.nombre', 'solicituds.created_at')
                ->get();
        }
        //si el usuario tiene empresa
        if (Auth::user()->empresa != null) {
            $tieneEmpresa = true;
            $empresaUsuario = Auth::user()->empresa->id;

            $puestos = Puesto::select(['puestos.id', 'puestos.nombre', DB::raw('count(oferta_empleos.id) as total_ofertas')])
                ->join("oferta_empleos", "puestos.id", "=", "oferta_empleos.puesto_id")
                ->join("empresas", "oferta_empleos.empresa_id", "=", "empresas.id")
                ->where("empresas.id", "=", $empresaUsuario)
                ->groupBy("puestos.nombre", "puestos.id")
                ->get();
        }

        //un usuario, puede estar simplemente dado de alta como candidato
        if ($esCandidato && $tieneEmpresa) {
            return view(
                "profile.index",
                [
                    "esCandidato" => $esCandidato,
                    "tieneEmpresa" => $tieneEmpresa,
                    "ofertas_empleo" => $ofertas_empleo,
                    "empresas" => $solicitudes_empresas,
                    "empresa_info" => $empresa_info,
                    "puestos" => $puestos,
                    "solicitudes" => $solicitudes,
                    "candidato_info" => $candidato_info
                ]
            );
        } else if ($esCandidato) {
            return view(
                "profile.index",
                [
                    "esCandidato" => $esCandidato,
                    "tieneEmpresa" => $tieneEmpresa,
                    "ofertas_empleo" => $ofertas_empleo,
                    "empresas" => $solicitudes_empresas,
                    "empresa_info" => $empresa_info,
                    "solicitudes" => $solicitudes,
                    "candidato_info" => $candidato_info,
                ]
            );
        } else if ($tieneEmpresa) {
            return view(
                "profile.index",
                [
                    "esCandidato" => $esCandidato,
                    "tieneEmpresa" => $tieneEmpresa,
                    "ofertas_empleo" => $ofertas_empleo,
                    "puestos" => $puestos,
                    "empresa_info" => $empresa_info,
                    "solicitudes" => $solicitudes
                ]
            );
        } else {
            return view(
                "profile.index",
                [
                    "esCandidato" => $esCandidato,
                    "tieneEmpresa" => $tieneEmpresa,
                    "ofertas_empleo" => $ofertas_empleo,
                    "solicitudes" => $solicitudes
                ]
            );
        }
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
