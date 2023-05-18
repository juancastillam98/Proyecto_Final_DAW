<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OfertaEmpleoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\SolicitudController;
use App\Models\Candidato;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("index");


Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('dashboard');
Route::get("/home", [OfertaEmpleoController::class, "index"])->middleware('auth')->name('dashboard');

// Route::get('/profile', function () {

//     return view('profile.index');
// })->name("profile");
Route::get("/profile", [ProfileController::class, "index"])->name("profile");

Route::middleware('auth')->group(function () {
    Route::get('/profile/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/settings', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Empresas
Route::resource("ofertas_empleo", OfertaEmpleoController::class);
Route::get("ofertas_empleo/create/{id}", [OfertaEmpleoController::class, "create"])->name("ofertas_empleo.create");
Route::get('/ofertas_empleo/{oferta_id}/{empresa_id}/{puesto_id}/users_information', [OfertaEmpleoController::class, 'list_users_information'])->name('ofertas_empleo.list_users_information');
Route::get('/ofertas_empleo/{ofertas_empleo}/show/{empresa_id}', [OfertaEmpleoController::class, 'show'])->name('ofertas_empleo.show');
// Route::get("ofertasEmpleo", [OfertaEmpleoController::class, "mostrar_ofertas"])->name('ofertasEmpleo');
//Route::get('/welcome', [OfertaEmpleoController::class, 'index']);
Route::resource("empresas", EmpresaController::class);
Route::resource("candidatos", CandidatoController::class);
Route::put('/candidatos/{candidato}/update_photo', [CandidatoController::class, 'update_photo'])->name('candidatos.update_photo');
Route::resource("puestos", PuestoController::class);
Route::resource("solicitudes", SolicitudController::class);
