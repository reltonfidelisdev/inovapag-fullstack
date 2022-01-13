<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imprimirpropostacc(Request $request)
    {
        //dd($request->all());
        $proposta = DB::table('clientes')
            ->join('enderecos', 'enderecos.cliente_id', '=', 'clientes.id')
            ->join('dados_bancarios', 'dados_bancarios.cliente_id', '=', 'clientes.id')
            ->join('propostas', 'propostas.cliente_id', '=', 'clientes.id')
            ->join('franquias', 'franquias.id', '=', 'propostas.franquia_id')
            ->join('atendentes', 'atendentes.id', '=', 'propostas.atendente_id')
            ->where('propostas.id', $request->input('proposta_id'))
            ->orderBy('propostas.id', 'DESC')
            ->get();


        //dd($proposta);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_sifned' => TRUE,
            ],
        ]);



        $pdf = PDF::loadView('proposta.gerar_pdf.imprimir-proposta-cc', ['proposta' => $proposta]);
        PDF::setOptions([
            'dpi' => 300,
            'defaultFont' => 'thoma',
            'isHTML5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        $pdf->getDomPDF()->setHttpContext($context);

        return $pdf->download('proposta-cc.pdf');

        // return view('proposta.gerar_pdf.imprimir-proposta-cc')
        //     ->with('proposta', $proposta);
    }
}
