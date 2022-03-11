@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($errors->any())
                    @foreach( $errors->all() as $erro)
                        <div class="alert alert-danger">
                            {{ $erro }}
                        </div>
                    @endforeach
                @endif

                <div class="card mt-3" id="formulario-pergunta">
                    <div class="card-header">
                        <h4 class="card-title">Adicionando documentos à proposta {{-- {{ $dadosCliente->nomeCompleto }} --}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('documento.store') }}" class="form-group" method="post" enctype="multipart/form-data">
                            @csrf
                            {{--
                                <input id="idCliente" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                <input id="tkCliente" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                <input id="idProposta" value="{{ $dadosCliente->proposta_id }}" name="proposta_id" type="hidden">
                                --}}
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-images"></i></span>
                                        <input class="form-control" type="file" name="nomeDocumento">
                                    </div>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="bi bi-file-earmark-arrow-up"></i></span>
                                      <select name="tipoDocumento" class="form-select">
                                        <option selected>Selecione o tipo de Arquivo...</option>
                                        <option value="RG do Cliente">RG do Cliente</option>
                                        <option value="CPF do Cliente">CPF do Cliente</option>
                                        <option value="Carteira de Habilitação">Carteira de Habilitação</option>
                                        <hr class="dropdown-divider">
                                        <option value="Extrato INSS">Extrato INSS</option>
                                        <option value="Contra Cheque">Contra Cheque</option>
                                        <option value="Comprovante Bancário">Comprovante Bancário</option>
                                        <hr class="dropdown-divider">
                                        <option value="RG do Rogado">RG do Rogado</option>
                                        <option value="CPF do Rogado">CPF do Rogado</option>
                                        <hr class="dropdown-divider">
                                        <option value="Foto do Cliente com Contrato Assinado">Foto do Cliente com Contrato Assinado</option>
                                        <option value="Contrato Assinado">Contrato Assinado</option>
                                    </select>
                                    </div>
                                    <p>Tamanho máximo do arquivo: 5mb <br>
                                    Tipos permitidos: JPG, JPEG, PNG e PDF</p>

                                  </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Salvar</button>
                            </div>
                            </form>
                    </div>
                    <div class="card-footer mf-5">

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
