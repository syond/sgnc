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

        
          
        /** GRAFICO COM TOTAL DE NC POR MESES */
        $ncPorMes = new NaoConformidadeChart();

        $ncMeses = NaoConformidade::select('id', 'created_at')
                        ->get()
                        ->groupBy(function($date) {
                            //return Carbon::parse($date->created_at)->format('Y'); // agrupos por ano
                            return \Carbon\Carbon::parse($date->created_at)->format('m'); // agrupar por mes
                        });


        $ncMesesCount = [];
        $ncMes = [];
        $meses = [  '1'     => 'Jan', 
                    '2'     => 'Fev',
                    '3'     => 'Mar',
                    '4'     => 'Abr',
                    '5'     => 'Mai',
                    '6'     => 'Jun',
                    '7'     => 'Jul',
                    '8'     => 'Ago',
                    '9'     => 'Set',
                    '10'    => 'Out',
                    '11'    => 'Nov',
                    '12'    => 'Dez', ];
                        
        foreach ($ncMeses as $key => $value) {
            $ncMesesCount[(int)$key] = count($value);
        }
                        
        for($i = 1; $i <= 12; $i++){
            if(!empty($ncMesesCount[$i])){
                $ncMes[$i] = $ncMesesCount[$i];
            }else{
                $ncMes[$i] = 0;    
            }
        } 

        $data = NaoConformidade::groupBy('created_at')
    ->get();
    

        $ncPorMes->title('NC por mês');
        $ncPorMes->labels($data->keys());
        $ncPorMes->dataset('Quantidade', 'bar', $data->values());
        /** */



        return view('dashboard', compact('totalAcoes', 'ncPorMes'));
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
