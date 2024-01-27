<?php

namespace App\Http\Controllers;

use App\Http\Requests\StworzPersonelMedyczny;
use App\Models\PersonelMedyczny;
use Illuminate\Http\Request;

class PersonelMedycznyController extends Controller
{
    public function index()
    {
        $personel = PersonelMedyczny::paginate(25);
        return view('personel.lista', ['personel' => $personel]);
    }

    public function listaAkcji()
    {
        return view('personel.listaAkcji');
    }

    public function formularz(PersonelMedyczny $personelMedyczny)
    {
        return view('personel.formularz');
    }

    public function stworz(StworzPersonelMedyczny $request)
    {
        PersonelMedyczny::create($request->validated());
        return redirect(route('personel/formularz'));
    }

    public function edytuj(PersonelMedyczny $personelMedyczny)
    {
        return view('personel.edycja', ['personelMedyczny' => $personelMedyczny]);
    }

    public function zapisz(PersonelMedyczny $personelMedyczny, StworzPersonelMedyczny $request)
    {
        $personelMedyczny->update($request->validated());
        return redirect(route('personel/formularz'));
    }

    public function usun(PersonelMedyczny $personelMedyczny)
    {
        $personelMedyczny->delete();
        return redirect(route('personel'));
    }
}
