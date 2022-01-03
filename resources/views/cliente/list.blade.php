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
                                        <a class="btn btn-success float-end" href="{{ "/cliente/show/" . $newCliente->uid }}"><i class="bi bi-link"></i> Acessar Perfil</a>
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
