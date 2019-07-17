<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NaoConformidade;
use App\Corretiva;
use App\Imediata;
use App\Charts\NaoConformidadeChart;
use Khill\Lavacharts\Lavacharts;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /** GRAFICO COM TOTAL DE ACOES */
        $nc = NaoConformidade::all()->count();
        $imediatas = Imediata::all()->count();
        $corretivas = Corretiva::all()->count();
        
        $totalAcoes = new NaoConformidadeChart();
        $totalAcoes->title('TOTAL de Ações');
        $totalAcoes->labels(['Não Conformidade', 'Imediata', 'Corretiva']);
        $totalAcoes->dataset('Quantidade', 'doughnut', [$nc, $imediatas, $corretivas]);
        /** */

   


        return view('dashboard', compact('totalAcoes'));
    }
    
    
}
