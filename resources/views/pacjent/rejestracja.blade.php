@extends('layouts.main')

@section('content')

<h1>
    Wybierz co dalej chcesz zrobić
</h1>

<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/pacjent/sprawdz-dostepnosc-terminow">Sprawdź dostępność terminów</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/pacjent/lista-pacjentow">Zobacz listę pacjentów</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/pacjent/rejestracja-pacjenta">Zapisz pacjenta na pobyt</a>
    </li>
</ul>

@endsection
