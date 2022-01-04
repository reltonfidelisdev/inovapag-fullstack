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
                        @foreach($cliente as $dadosCliente)
                            <div class="card-header">
                                <h4 class="card-title">Perfil de {{ $dadosCliente->nomeCompleto }}</h4>
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
                                    @if ( $dadosCliente->codigoBanco !== null )
                                    <hr>
                                    <p><b>Instituição:</b>
                                        {{ $dadosCliente->nomeBanco }}
                                        <b>Tipo de Conta:</b> {{ $dadosCliente->tipoConta }}
                                        <b>Agencia:</b> {{ $dadosCliente->agenciaComDigito }}
                                        <b>Conta:</b> {{ $dadosCliente->contaComDigito }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                @if ($dadosCliente->logradouro == null)
                                <a class="btn btn-success mt-1 mb-1" href=" {{ "/endereco/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Cadastrar Endereço</a>
                                @endif
                                @if ($dadosCliente->celularPrincipal == null)
                                <a class="btn btn-success mt-1 mb-1" href=" {{ "/telefone/create/" . $dadosCliente->uid }}"><i class="bi bi-telephone"></i> Cadastrar Telefones</a>
                                @endif
                                @if ($dadosCliente->emailPrincipal == null)
                                <a class="btn btn-success mt-1 mb-1" href=" {{ "/email/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Cadastrar Emails</a>
                                @endif
                                @if ($dadosCliente->codigoBanco == null)
                                <a class="btn btn-success mt-1 mb-1" href=" {{ "/dados-bancarios/create/" . $dadosCliente->uid }}"><i class="bi bi-map"></i> Cadastrar Dados Bancários</a>
                                @endif
                                </div>

                                @if (
                                $dadosCliente->codigoBanco !== null &&
                                $dadosCliente->emailPrincipal !== null &&
                                $dadosCliente->celularPrincipal !== null &&
                                $dadosCliente->logradouro !== null
                                )
                                <div class="d-grid gap-2 mt-1 mb-1">
                                    <a class="btn btn-success" href=" {{ "/proposta/create/" . $dadosCliente->uid }}"><i class="bi bi-coin"></i> Preencher Proposta</a>
                                </div>
                                @endif

                            </div>
                            @endforeach
                        </form>
                    </div>
                @endif()
            </div>
        </div>

    </div>
@endsection
