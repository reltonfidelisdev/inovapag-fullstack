<?php

namespace App\Http\Controllers;

use App\Models\DocumentoProposta;
use App\Models\Proposta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentoPropostaController extends Controller
{
    private $idDaProposta;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->proposta_id);

        $clienteUID = $request->uid;
        $propostaId = (int)$request->proposta_id;

        $documentos = DB::table('documento_proposta')
            ->select('documento_proposta.id as idDocumento', 'statusDocumento', 'nomeDocumento', 'tipoDocumento')
            ->join('propostas', 'propostas.id', 'documento_proposta.proposta_id')
            ->join('atendentes', 'atendentes.id', 'propostas.atendente_id')
            ->join('clientes', 'clientes.id',  'propostas.cliente_id')
            ->where('clientes.uid', $clienteUID)
            ->where('propostas.id', $propostaId)
            ->orderBy('idDocumento', 'DESC')
            ->get();

        //dd($documentos);

        return view('documentos_proposta.list')->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
        return view('documentos_proposta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validate = [
            'nomeDocumento' => 'mimes:jpg,jpeg|required',
        ];
        $messages = [
            'nomeDocumento.mimes' => 'o tipo de arquivo é inválido'
        ];
        $request->validate($validate, $messages);

        $clienteUID = $request->input('uid');
        $propostaId = (int)$request->input('proposta_id');
        $tipoDocumento = $request->input('tipoDocumento');

        $proposta_id_on_db = DB::table('propostas')->select('propostas.id as idDaProposta')
            ->join('atendentes', 'atendentes.id', 'propostas.atendente_id')
            ->join('clientes', 'clientes.id',  'propostas.cliente_id')
            ->where('clientes.uid', $clienteUID)
            ->where('propostas.id', $propostaId)->get();

        foreach ($proposta_id_on_db as $p) {
            $this->idDaProposta = (int)$p->idDaProposta;
        }

        if ($propostaId === $this->idDaProposta) {
            // var_dump($this->idDaProposta, $propostaId);
            // exit;
            if ($request->hasFile('nomeDocumento')) {

                try {
                    $fileName = $request->file('nomeDocumento')
                        ->store("documento_proposta/$clienteUID/$propostaId");
                    //$img = '<img src="' . Storage::url($fileName) . '" style="width:300px">';

                    $documentoProposta = new DocumentoProposta();
                    $documentoProposta->statusDocumento = 'Enviado';
                    $documentoProposta->proposta_id = $propostaId;
                    $documentoProposta->nomeDocumento = $fileName;
                    $documentoProposta->tipoDocumento = $tipoDocumento;

                    try {
                        $documentoProposta->save();
                        $successMessage = 'Arquivo salvo com sucesso!';
                        return view('feedback.success')->with('successMessage', $successMessage);
                    } catch (\Exception $e) {
                        throw new Exception($e->getMessage());
                    }

                    // echo $img;
                    // return $fileName;
                } catch (\Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }
        } else {
            $errorMessage = 'ID da propostas nã é o mesmo!';
            return view('proposta.list')->with('errorMessage', $errorMessage);
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
