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
            ->where('propostas.id', $request->input('proposta_id'))
            ->orderBy('propostas.id', 'DESC')
            ->get();


        //dd($data);


        //PDF::setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif']);
        //$pdf = PDF::loadView('proposta.geradores_pdf.Contrato_CartaoCredito_PDF', ['proposta' => $proposta]);

        //return $pdf->download('itsolutionstuff.pdf');

        return view('proposta.gerar_pdf.imprimir-proposta-cc')
            ->with('proposta', $proposta);
    }
}
