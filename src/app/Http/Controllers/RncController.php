<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RncStoreRequest;
use App\Funcionario;
use App\Empresa;
use App\Corretiva;
use App\Equipamento;
use App\Imediata;
use App\NaoConformidade;
use App\Onibus;
use App\Setor;
use App\Rnc;
use PDF;
use Auth;

class RncController extends Controller
{
    public function index()
    {
        $rnc = Rnc::listarTodos(5);

        return view('sistema.rnc.index', compact('rnc'));
    }


    public function create()
    {
        $empresas   = Empresa::all();

        return view('sistema.rnc.create', compact('empresas'));
    }


    public function store(RncStoreRequest $request)
    {
        $dados = $request->validated();
        
        $funcionario_id = Auth::id();
        
        $dados['funcionario_id'] = $funcionario_id;
        $dados['desativado'] = 1;

        Rnc::create($dados);

        return redirect()->route('rnc.index')->with('success', "RNC cadastrado com sucesso!");
    }


    public function gerarPdf($id)
    {
        $rnc = Rnc::find($id);

        $de_data    = Rnc::select('de_data')->where('id', $rnc->id)->first()->de_data;
        $ate_data   = Rnc::select('ate_data')->where('id', $rnc->id)->first()->ate_data;
        $setor      = Rnc::select('setor_id')->where('id', $rnc->id)->first()->setor_id;

        $nao_conformidades = NaoConformidade::where('setor_id', $setor)->whereBetween('created_at', [$de_data, $ate_data])->get();

        $qtd_nc = count($nao_conformidades);

        $dados_nc   = NaoConformidade::where('setor_id', $setor)->first();
        $dados_rnc  = Rnc::find($id);

        $pdf = PDF::loadView('sistema.rnc.relatorio', compact('nao_conformidades', 'dados_nc', 'dados_rnc', 'qtd_nc'));

        $empresa        = $dados_nc->equipamento->onibus->empresa->nome_fantasia;
        $setor          = $dados_nc->setor->nome;
        $data_geracao   = \Carbon\Carbon::parse($dados_rnc->created_at)->format('d/m/Y');

        return $pdf->stream($empresa . '_' . $setor . '_' . $data_geracao . '.pdf');
    }


    public function destroy($id)
    {
        Rnc::find($id)->delete();
        
        return back()->with('success', 'RNC deletado com sucesso!');
    }


    public function search(Request $request)
    {
        /* $search = $request->get('search');

        $nao_conformidade = NaoConformidade::buscarNaoConformidadeCadastrada($search, 5);
        
        
        if(count($nao_conformidade) > 0)
        {
            return view('tecnico.nao-conformidade.index', compact('nao_conformidade'));
        }
            else
            {
                return view('tecnico.nao-conformidade.index', compact('nao_conformidade'))->withErrors("Nenhum registro encontrado.");
            }  */
    }





    /**
     * Função para o <SELECT> dinâmico no campo Setor
     */
    public function setorSelect()
    {
        $empresa_id = Input::get('empresa_id');

        $setor = Setor::where('empresa_id', $empresa_id)->get();

        return response()->json($setor);
    }




}
