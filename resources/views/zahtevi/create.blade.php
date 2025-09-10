@extends('layouts.app')
@section('title','Novi zahtev')
@section('content')
<h1>Novi zahtev</h1>
<form action="{{ route('zahtevi.store') }}" method="post">
  @csrf
  <label>Vrsta proizvoda: <input name="Vrsta_proizvoda" value="{{ old('Vrsta_proizvoda') }}"></label><br>
  <label>Opis: <input name="Opis" value="{{ old('Opis') }}"></label><br>
  <label>Klijent:
    <select name="Klijent_id">
      @foreach($klijenti as $k)
        <option value="{{ $k->ID_Klijent }}">{{ $k->Ime }} {{ $k->Prezime }}</option>
      @endforeach
    </select>
  </label><br>
  <label>Lokacija: <input name="Lokacija"></label><br>
  <label>Telefon: <input name="Telefon"></label><br>
  <button type="submit">Pošalji</button>
</form>
@endsection
