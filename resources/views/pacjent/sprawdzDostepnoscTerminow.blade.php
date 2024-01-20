@extends('layouts.main')

@section('content')

    <div class="row text-center m-0">
        <div class="center-box col-md-8">
            <form action="/pacjent/sprawdz-dostepnosc-terminow" method="post">
                @csrf
                <legend>Wpisz termin:</legend>
                <label class="mb-3 w-100">
                    <input type="text" class="form-control" name="termin">
                </label>


                @if($isEmptyDate == true)
                    <span class="text-success">Termin dostępny</span>
                    <div>
                        <a href="/pacjent/rejestracja-pacjenta" class="btn btn-success">Zapisz pacjenta na pobyt</a>
                    </div>
                @else
                    @if ($isEmptyDate === false)
                        <span class="text-danger">Termin niedostępny</span>
                    @endif
                    <div>
                        <button type="submit" class="btn btn-primary">Sprawdź</button>
                    </div>
                @endif
            </form>
        </div>
    </div>


@endsection
