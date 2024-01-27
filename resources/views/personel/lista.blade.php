@extends('layouts.main')

@section('content')
    <div class="center-flex">
        <div class="container">
            <h1 class="text-center ">Lista personelu</h1>
            <div style="margin-top: 30px;">
                <table class="full-width">
                    <tr>
                        <th>PERSONEL MEDYCZNY</th>
                        <th>NUMER KONTAKTOWY</th>
                        <th>STANOWISKO</th>
                        <th>AKCJE</th>
                    </tr>
                    @foreach ($personel as $row)
                        <tr>
                            <td>{{ $row->imie }} {{ $row->nazwisko }}</td>
                            <td>{{ $row->numer_kontaktowy }}</td>
                            <td>{{ $row->stanowisko }}</td>
                            <td>
                                <a href="#">Edytuj</a>
                                <a href="#">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="center-flex" style="margin-top: 30px;">
                    {{ $personel->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
