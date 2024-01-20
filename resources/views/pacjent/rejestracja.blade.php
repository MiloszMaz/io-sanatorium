@extends('layouts.main')

@section('content')

<div class="center-box rejestracja-step1">
    <h1 class="mt-4">
        Wybierz co dalej chcesz zrobić:
    </h1>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/pacjent/sprawdz-dostepnosc-terminow">Sprawdź dostępność terminów</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/pacjent/lista-pacjentow">Zobacz listę pacjentów</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/pacjent/rejestracja-pacjenta">Zapisz pacjenta na pobyt</a>
        </li>
    </ul>
</div>


@endsection
