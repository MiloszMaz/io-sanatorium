<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacjentController extends Controller
{
    public function index()
    {
        return view('pacjenci.lista');
    }
}
