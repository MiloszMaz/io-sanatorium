<?php

namespace App\Http\Controllers;

use App\Models\Pacjent;
use App\Models\RezerwacjaTerminu;
use App\Models\Skierowanie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class PacjentController extends Controller
{
    public function index(Request $request)
    {
        $pesel = $request->get('pesel');

        if (!empty($pesel)) {
            $pacjenci = Pacjent::with('pobyt')->where('pesel', $pesel)->paginate(25);
        } else {
            $pacjenci = Pacjent::with('pobyt')->paginate(25);
        }

        return view('pacjent.listaPacjentow', ['pacjenci' => $pacjenci]);
    }

    public function rejestracja(): View
    {
        return view('pacjent.rejestracja');
    }

    public function rejestracjaPacjenta(): View
    {
        return view('pacjent.rejestracjaPacjenta');
    }

    public function sprawdzDostepnoscTerminow(Request $request): View
    {
        $termin = $request->get('termin');
        $isEmptyDate = null;

        if ($termin) {
            $ilosc = RezerwacjaTerminu::where('data_przyjecia', '<=', $termin)
                ->where('data_wypisu', '>=', $termin)->count();

            $isEmptyDate = $ilosc < config('app.max_occupancy');
        }

        return view('pacjent.sprawdzDostepnoscTerminow')->with('isEmptyDate', $isEmptyDate);
    }

    public function listaPacjentow(): View
    {
        return view('pacjent.listaPacjentow');
    }

    public function rejestrujWSystemie(Request $request): RedirectResponse
    {
        $imiePacjenta = $request->post('imie_pacjenta');
        $nazwiskoPacjenta = $request->post('nazwisko_pacjenta');
        $pesel = $request->post('pesel');
        $dataPrzyjecia = $request->post('data_przyjecia');
        $iloscDni = $request->post('ilosc_dni');
        $przyczyna = $request->post('przyczyna');
        $numerSkierowania = $request->post('numer_skierowania');
        $numerDoOpiekuna = $request->post('numer_do_opiekuna');

        $termin = Date::createFromTimestamp(strtotime($dataPrzyjecia));
        $terminWypisu = $termin->clone()->addDays($iloscDni);

        $ilosc = RezerwacjaTerminu::where(function (Builder $query) use ($termin) {
            $query->where('data_przyjecia', '<=', $termin->format('Y-m-d'))
                ->where('data_wypisu', '>=', $termin->format('Y-m-d'));
        })->where(function (Builder $query) use ($terminWypisu) {
            $query->where('data_przyjecia', '<=', $terminWypisu->format('Y-m-d'))
                ->where('data_wypisu', '>=', $terminWypisu->format('Y-m-d'));
        })->count();

        if ($ilosc > config('app.max_occupancy')) {
            session()->flash('error', "Wybrany termin jest zajęty");
            return redirect(route('pacjenci/rejestracja-pacjenta'))->withInput();
        }

        $pacjent = new Pacjent;
        $pacjent->imie = $imiePacjenta;
        $pacjent->nazwisko = $nazwiskoPacjenta;
        $pacjent->pesel = $pesel;
        $pacjent->numer_kontaktowy_opiekuna = $numerDoOpiekuna;
        $pacjent->save();

        $skierowanie = new Skierowanie;
        $skierowanie->numer_skierowania = $numerSkierowania;
        $skierowanie->notatka_z_wywiadu = $przyczyna;
        $skierowanie->id_pacjenta = $pacjent->id;
        $skierowanie->save();

        $rezerwacjaTerminu = new RezerwacjaTerminu();
        $rezerwacjaTerminu->data_przyjecia = $termin->format('Y-m-d');
        $rezerwacjaTerminu->data_wypisu = $terminWypisu->format('Y-m-d');
        $rezerwacjaTerminu->notatka = '';
        $rezerwacjaTerminu->id_pacjenta = $pacjent->id;
        $rezerwacjaTerminu->id_uzytkownika = Auth::id();
        $rezerwacjaTerminu->save();

        session()->flash('success', sprintf('Pacjent %s został zapisany.', $nazwiskoPacjenta));

        return redirect(route('pacjenci/rejestracja-pacjenta'));
    }
}
