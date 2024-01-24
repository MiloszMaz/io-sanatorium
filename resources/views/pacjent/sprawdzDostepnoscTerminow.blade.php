@extends('layouts.main')

@section('content')
<div class="container">
    <div class="center-box rejestracja-step2 mt-4">
        <div class="row text-center m-0">
            <div class="center-box">
                <form action="/pacjent/sprawdz-dostepnosc-terminow" method="get">
                    <legend class="mb-4">Wpisz termin:</legend>
                    <label class="mb-3 w-100">
                        <input type="date" class="form-control" name="termin" value="{{ request()->get('termin') }}">
                    </label>


                    @if($isEmptyDate == true)
                    <p class="text-success">Termin dostępny</p>
                    <div>
                        <a href="/pacjent/rejestracja-pacjenta" class="btn btn-green">Zapisz pacjenta na pobyt</a>
                    </div>
                    @elseif ($isEmptyDate === false)
                    <p class="text-danger">Termin niedostępny</p>
                    @endif
                    @if (!$isEmptyDate)
                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Sprawdź</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection