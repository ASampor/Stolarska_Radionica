<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use App\Models\Zahtev;
use App\Models\Stolar;
use Illuminate\Http\Request;

class TerminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termini = Termin::with('zahtev','stolar')->latest()->paginate(10);
        return view('termini.index', compact('termini'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Prikaži zahteve koji još nemaju termin
        $zahtevi = Zahtev::doesntHave('termin')->get();
        $stolari = Stolar::all();
        return view('termini.create', compact('zahtevi','stolari'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Datum_vreme' => 'required|date',
            'Zahtev_id' => 'required|exists:Zahtev,ID_Zahtev',
            'Stolar_id' => 'required|exists:Stolar,ID_Stolar',
        ]);

        Termin::create($data);
        return redirect()->route('termini.index')->with('success','Termin zakazan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Termin $termin)
    {
        return view('termini.show', compact('termin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Termin $termin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Termin $termin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Termin $termin)
    {
        $termin->delete();
        return redirect()->route('termini.index')->with('success','Termin obrisan.');
    }
}
