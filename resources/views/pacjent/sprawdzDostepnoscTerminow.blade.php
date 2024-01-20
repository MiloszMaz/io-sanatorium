@extends('layouts.main')

@section('content')
    <div class="center-box rejestracja-step2 mt-4">
    <div class="row text-center m-0">
        <div class="center-box col-md-8">
            <form action="/pacjent/sprawdz-dostepnosc-terminow" method="post">
                @csrf
                <legend class="mb-4">Wpisz termin:</legend>
                <label class="mb-3 w-100">
                    <input type="text" class="form-control" name="termin" placeholder="02.12.2024">
                </label>


                @if($isEmptyDate == true)
                    <p class="text-success">Termin dostępny</p>
                    <div>
                        <a href="/pacjent/rejestracja-pacjenta" class="btn btn-green">Zapisz pacjenta na pobyt</a>
                    </div>
                @else
                    @if ($isEmptyDate === false)
                        <p class="text-danger">Termin niedostępny</p>
                    @endif
                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Sprawdź</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
    </div>

@endsection
