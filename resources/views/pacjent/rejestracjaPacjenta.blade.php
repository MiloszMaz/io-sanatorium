@extends('layouts.main')

@section('content')

    <div class="rejestracja-step3">
    <form action="/pacjent/rejestruj-w-systemie" method="post">
        @csrf
        <legend class="text-center">Rejestracja pacjenta</legend>
        <label class="row">
            <label class="col-md-3 col-form-label">Imię pacjenta</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="imie_pacjenta" required />
            </div>
        </label>
        <label class="row">
            <label class="col-md-3 col-form-label">Nazwisko pacjenta</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="nazwisko_pacjenta" required />
            </div>
        </label>
        <label class="row">
            <label class="col-md-3 col-form-label">Data urodzenia</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="data_urodzenia" required />
            </div>
        </label>
        <label class="row">
            <label class="col-md-3 col-form-label">Pesel</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="pesel" required />
            </div>
        </label>
        <label class="row">
            <label class="col-md-3 col-form-label">Numer skierowania</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="numer_skierowania" required />
            </div>
        </label>
        <label class="row">
            <label class="col-md-3 col-form-label">Ilość dni</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="ilosc_dni" required />
            </div>
        </label>
        <label class="mb-3">
            <label class="col-md-3 col-form-label">Przyczyna</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="przyczyna" required />
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Numer telefonu do opiekuna</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="numer_do_opiekuna" required />
            </div>
        </label>
        <div class="text-center">
            <button type="submit" class="btn btn-green">Zapisz na pobyt</button>
        </div>

    </form>
    </div>
@endsection
