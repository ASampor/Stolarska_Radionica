<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlijentController;
use App\Http\Controllers\ZahtevController;
use App\Http\Controllers\TerminController;
use App\Http\Controllers\NarudzbinaController;

Route::get('/', function () {
    return view('welcome');
});

//Rute
Route::resource('klijenti', KlijentController::class);
Route::resource('zahtevi', ZahtevController::class);
Route::resource('termini', TerminController::class);
Route::resource('narudzbine', NarudzbinaController::class);

// public use-case routes (examples)
Route::post('/public/zahtev', [ZahtevController::class,'store'])->name('public.zahtev.store');
Route::post('/public/zakazi', [TerminController::class,'store'])->name('public.zakazi');
Route::post('/public/narudzbina', [NarudzbinaController::class,'store'])->name('public.narudzbina.store');