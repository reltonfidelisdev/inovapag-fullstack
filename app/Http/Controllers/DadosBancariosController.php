<?php

namespace App\Http\Controllers;

use App\Models\DadosBancarios;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DadosBancariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uid)
    {
        $cliente = DB::table('clientes')
            ->where('uid', $uid)
            ->get();
        //dd($dadosBancarios->getAttributes());
        return view('dados_bancarios.create')->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $str = $request->input('codigoBanco');
        $nomeBanco = explode(' - ', $str);

        $dadosBancarios = new DadosBancarios();
        $dadosBancarios->nomeBanco = $nomeBanco[1];
        $dadosBancarios->cliente_id = $request->input('cliente_id');
        $dadosBancarios->codigoBanco = $nomeBanco[0];
        $dadosBancarios->tipoConta = $request->input('tipoConta');
        $dadosBancarios->agenciaComDigito = $request->input('agenciaComDigito');
        $dadosBancarios->contaComDigito = $request->input('contaComDigito');
        //dd($dadosBancarios->getAttributes());
        $validate = [
            'nomeBanco' => 'min:3|max:50',
            'tipoConta' => 'min:1|max:1',
            'agenciaComDigito' => 'min:3|max:15',
            'contaComDigito' => 'min:3|max:15'
        ];
        $messages = [
            'nomeBanco.min' => 'O Nome do Banco deve ter no mínimo 3 caracteres',
            'nomeBanco.max' => 'O Nome do Banco deve ter no máximo 50 caracteres',
            'tipoConta.min' => 'O Tipo de Conta deve ter no mínimo 1 caractere',
            'tipoConta.max' => 'O Tipo de Conta deve ter no máximo 1 caractere',
            'agenciaComDigito.min' => 'A Agência deve ter no mínimo 3 caracteres',
            'agenciaComDigito.max' => 'A Agência deve ter no máximo 15 caracteres',
            'contaComDigito.min' => 'A Conta deve ter no mínimo 3 caracteres',
            'contaComDigito.max' => 'A Conta deve ter no máximo 15 caracteres'
        ];
        $request->validate($validate, $messages);
        try {
            $dadosBancarios->save();
            return redirect('/cliente/show/' . $request->uid);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
