<?php

use App\Http\Controllers\CategoriaMaterial\CategoriaMaterialController;
use App\Http\Controllers\EstadoMaterial\EstadoMaterialController;
use App\Http\Controllers\Evento\EventController;
use App\Http\Controllers\Material\TipoMaterialController;
use App\Http\Controllers\MaterialBibliografico\MaterialBibliograficoController;
use App\Http\Controllers\Sala\SalaController;
use App\Http\Controllers\TipoEvento\tipoEventoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/alerta-codigo', function () {
    return view('alerta-codigo');
})->name('alerta.codigo');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
/* ----------------TIPO DE MATERIALES -------------- */
Route::get('/creartipomaterial', [TipoMaterialController::class, 'create'])->name('CrearTipoMaterial');
Route::post('/creartipomaterial', [TipoMaterialController::class, 'store'])->name('GuardarTipoMaterial');
Route::get('/tiposmateriales', [TipoMaterialController::class, 'index'])->name('indexTipoMaterial');
Route::get('/editartipomateriales/{id}/edit', [TipoMaterialController::class, 'edit'])->name('EditTipoMaterial');
Route::put('/actualizartipomaterial/{id}', [TipoMaterialController::class, 'update'])->name('UpdateTipoMaterial');
Route::delete('/eliminartipomateriales/{id}', [TipoMaterialController::class, 'destroy'])->name('DeleteTipoMaterial');
/* ---------------- CATEGORIA DE MATERIALES ---------*/
route::get('/crearcategoriamaterial', [CategoriaMaterialController::class, 'create'])->name('CrearCategoriaMaterial');
Route::post('/crearcategoriamaterial', [CategoriaMaterialController::class, 'store'])->name('GuardarCategoriaMaterial');
Route::get('/categoriamateriales', [CategoriaMaterialController::class, 'index'])->name('indexCategoriaMaterial');
Route::get('/editarcategoriamateriales/{id}/edit', [CategoriaMaterialController::class, 'edit'])->name('EditCategoriaMaterial');
Route::put('/actualizarcategoriamaterial/{id}', [CategoriaMaterialController::class, 'update'])->name('UpdateCategoriaMaterial');
Route::delete('/eliminarcategoriamateriales/{id}', [CategoriaMaterialController::class, 'destroy'])->name('DeleteCategoriaMaterial');
/* ---------------- ESTADO DE MATERIALES ----------*/
route::get('/crearestadomaterial', [EstadoMaterialController::class, 'create'])->name('CrearEstadoMaterial');
Route::post('/crearestadomaterial', [EstadoMaterialController::class, 'store'])->name('GuardarEstadoMaterial');
Route::get('/estadomateriales', [EstadoMaterialController::class, 'index'])->name('indexEstadoMaterial');
Route::get('/editarestadomateriales/{id}/edit', [EstadoMaterialController::class, 'edit'])->name('EditEstadoMaterial');
Route::put('/actualizarestadomaterial/{id}', [EstadoMaterialController::class, 'update'])->name('UpdateEstadoMaterial');
Route::delete('/eliminarestadomateriales/{id}', [EstadoMaterialController::class, 'destroy'])->name('DeleteEstadoMaterial');
/* ---------------- MATERIAL BIBLIOGRAFICO ----------*/
route::get('/crearmaterialbibliografico', [MaterialBibliograficoController::class, 'create'])->name('CrearMaterialBibliografico');
Route::post('/crearmaterialbibliografico', [MaterialBibliograficoController::class, 'store'])->name('GuardarMaterialBibliografico');
Route::get('/materialbibliografico', [MaterialBibliograficoController::class, 'index'])->name('indexMaterialBibliografico');
Route::get('/editarmaterialbibliografico/{id}/edit', [MaterialBibliograficoController::class, 'edit'])->name('EditMaterialBibliografico');
Route::put('/actualizarmaterialbibliografico/{id}', [MaterialBibliograficoController::class, 'update'])->name('UpdateMaterialBibliografico');
Route::delete('/eliminarmaterialesbibliografico/{id}', [MaterialBibliograficoController::class, 'destroy'])->name('DeleteMaterialBibliografico');
Route::get('materialbibliografico/{id}', [MaterialBibliograficoController::class, 'show'])->name('ShowMaterialBibliografico');
/* ---------------- TIPO DE EVENTO ----------*/
Route::get('/creartipoevento', [tipoEventoController::class, 'create'])->name('CrearTipoEvento');
Route::post('/creartipoevento', [tipoEventoController::class, 'store'])->name('GuardarTipoEvento');
Route::get('/tiposevento', [tipoEventoController::class, 'index'])->name('indexTipoEvento');
Route::get('/editartipoevento/{id}/edit', [tipoEventoController::class, 'edit'])->name('EditTipoEvento');
Route::put('/actualizartipoeventol/{id}', [tipoEventoController::class, 'update'])->name('UpdateTipoEvento');
Route::delete('/eliminartipomaevento/{id}', [tipoEventoController::class, 'destroy'])->name('DeleteTipoEvento');
/* ---------------- EVENTO --------------- */
Route::get('/get-events', [EventController::class, 'getEvents'])->name('getEvents');
Route::get('/evento', [EventController::class, 'index'])->name('IndexEvento');
Route::get('/crearevento', [EventController::class, 'create'])->name('CrearEvento');
Route::post('/crearevento', [EventController::class, 'store'])->name('GuardarEvento');
Route::get('evento/{id}', [EventController::class, 'show'])->name('ShowEvento');
Route::get('/editarevento/{id}/edit', [EventController::class, 'edit'])->name('EditEvento');
Route::put('/actualizareventol/{id}', [EventController::class, 'update'])->name('UpdateEvento');
Route::delete('/eliminaraevento/{id}', [EventController::class, 'destroy'])->name('DeleteEvento');
// routes/web.php
/* ---------------- Salas --------------- */
Route::get('/crearsala', [SalaController::class, 'create'])->name('CrearSala');
Route::post('/crearsala', [SalaController::class, 'store'])->name('GuardarSala');
Route::get('/sala', [SalaController::class, 'index'])->name('IndexSala');
Route::get('/editarsala/{id}/edit', [SalaController::class, 'edit'])->name('EditSala');
Route::put('/actualizarsala/{id}', [SalaController::class, 'update'])->name('UpdateSala');
Route::delete('/eliminarsala/{id}', [SalaController::class, 'destroy'])->name('DeleteSala');
