<?php

namespace App\Http\Controllers;

use App\Models\DadosBancarios;
use App\Models\Proposta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Decimal;

class PropostaController extends Controller
{
    private $tabelaJuros = [
        "Tabela 1" => 1.99,
        "Tabela 2" => 2.65,
        "Tabela 3" => 2.89,
        "Tabela 4" => 3.19,
        "Tabela 5" => 3.50,
        "Tabela 6" => 4.05,
        "Tabela 7" => 4.75,
        "Tabela 8" => 5.25,
        "Tabela 9" => 6.25,
        "Tabela 10" => 7.99
    ];

    /**
     * Mostra o form calcula proposta
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposta = DB::table('clientes')
            ->join('dados_bancarios', 'dados_bancarios.cliente_id', '=', 'clientes.id')
            ->join('propostas', 'propostas.cliente_id', '=', 'clientes.id')
            ->orderBy('propostas.id', 'DESC')
            ->get();
        //dd($proposta);
        return view('proposta.list')
            ->with('propostas', $proposta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uid)
    {
        $cliente = DB::table('clientes')
            ->leftJoin('enderecos', 'enderecos.cliente_id', '=', 'clientes.id')
            ->leftJoin('telefones', 'telefones.cliente_id', '=', 'clientes.id')
            ->leftJoin('emails', 'emails.cliente_id', '=', 'clientes.id')
            ->leftJoin('dados_bancarios', 'dados_bancarios.cliente_id', '=', 'clientes.id')
            ->where('clientes.uid', $uid)->get();
        //dd($cliente);
        return view('proposta.create')->with('cliente', $cliente)
                                        ->with('tabelaJuros', $this->tabelaJuros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clienteId = $request->input('cliente_id');
        $valor = $request->input('valorDoEmprestimo');
        $tabelaDeCalculo = $request->input('tabelaDeCalculo');
        $valor = preg_replace('/[^0-9]+/', '.', $valor);
        $valorDoEmprestimo = $valor;

        // Pega o id da conta bancaria
        $dadosBancarios = DadosBancarios::where('cliente_id', $clienteId)->first();

        $valorSolicitado = (float)$valorDoEmprestimo;
        $taxaDeCalculo = $tabelaDeCalculo / 100;
        $baseDivisorUm = (pow((1 + $taxaDeCalculo), 12) - 1);
        $baseDivisorDois = pow((1 + $taxaDeCalculo), 12) * $taxaDeCalculo;

        $baseDivisor = $baseDivisorUm / $baseDivisorDois;
        $parcelaMensal = (float)($valorSolicitado / $baseDivisor);

        $lmtNecessario = number_format($parcelaMensal * 12, 2);

        $proposta = new Proposta();
        $proposta->cliente_id = $clienteId;
        $proposta->dados_bancarios_id = $dadosBancarios->cliente_id;
        $proposta->atendente_id = 1;
        $proposta->franquia_id = 1;
        $proposta->valorSolicitado = number_format((float)$valorSolicitado, 2);
        $proposta->taxaJuros = $tabelaDeCalculo;
        $proposta->parcelaMensal = number_format((float)$parcelaMensal, 2);
        $proposta->limiteNecessario = $lmtNecessario;

        $proposta->totalParcelas = 12;

        try {
            $proposta->save();
            $proposta = DB::table('clientes')
                ->join('dados_bancarios', 'dados_bancarios.cliente_id', '=', 'clientes.id')
                ->join('propostas', 'propostas.cliente_id', '=', 'clientes.id')
                ->orderBy('propostas.id', 'DESC')
                ->get();
            //dd($proposta);
            return redirect('/proposta/list/');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * Formulário de cáuculo da Proposta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculo(Request $request)
    {
        return view('proposta.calculo')
                ->with('tabelaJuros', $this->tabelaJuros)
                ->with('tabelaDeCalculo', $tabelaDeCalculo = null);
    }

    /**
     * Calculador de Proposta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculadora(Request $request)
    {
        //dd($request->all());
        $valor = $request->input('valorDoEmprestimo');
        $tabelaDeCalculo = $request->input('tabelaDeCalculo');
        $valor = preg_replace('/[^0-9]+/', '.', $valor);
        $valorDoEmprestimo = $valor;

        $valorSolicitado = (float)$valorDoEmprestimo;
        $taxaDeCalculo = $tabelaDeCalculo / 100;
        $baseDivisorUm = (pow((1 + $taxaDeCalculo), 12) - 1);
        $baseDivisorDois = pow((1 + $taxaDeCalculo), 12) * $taxaDeCalculo;

        $baseDivisor = $baseDivisorUm / $baseDivisorDois;
        $parcelaMensal = ($valorSolicitado / $baseDivisor);
        $lmtNecessario = number_format($parcelaMensal * 12, 2);

        return view('proposta.calculo')
            ->with('tabelaJuros', $this->tabelaJuros)
            ->with('limiteNecessario', $lmtNecessario)
            ->with('parcelaMensal', number_format($parcelaMensal, 2))
            ->with('valorDoEmprestimo', number_format($valorSolicitado, 2))
            ->with('tabelaDeCalculo', $tabelaDeCalculo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request->all());
        $proposta_id = $request->input('proposta_id');
        $cliente = DB::table('clientes')
            ->join('enderecos', 'enderecos.cliente_id', '=', 'clientes.id')
            ->join('telefones', 'telefones.cliente_id', '=', 'clientes.id')
            ->join('emails', 'emails.cliente_id', '=', 'clientes.id')
            ->join('dados_bancarios', 'dados_bancarios.cliente_id', '=', 'clientes.id')
            ->join('propostas', 'propostas.cliente_id', '=', 'clientes.id')
            ->join('franquias', 'franquias.id', '=', 'propostas.franquia_id')
            ->join('atendentes', 'atendentes.id', '=', 'propostas.atendente_id')
            ->where('propostas.id', $proposta_id)->get();

        return view('proposta.show')
            ->with('cliente', $cliente)
            ->with('tabelaJuros', $this->tabelaJuros)
            ->with('proposta_id', $proposta_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
