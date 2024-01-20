@extends('layouts.main')

@section('content')

    <form action="/pacjent/rejestruj-w-systemie" method="post">
        @csrf
        <legend>Rejestracja pacjenta</legend>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Imię pacjenta</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="imie_pacjenta">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Nazwisko pacjenta</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="nazwisko_pacjenta">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Data urodzenia</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="data_urodzenia">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Pesel</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="pesel">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Numer skierowania</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="numer_skierowania">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Ilość dni</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="ilosc_dni">
            </div>
        </label>
        <label class="mb-3 row">
            <label class="col-md-3 col-form-label">Przyczyna</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="przyczyna">
            </div>
        </label>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Zapisz na pobyt</button>
        </div>

    </form>

@endsection
