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
                <div class="card mt-3" id="formulario-pergunta">

                        <div class="card-header">
                            <h4 class="card-title">Lista de propostas</h4>
                        </div>
                        <div class="card-body">

                                <div class="col-md12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Data Digitação</th>
                                        <th scope="col">Nome do Cliente</th>
                                        <th class="text-end" scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @if($propostas ?? '')

                                    @foreach($propostas as $proposta)
                                        <tr>
                                            <th scope="row">#{{ $proposta->id }}</th>
                                            <th><span class="badge bg-secondary">Enviada</span></th>
                                            <td>{{ $proposta->created_at }}</td>
                                            <td>{{ $proposta->nomeCompleto }}</td>
                                            <td>
                                                <form action="/proposta/show/{{ $proposta->uid }}/{{ $proposta->id }}" method="post">
                                                    @csrf
                                                    <input id="idCliente" value="{{ $proposta->id }}" name="proposta_id" type="hidden">
                                                    <input id="tkCliente" value="{{ $proposta->uid }}" name="uid" type="hidden">

                                                    <button type="submit" class="btn btn-success btn-sm m-lg-1 float-end">
                                                        <i class="fa fa-eye"></i> Visualizar Proposta
                                                    </button>
                                                </form>
                                        </tr>

                                        @endforeach
                                        @endif()
                                    </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="card-footer mf-5">

                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
