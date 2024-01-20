<?php
namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function komunikat(): View
    {
        return view('home.komunikat');
    }
}
