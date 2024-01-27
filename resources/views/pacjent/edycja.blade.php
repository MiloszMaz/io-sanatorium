@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="rejestracja-step3">
            <form action="{{ route('pacjenci/zapisz', ['pacjent' => $pacjent->id]) }}" method="post">
                @csrf
                <legend class="text-center">Rejestracja pacjenta</legend>
                <label class="row">
                    <label class="col-md-3 col-form-label">Imię pacjenta</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="imie" value="{{ $pacjent->imie }}"
                            required />
                    </div>
                </label>
                <label class="row">
                    <label class="col-md-3 col-form-label">Nazwisko pacjenta</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="nazwisko" value="{{ $pacjent->nazwisko }}"
                            required />
                    </div>
                </label>
                <label class="row">
                    <label class="col-md-3 col-form-label">Pesel</label>
                    <div class="col-md-9">
                        <input type="text" minlength="11" maxlength="11" class="form-control" name="pesel"
                            value="{{ $pacjent->pesel }}" required />
                    </div>
                </label>
                <label class="mb-3 row">
                    <label class="col-md-3 col-form-label">Numer telefonu do opiekuna</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="numer_kontaktowy_opiekuna"
                            value="{{ $pacjent->numer_kontaktowy_opiekuna }}" required />
                    </div>
                </label>
                <div class="text-center">
                    <button type="submit" class="btn btn-green">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
@endsection
