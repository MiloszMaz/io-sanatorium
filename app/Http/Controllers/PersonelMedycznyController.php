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

    public function formularz()
    {
        return view('personel.formularz');
    }

    public function stworz(StworzPersonelMedyczny $request)
    {
        PersonelMedyczny::create($request->validated());
        return redirect(route('personel/formularz'));
    }

    public function edytuj(PersonelMedyczny $personel)
    {
        return view('personel.edycja', ['personel' => $personel]);
    }

    public function zapisz(PersonelMedyczny $personel, StworzPersonelMedyczny $request)
    {
        $personel->update($request->validated());
        return redirect(route('personel/edycja', ['personel' => $personel->id]));
    }

    public function usun(PersonelMedyczny $personel)
    {
        $personel->delete();
        return redirect(route('personel'));
    }
}
