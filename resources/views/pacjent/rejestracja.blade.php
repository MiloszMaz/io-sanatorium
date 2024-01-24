@extends('layouts.main')

@section('content')
<div class="container">
    <div class="center-box rejestracja-step1">
        <h1 class="mt-4 text-center">
            Wybierz co dalej chcesz zrobić:
        </h1>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('pacjenci/sprawdz-termin') }}">Sprawdź dostępność
                    terminów</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('pacjenci') }}">Zobacz listę pacjentów</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('pacjenci/rejestracja-pacjenta') }}">Zapisz
                    pacjenta na
                    pobyt</a>
            </li>
        </ul>
    </div>
</div>


@endsection