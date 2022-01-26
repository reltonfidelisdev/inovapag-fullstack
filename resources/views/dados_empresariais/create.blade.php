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

                        @if($cliente)
                        @foreach($cliente as $dadosCliente)
                            <div class="card mt-3" id="formulario-pergunta">

                                <div class="card-header">
                                    <h4 class="card-title">Dados Empresariais </h4>
                                </div>
                                <div class="card-body">
                                    <form action="/dados-empresariais/store" class="form-group" method="post">
                                        @csrf
                                            <input id="idClienteTelefone" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                            <input id="tkClienteTelefone" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">

                                        <div class="modal-body">
                                          <div class="mb-3">
                                              <input required name="cnpj" maxlength="200" type="text" class="form-control cnpj" placeholder="60.873.288/0001-30">
                                          </div>
                                          <div class=" mb-3">
                                              <input required name="nomeEmpresarial" maxlength="200" type="text" class="form-control" placeholder="Nome Empresarial">
                                          </div>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Salvar</button>
                                        </div>
                                      </form>
                                </div>
                                <div class="card-footer mf-5">

                                </div>

                            </div>
                        @endforeach
                        @endif

            </div>
        </div>
    </div>
@endsection
