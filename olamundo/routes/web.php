<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;

/*
Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/contato', 'contatoController::clss');

Route::get('/home', function () {
    return view('home');
});

Route::resource('contato',  contatoController::class);*/


Route::get('/imc', [ImcController::class, 'index'])->name('imc.index');
Route::post('/calcular-imc', [ImcController::class, 'calcularImc'])->name('calcular.imc');

Route::get('/sono', [ImcController::class, 'sono'])->name('sono.index');
Route::post('/calcular-sono', [ImcController::class, 'calcularSono'])->name('calcular.sono');

Route::get('/viajem', [ImcController::class, 'viajem'])->name('viajem.index');
Route::post('/calcular-gasto', [ImcController::class, 'calcularViajem'])->name('calcular.gasto');