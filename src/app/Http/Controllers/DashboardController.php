<?php

namespace App\Http\Controllers;

use App\Corretiva;
use Illuminate\Http\Request;
use App\NaoConformidade;
use App\Charts\NaoConformidadeChart;
use DB;

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

        $nao_conformidades_mes = NaoConformidade::where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), date('Y'))
                                                ->select('created_at')
                                                ->get()->count();

        
        $meses = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

        $nao_conformidade_chart = new NaoConformidadeChart;
        $nao_conformidade_chart->title('Não Conformidades Cadastradas');
        $nao_conformidade_chart->labels($meses);
        $nao_conformidade_chart->dataset('Qtd de Não Conformidades', 'bar', [$nao_conformidades_mes]);
        $nao_conformidade_chart->height(300);


        return view('dashboard', compact('nao_conformidade_chart'));
    }
    
}
