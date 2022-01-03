<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    private $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listClientes = Cliente::orderBy('id', 'DESC')->get();
        //dd($listClientes);
        return view('cliente.list')->with('cliente', $listClientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $validate = [
            'nomeCompleto' => 'required|min:3|max:150',
            'cpf' => 'unique:clientes,cpf',
            'rg' => 'min:7|max:15'
        ];
        $messages = [
            'nomeCompleto.required' => 'O campo Nome Completo deve ser preenchido.',
            'nomeCompleto.min' => 'O campo Nome Completo deve ter no mínimo 3 caracteres.',
            'nomeCompleto.max' => 'O campo Nome Completo deve ter no máximo 150 caracteres.',
            'cpf.unique' => 'Já existe um cliente com este CPF',
            'rg.min' => 'O RG deve ter no mínimo 7 caracteres',
            'rg.max' => 'O RG deve ter no máximo 15 caracteres'
        ];
        $request->validate($validate, $messages);
        $clienteExiste = $cliente->where('cpf', $request->input('cpf'))->get();

        $cliente->uid = (string) Uuid::uuid4();
        $cliente->nomeCompleto = $request->input('nomeCompleto');
        $cliente->cpf = $request->input('cpf');
        $cliente->rg = $request->input('rg');
        $cliente->dataNascimento = $request->input('dataNascimento');
        $cliente->sexo = $request->input('sexo');
        $cliente->grauEscolaridade = $request->input('grauEscolaridade');
        try {
            $cliente->save();
            return redirect('/cliente/show/' . $cliente->uid);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function show(Request $request, $uid)
    {
        $clienteExiste = DB::table('clientes')
            ->leftJoin('enderecos', 'enderecos.cliente_id', '=', 'clientes.id')
            ->leftJoin('telefones', 'telefones.cliente_id', '=', 'clientes.id')
            ->leftJoin('emails', 'emails.cliente_id', '=', 'clientes.id')
            ->where('clientes.uid', $uid)->get();
        //dd($clienteExiste);
        // Cliente::where('uid', $uid)->get();
        return view('cliente.show')->with('cliente', $clienteExiste);
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
