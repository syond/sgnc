<?php

namespace App\Http\Controllers;

use App\Corretiva;
use Illuminate\Http\Request;
use App\NaoConformidade;
use App\Charts\NaoConformidadeChart;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $dados = NaoConformidade::selectRaw('COUNT(*) as count, YEAR(created_at) ano, MONTH(created_at) mes')
        ->groupBy('ano', 'mes')
        ->get();

        $nao_conformidade_chart = new NaoConformidadeChart;
        $nao_conformidade_chart->labels(['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']);
        $nao_conformidade_chart->dataset('Qtd de Não Conformidades', 'line', $dados->values());
        $nao_conformidade_chart->height(300);

        return view('dashboard', compact('nao_conformidade_chart'));
    }
    
}
