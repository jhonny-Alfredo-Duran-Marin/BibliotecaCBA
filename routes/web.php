<?php

use App\Http\Controllers\Material\TipoMaterialController;
use App\Models\Material\TipoMaterial;
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

Route::get('/creartipomaterial', [TipoMaterialController::class, 'create'])->name('CrearTipoMaterial');
Route::post('/creartipomaterial', [TipoMaterialController::class, 'store'])->name('GuardarTipoMaterial');
Route::get('/tiposmateriales', [TipoMaterialController::class, 'index'])->name('indexTipoMaterial');

