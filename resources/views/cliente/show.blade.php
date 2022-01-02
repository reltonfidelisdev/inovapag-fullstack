@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errors->any())
                    @foreach( $errors->all() as $erro)
                        <div class="alert alert-danger">
                            {{ $erro }}
                        </div>
                    @endforeach
                @endif
                @if($cliente)
                    <div class="card" id="formulario-pergunta">
                        <form action="/responder" method="POST">
                        @foreach($cliente as $newCliente)
                            <div class="card-header">
                                <h4 class="card-title">{{ $newCliente->nomeCompleto }}</h4>
                            </div>
                            <div class="card-body">
                                <p>CPF: {{ $newCliente->cpf }}</p>
                                <hr>
                                <div class="mb-3 mt-2">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="perguntaId" value="<%= arrayCliente.id %>">
                                <h3>Adicionar informações do cliente:</h3>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLoginTelefone" ><i class="bi bi-telephone"></i> Telefone</a>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEndereco"><i class="bi bi-geo-alt"></i> Endereço</a>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEmailCliente"><i class="bi bi-mailbox"></i> Email</a>
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalContaBancaria"><i class="bi bi-bank"></i> Conta Bancária</a>
                                <button type="submit" class="btn btn-primary float-end">Preencher Resposta</button>
                                <hr>
                                <span>Voce precisa informar chave abaixo para alterar um cadastro</span>
                                <hr>
                                <p></p>
                                <button type="button" class="btn btn-primary" id="liveToastBtn">Mostrar chave única do cliente</button>

                                <div class="position-fixed bottom-5 end-0 p-3" style="z-index: 11">
                                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <strong class="me-auto">Copie Rapidamente o código</strong>
                                            <small><a href="#">O que é isso?</a></small>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ $newCliente->nomeCompleto }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </form>
                    </div>
                @endif()
            </div>
        </div>
    </div>
@endsection
