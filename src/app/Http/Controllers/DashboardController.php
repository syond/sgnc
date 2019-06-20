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
        $nc = NaoConformidade::all()->count();
        
        $chart = new NaoConformidadeChart();
        $chart->labels(['Não Conformidade', 'Imediata', 'Corretiva']);
        $chart->dataset('Quantidade', 'bar', [1, 2, 3]);
        
        
        
        //$ncChart = $this->ncChart();

        //$imediataChart = $this->imediataChart();

        return view('dashboard', compact('chart'));
    }



    public function ncChart()
    {
        $ncChart = new LavaCharts();

        $data = $ncChart->DataTable();

        $data->addColumns([
            ['date', 'Day of Month'],
            ['number', 'Projected'],
            ['number', 'Official']
        ]);

        // Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $rowData = [
            "2017-4-$a", rand(800,1000), rand(800,1000)
            ];

            $data->addRow($rowData);
        }


        $ncChart->LineChart('Nc', $data, [
            'title' => 'Não Conformidades',
            'elementId' => 'ncChart-div',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ],
            'colors' => ['blue', '#F4C1D8']
        ]);

        return $ncChart;
    }




    public function imediataChart()
    {
        $imediataChart = new LavaCharts();

        $data = $imediataChart->DataTable();

        $data->addColumns([
            ['date', 'Day of Month'],
            ['number', 'Projected'],
            ['number', 'Official']
        ]);

        // Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $rowData = [
            "2017-4-$a", rand(800,1000), rand(800,1000)
            ];

            $data->addRow($rowData);
        }


        $imediataChart->ColumnChart('Imediata', $data, [
            'title' => 'Imediatas',
            'elementId' => 'imediataChart-div',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ],
            'colors' => ['blue', '#F4C1D8']
        ]);

        return $imediataChart;
    }
    

/***
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

 ******/
    
    
}
