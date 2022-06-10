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
                                    <h4 class="card-title">Informe os emails de {{ $dadosCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('email.store') }}" class="form-group" method="post">
                                        @csrf
                                        <input id="idClienteTelefone" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                        <input id="tkClienteTelefone" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                        <input id="idClienteEmail" name="idCliente" hidden type="text">
                                        <div class="modal-body">
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-check"></i></span>
                                            <input required name="emailPrincipal" maxlength="200" type="text" class="form-control" placeholder="Email Principal">
                                          </div>
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-plus"></i></span>
                                            <input name="emailSecundario" maxlength="200" type="text" class="form-control" placeholder="Email secundário">
                                          </div>
                                          <p>É possível cadastrar apenas 2 emails por cliente</p>

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
                    @endif()


            </div>
        </div>
    </div>
@endsection
