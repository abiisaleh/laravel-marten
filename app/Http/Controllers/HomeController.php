<?php

namespace App\Http\Controllers;

use App\Models\cafe;
use App\Models\kriteria;
use App\Models\subkriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home',[
            'cafe' => cafe::skip(0)->take(3)->get(),
            'kriteria'=> kriteria::all(),
            'subkriteria' => subkriteria::all()
        ]);
    }
}
