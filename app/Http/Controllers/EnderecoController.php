<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Endereco;
use Exception;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Display a listing of the resource.';
    }

    /**
     * ''''''''Show the form for creating a new resource.''''''''
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uid)
    {
        $cliente = DB::table('clientes')
            ->where('uid', $uid)
            ->get();
        //dd($cliente);
        return view('endereco.create')->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = DB::table('clientes')
            ->where('id', $request->input('cliente_id'))->get();


        //dd($request->all());
        $endereco = new Endereco();
        $endereco->cliente_id = $request->input('cliente_id');
        $endereco->estado = $request->input('estado');
        $endereco->cidade = $request->input('cidade');
        $endereco->bairro = $request->input('bairro');
        $endereco->logradouro = $request->input('logradouro');
        $endereco->complemento = $request->input('complemento');
        $endereco->numero = $request->input('numero');
        $endereco->cep = $request->input('cep');
        $endereco->pontoReferencia = $request->input('pontoReferencia');

        try {
            $endereco->save();
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
