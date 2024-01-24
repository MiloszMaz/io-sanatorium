@extends('layouts.main')

@section('content')
<div class="center-flex">
    <div class="container">
        <h1 class="text-center ">Lista pacjentów</h1>
        <div style="margin-top: 30px;">
            <form action="" method="GET">
                <table class="full-width">
                    <tr>
                        <td>Wyszukaj po numerze PESEL</td>
                        <td><input type="text" name="pesel" id="pesel" /></td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="margin-top: 30px;">
            <table class="full-width">
                <tr>
                    <th>PACJENT</th>
                    <th>PESEL</th>
                    <th>POBYT</th>
                </tr>

                @foreach($pacjenci as $pacjent)
                <tr>
                    <td>{{$pacjent->imie}} {{$pacjent->nazwisko}}</td>
                    <td>{{$pacjent->pesel}}</td>
                    @if(!empty($pacjent->pobyt))
                    <td>{{$pacjent->pobyt->data_przyjecia->format('Y-m-d')}} -
                        {{$pacjent->pobyt->data_wypisu->format('Y-m-d')}}</td>
                    @else
                    <td>Aktualnie brak</td>
                    @endif
                </tr>
                @endforeach
            </table>
            <div class="center-flex" style="margin-top: 30px;">
                {{ $pacjenci->links() }}

            </div>
        </div>
    </div>
</div>
@endsection