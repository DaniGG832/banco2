<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\RegistroController;
use App\Models\Movimiento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
    //return redirect()->route('clientes.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('clientes',ClienteController::class)->middleware(['auth'])->middleware(['auth']);

Route::get('cuentas/create',[CuentaController::class,'create'])->name('cuentas.create')->middleware(['auth']);

Route::post('cuentas/store',[CuentaController::class,'store'])->name('cuentas.store')->middleware(['auth']);

Route::get('cuentas',[CuentaController::class,'index'])->name('cuentas.index')->middleware(['auth']);

Route::get('cuentas/{cuenta}',[CuentaController::class,'show'])->name('cuentas.show')->middleware(['auth']);

Route::get('cuentas/{cuenta}/titulares',[CuentaController::class,'addTitulares'])->name('cuentas.addTitulares')->middleware(['auth']);

Route::post('cuentas/{cuenta}/titulares',[CuentaController::class,'agregarTitulares'])->name('cuentas.agregarTitulares')->middleware(['auth']);

Route::get('cuentas/{cuenta}/bajatitulares',[CuentaController::class,'bajaTitulares'])->name('cuentas.bajaTitulares')->middleware(['auth']);

Route::post('cuentas/{cuenta}/darbajatitulares',[CuentaController::class,'darBajaTitulares'])->name('cuentas.darBajaTitulares')->middleware(['auth']);


Route::post('movimientos/add',[MovimientoController::class,'store'])->name('movimientos.store')->middleware(['auth']);

Route::get('registros',[RegistroController::class,'index'])->name('registros.index')->middleware(['auth']);


Route::get('pruebas',[ClienteController::class,'pruebas'])->name('pruebas')->middleware(['auth']);
