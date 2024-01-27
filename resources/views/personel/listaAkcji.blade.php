@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="center-box rejestracja-step1">
            <h1 class="mt-4 text-center">
                Wybierz co dalej chcesz zrobić:
            </h1>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('personel/formularz') }}">Dodaj personel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('personel') }}">Zobacz listę personelu</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
