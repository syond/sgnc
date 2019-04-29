<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('sistema.relatorio.relatorio');
    }
}
