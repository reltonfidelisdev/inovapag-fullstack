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
                                    <h4 class="card-title">Informe os telefones de {{ $dadosCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('telefone.store') }}" class="form-group" method="post">
                                        @csrf
                                        <input id="idCliente" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                        <input id="uidCliente" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                        <div class="modal-body">
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
                                            <input required name="celularPrincipal" maxlength="11" type="text" class="form-control sp_celphones" placeholder="Celular Principal">
                                          </div>
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-plus"></i></span>
                                            <input name="fixoProprio" maxlength="11" type="text" class="form-control phone" placeholder="Fixo Próprio">
                                          </div>
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-forward"></i></span>
                                            <input name="fixoRecados" maxlength="11" type="text" class="form-control phone" placeholder="Fixo Recados">
                                          </div>
                                          <p>É possível cadastrar apenas 3 números por cliente</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button data-bs-target="#my-modal" type="submit" class="btn btn-success"><i class="bi bi-check"></i> Salvar</button>
                                        </div>
                                      </form>
                                </div>
                                <div class="card-footer mf-5">

                                </div>

                            </div>
                        @endforeach
                    @endif()


            </div>
        </div>
    </div>
@endsection
