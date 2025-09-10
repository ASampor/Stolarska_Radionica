<?php

namespace App\Http\Controllers;

use App\Models\Klijent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KlijentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klijenti = Klijent::latest()->paginate(10);
        return view('klijenti.index', compact('klijenti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klijenti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Ime'=>'required|string|max:15',
            'Prezime'=>'required|string|max:20',
            'Email'=>'required|email|unique:Klijent,Email',
            'Lozinka'=>'required|string|min:6',
        ]);
        $data['Lozinka'] = Hash::make($data['Lozinka']);
        Klijent::create($data);
        return redirect()->route('klijenti.index')->with('success','Klijent dodat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klijent $klijent)
    {
        return view('klijenti.show', compact('klijent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klijent $klijent)
    {
        return view('klijenti.edit', compact('klijent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klijent $klijent)
    {
        $data = $request->validate([
            'Ime'=>'required|string|max:15',
            'Prezime'=>'required|string|max:20',
            'Email'=>'required|email|unique:Klijent,Email,'.$klijent->ID_Klijent.',ID_Klijent',
        ]);
        if($request->filled('Lozinka')) $data['Lozinka']= Hash::make($request->Lozinka);
        $klijent->update($data);
        return redirect()->route('klijenti.show',$klijent)->with('success','Klijent ažuriran.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klijent $klijent)
    {
        $klijent->delete();
        return redirect()->route('klijenti.index')->with('success','Klijent obrisan.');
    }
}
