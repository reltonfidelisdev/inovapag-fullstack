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
                        @foreach($cliente as $newCliente)
                            <div class="card-header">
                                <h4 class="card-title">{{ $newCliente->nomeCompleto }}</h4>
                            </div>
                            <div class="card-body">
                                <p>CPF: {{ $newCliente->cpf }}</p>
                                <hr>
                                <div class="mb-3 mt-2">
                                    @if ( $newCliente->logradouro !== null )
                                    <p><b>Endereço:</b> {{ $newCliente->logradouro }},{{ $newCliente->numero }}, {{ $newCliente->cep }},
                                        {{ $newCliente->bairro }}, {{ $newCliente->cidade }} / {{ $newCliente->estado }}
                                    </p>
                                    <hr>
                                    <p>
                                        <b>Complemento:</b> {{ $newCliente->complemento }}
                                    </p>
                                    <hr>
                                    <p>
                                        <b>Ponto de Referência:</b> {{ $newCliente->pontoReferencia }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Adicionar informações do cliente:</p>
                                @if ($newCliente->logradouro == null)
                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $newCliente->uid }}"><i class="bi bi-map"></i> Endereço</a>
                                @endif
                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $newCliente->uid }}"><i class="bi bi-telephone"></i> Telefones</a>
                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $newCliente->uid }}"><i class="bi bi-map"></i> Emails</a>
                                <a class="btn btn-success" href=" {{ "/endereco/create/" . $newCliente->uid }}"><i class="bi bi-map"></i> Dados Bancários</a>


                            </div>
                            @endforeach
                        </form>
                    </div>
                @endif()
            </div>
        </div>
    </div>
@endsection
