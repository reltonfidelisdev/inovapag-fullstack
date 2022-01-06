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
                    <div class="card" id="form-endereco">
                        <form action="/eneco/create/" method="POST">
                        @foreach($cliente as $dadosCliente)
                            <div class="card-header">
                                <h4 class="card-title">Perfil de {{ $dadosCliente->nomeCompleto }}</h4>
                            </div>
                            <div class="card-body">
                                @php
                                    $ultimos6caracteresCpf = substr($dadosCliente->cpf, -6);
                                    $ultimos6caracteresCpf = '***.***.' . $ultimos6caracteresCpf;
                                @endphp
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nome Completo </label>
                                        <input type="text" value="{{ $dadosCliente->nomeCompleto }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">CPF </label>
                                        <input type="text" value="{{ $ultimos6caracteresCpf }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">RG </label>
                                        <input type="text" value="{{ $dadosCliente->rg }}"class="form-control" disabled>
                                    </div>
                                    <hr>
                                    @if ( $dadosCliente->logradouro !== null )
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Endereço: </label>
                                        <input type="text" value="{{ $dadosCliente->logradouro }}, Nº {{ $dadosCliente->numero }}, CEP:{{ $dadosCliente->cep }}"class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Bairro: </label>
                                        <input type="text" value="{{ $dadosCliente->bairro }}"class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cidade: </label>
                                        <input type="text" value="{{ $dadosCliente->cidade }} / {{ $dadosCliente->estado }}"class="form-control" disabled>
                                    </div>
                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Complemento</label>
                                        <input type="text" value="{{ $dadosCliente->complemento }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Ponto de Referência</label>
                                        <input type="text" value="{{ $dadosCliente->pontoReferencia }}" class="form-control" disabled>
                                    </div>
                                    @endif

                                    @if ( $dadosCliente->celularPrincipal !== null )
                                    <hr>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Celular</label>
                                        <input type="text" value="{{ $dadosCliente->celularPrincipal }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Fixo</label>
                                        <input type="text" value="{{ $dadosCliente->fixoProprio }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Recados:</label>
                                        <input type="text" value="{{ $dadosCliente->fixoRecados }}" class="form-control" disabled>
                                    </div>
                                    @endif
                                    @if ( $dadosCliente->emailPrincipal !== null )
                                    <hr>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Principal </label>
                                        <input type="text" value="{{ $dadosCliente->emailPrincipal }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Secundário</label>
                                        <input type="text" value="{{ $dadosCliente->emailSecundario }}" class="form-control" disabled>
                                    </div>
                                    @endif
                                    @if ( $dadosCliente->codigoBanco !== null )
                                    <hr>
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Instituição</label>
                                        <input type="text" value="{{ $dadosCliente->nomeBanco }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tipo de Conta</label>
                                        <input type="text" value="{{ $dadosCliente->tipoConta }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label class="form-label">Agência</label>
                                        <input type="text" value="{{ $dadosCliente->agenciaComDigito }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">Conta:</label>
                                        <input type="text" value="{{ $dadosCliente->contaComDigito }} " class="form-control" disabled>
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3 mt-2">

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
