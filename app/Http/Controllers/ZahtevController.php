<?php

namespace App\Http\Controllers;

use App\Models\Zahtev;
use App\Models\Klijent;
use Illuminate\Http\Request;

class ZahtevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zahtevi = Zahtev::with('klijent')->latest()->paginate(10);
        return view('zahtevi.index', compact('zahtevi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klijenti = Klijent::all();
        return view('zahtevi.create', compact('klijenti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Vrsta_proizvoda' => 'required|string|max:50',
            'Opis' => 'nullable|string|max:200',
            'Klijent_id' => 'required|exists:Klijent,ID_Klijent',
            'Lokacija' => 'nullable|string|max:255',
            'Telefon' => 'nullable|string|max:20',
        ]);

        $data['Datum_kreiranja'] = now()->toDateString();

        Zahtev::create($data);
        return redirect()->route('zahtevi.index')->with('success','Zahtev kreiran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zahtev $zahtev)
    {
        $zahtev->load('klijent','termin');
        return view('zahtevi.show', compact('zahtev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zahtev $zahtev)
    {
        $klijenti = Klijent::all();
        return view('zahtevi.edit', compact('zahtev','klijenti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zahtev $zahtev)
    {
        $data = $request->validate([
            'Vrsta_proizvoda' => 'required|string|max:50',
            'Opis' => 'nullable|string|max:200',
            'Klijent_id' => 'required|exists:Klijent,ID_Klijent',
            'Lokacija' => 'nullable|string|max:255',
            'Telefon' => 'nullable|string|max:20',
        ]);
        $zahtev->update($data);
        return redirect()->route('zahtevi.show',$zahtev)->with('success','Zahtev izmenjen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zahtev $zahtev)
    {
        $zahtev->delete();
        return redirect()->route('zahtevi.index')->with('success','Zahtev obrisan.');
    }
}
