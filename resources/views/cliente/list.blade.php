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
                        @foreach($cliente as $newCliente)
                        <div class="card mt-3" id="formulario-pergunta">

                                <div class="card-header">
                                    <h4 class="card-title">{{ $newCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                    <p>CPF: {{ $newCliente->cpf }}</p>
                                    <hr>
                                    <div class="mb-3 mt-2">
                                    </div>
                                </div>
                                <div class="card-footer mf-5">
                                    <input type="hidden" name="perguntaId" value="<%= arrayCliente.id %>">
                                    <h3>Adicionar informações do cliente:</h3>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLoginTelefone" ><i class="bi bi-telephone"></i> Telefone</a>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEndereco"><i class="bi bi-geo-alt"></i> Endereço</a>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEmailCliente"><i class="bi bi-mailbox"></i> Email</a>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalContaBancaria"><i class="bi bi-bank"></i> Conta Bancária</a>

                                </div>

                        </div>
                        @endforeach
                    @endif()
            </div>
        </div>
    </div>
@endsection
