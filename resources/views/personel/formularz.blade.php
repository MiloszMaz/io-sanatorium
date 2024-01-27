@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="rejestracja-step3">
            <form action="{{ route('personel/stworz') }}" method="post">
                @csrf
                <legend class="text-center">Rejestracja personelu</legend>
                <label class="row">
                    <label class="col-md-3 col-form-label">Imię</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="imie" required />
                    </div>
                </label>
                <label class="row">
                    <label class="col-md-3 col-form-label">Nazwisko</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="nazwisko" required />
                    </div>
                </label>
                <label class="row">
                    <label class="col-md-3 col-form-label">Stanowisko</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="stanowisko"
                            required />
                    </div>
                </label>
                <label class="row">
                    <label class="col-md-3 col-form-label">Numer kontaktowy</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="numer_kontaktowy" required />
                    </div>
                </label>
                <div class="text-center q-">
                    <button type="submit" class="btn btn-green">Dodaj</button>
                </div>

            </form>
        </div>
    </div>
@endsection
