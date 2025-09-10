<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\Klijent;
use App\Models\Stolar;
use App\Models\Status;
use Illuminate\Http\Request;

class NarudzbinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $narudzbine = Narudzbina::with('klijent','stolar','status')->latest()->paginate(10);
        return view('narudzbine.index', compact('narudzbine'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klijenti = Klijent::all();
        $stolari = Stolar::all();
        $statuses = Status::all();
        return view('narudzbine.create', compact('klijenti','stolari','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Specifikacija' => 'nullable|string|max:255',
            'Rok' => 'required|date',
            'Klijent_id' => 'required|exists:Klijent,ID_Klijent',
            'Stolar_id' => 'required|exists:Stolar,ID_Stolar',
            'Cena' => 'required|numeric',
            'Status_id' => 'required|exists:Status,ID_Status',
        ]);

        Narudzbina::create($data);
        return redirect()->route('narudzbine.index')->with('success','Narudžbina kreirana.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Narudzbina $narudzbina)
    {
        $narudzbina->load('klijent','stolar','status');
        return view('narudzbine.show', compact('narudzbina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Narudzbina $narudzbina)
    {
        $klijenti = Klijent::all();
        $stolari = Stolar::all();
        $statuses = Status::all();
        return view('narudzbine.edit', compact('narudzbina','klijenti','stolari','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Narudzbina $narudzbina)
    {
        $data = $request->validate([
            'Specifikacija' => 'nullable|string|max:255',
            'Rok' => 'required|date',
            'Klijent_id' => 'required|exists:Klijent,ID_Klijent',
            'Stolar_id' => 'required|exists:Stolar,ID_Stolar',
            'Cena' => 'required|numeric',
            'Status_id' => 'required|exists:Status,ID_Status',
        ]);

        $narudzbina->update($data);
        return redirect()->route('narudzbine.show', $narudzbina)->with('success','Narudžbina ažurirana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Narudzbina $narudzbina)
    {
        $narudzbina->delete();
        return redirect()->route('narudzbine.index')->with('success','Narudžbina obrisana.');
    }
}
