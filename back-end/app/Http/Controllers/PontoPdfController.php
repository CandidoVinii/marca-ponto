<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;

class PontoPdfController extends Controller
{
    public function generatePDF()
    {
        $data = Ponto::all();
        $pdf = PDF::loadView('pdf', ['data' => $data]);
        return $pdf->download('data.pdf')->setStatusCode(200);
    }
}