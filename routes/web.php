<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlijentController;
use App\Http\Controllers\ZahtevController;
use App\Http\Controllers\TerminController;
use App\Http\Controllers\NarudzbinaController;

// Home page (Početna)
Route::get('/', function () {
    return view('pocetna');
})->name('pocetna');

// Registration page (Registracija)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Login page (Prijava)
Route::get('/login', function () {
    return view('login');
})->name('login');

// Resource routes
Route::resource('klijenti', KlijentController::class);
Route::resource('zahtevi', ZahtevController::class);
Route::resource('termini', TerminController::class);
Route::resource('narudzbine', NarudzbinaController::class);

// Public use-case routes
Route::post('/public/zahtev', [ZahtevController::class,'store'])->name('public.zahtev.store');
Route::post('/public/zakazi', [TerminController::class,'store'])->name('public.zakazi');
Route::post('/public/narudzbina', [NarudzbinaController::class,'store'])->name('public.narudzbina.store');
