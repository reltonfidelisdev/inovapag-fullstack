<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelefoneController extends Controller
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
        //dd($cliente);
        return view('telefone.create')->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telefone = new Telefone();
        $telefone->cliente_id = $request->input('cliente_id');
        $telefone->celularPrincipal = $request->input('celularPrincipal');
        $telefone->fixoProprio = $request->input('fixoProprio');
        $telefone->fixoRecados = $request->input('fixoRecados');

        $validate = [
            'cliente_id' => 'unique:telefones,id|required|min:1',
            'celularPrincipal' => 'min:15|max:15'
        ];
        $messages = [
            'cliente_id' => 'Já existe telefones salvos para este cliente',
            'celularPrincipal.min' => 'Telefone Principal inválido! Siga o padrão (11) 98765-4321'
        ];
        $request->validate($validate, $messages);

        try {
            $telefone->save();
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
