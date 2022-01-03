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
                    <div class="card" id="form-endereco">
                        <form action="/eneco/create/" method="POST">
                            <input type="hidden" name="">
                        @foreach($cliente as $dadosCliente)
                            <div class="card-header">
                                <h4 class="card-title">{{ $dadosCliente->nomeCompleto }}</h4>
                            </div>
                            <div class="card-body">
                                <p>CPF: {{ $dadosCliente->cpf }}</p>
                                <hr>
                                <div class="mb-3 mt-2">
                                    @if ( $dadosCliente->logradouro !== null )
                                    <p><b>Endereço:</b>
                                        {{ $dadosCliente->logradouro }},{{ $dadosCliente->numero }}, {{ $dadosCliente->cep }},
                                        {{ $dadosCliente->bairro }}, {{ $dadosCliente->cidade }} / {{ $dadosCliente->estado }}
                                    </p>
                                    <hr>
                                    <p><b>Complemento:</b> {{ $dadosCliente->complemento }}</p>
                                    <hr>
                                    <p><b>Ponto de Referência:</b> {{ $dadosCliente->pontoReferencia }}</p>
                                    @endif

                                    @if ( $dadosCliente->celularPrincipal !== null )
                                    <hr>
                                    <p><b>Celular:</b>
                                        {{ $dadosCliente->celularPrincipal }}
                                        <b>Fixo:</b> {{ $dadosCliente->fixoProprio }}
                                        <b>Recados:</b> {{ $dadosCliente->fixoRecados }}
                                    </p>
                                    @endif
                                    @if ( $dadosCliente->emailPrincipal !== null )
                                    <hr>
                                    <p><b>Email Principal:</b>
                                        {{ $dadosCliente->emailPrincipal }}
                                        <b>Email Secundário:</b> {{ $dadosCliente->emailSecundario }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Adicionar informações do cliente:</p>
                                @if ($dadosCliente->logradouro == null)
                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Endereço</a>
                                @endif
                                @if ($dadosCliente->celularPrincipal == null)
                                <a class="btn btn-success" href=" {{ "/telefone/create/" . $dadosCliente->uid }}"><i class="bi bi-telephone"></i> Telefones</a>
                                @endif
                                @if ($dadosCliente->emailPrincipal == null)
                                <a class="btn btn-success" href=" {{ "/email/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Emails</a>
                                @endif

                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Dados Bancários</a>


                            </div>
                            @endforeach
                        </form>
                    </div>
                @endif()
            </div>
        </div>
    </div>
@endsection
