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
                                    <h4 class="card-title">{{ $dadosCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                    @php
                                    $ultimos6caracteresCpf = substr($dadosCliente->cpf, -6);
                                    $ultimos6caracterespf = '***.***.' . $ultimos6caracteresCpf;
                                    @endphp
                                    <input type="text" value="CPF: {{ $ultimos6caracterespf }}" class="form-control" disabled>
                                    <hr>
                                    <div class="mb-3 mt-2">
                                        <a class="btn btn-success float-end" href="{{ "/cliente/show/" . $dadosCliente->uid }}"><i class="bi bi-link"></i> Acessar Perfil</a>
                                    </div>
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
