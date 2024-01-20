<?php
namespace App\Http\Controllers;

use App\Models\Pacjent;
use Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PacjentController extends Controller
{
    public function rejestracja(): View
    {
        return view('pacjent.rejestracja');
    }

    public function rejestracjaPacjenta(): View
    {
        return view('pacjent.rejestracjaPacjenta');
    }

    public function sprawdzDostepnoscTerminow(): View
    {
        $termin = Request::get('termin');
        $isEmptyDate = null;

        if($termin) {
            // TODO: sprawdz czy dostepny
            $isEmptyDate = true;

            return view('pacjent.sprawdzDostepnoscTerminow')->with('isEmptyDate', $isEmptyDate);
        }

        return view('pacjent.sprawdzDostepnoscTerminow')->with('isEmptyDate', $isEmptyDate);
    }

    public function listaPacjentow(): View
    {
        return view('pacjent.listaPacjentow');
    }

    public function rejestrujWSystemie(): RedirectResponse
    {
        $imiePacjenta = Request::get('imie_pacjenta');
        $nazwiskoPacjenta = Request::get('nazwisko_pacjenta');
        $dataUrodzenia = Request::get('data_urodzenia');
        $pesel = Request::get('pesel');
        $iloscDni = Request::get('ilosc_dni');
        $przyczyna = Request::get('przyczyna');

        $pacjent = new Pacjent;
        $pacjent->imie = $imiePacjenta;
        $pacjent->nazwisko = $nazwiskoPacjenta;
        $pacjent->pesel = $pesel;
        $pacjent->numer_kontaktowy_opiekuna = 1;
        $pacjent->save();

        session()->flash('success', sprintf('Pacjent %s został zapisany.', $nazwiskoPacjenta));

        return redirect('/');
    }
}
