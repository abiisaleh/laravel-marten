<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function index(string $id): View
    {
        return view('pages.detail', [
            // 'cafe' => cafe::find($id),
            'cafe' => cafe::with('menu')->find($id)->toArray(),
            'kriteria' => kriteria::all(),
            'subkriteria' => subkriteria::all()
        ]);
    }
}
