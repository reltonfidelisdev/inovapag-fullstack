@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-3" id="formulario-pergunta">

                    <div class="card-header">
                        <h4 class="card-title">Mensagem do sistema</h4>
                    </div>
                    <div class="card-body">
                    @if($successMessage ?? '')
                        <div class="alert alert-success">
                            {{ $successMessage }}
                        </div>
                    @endif

                    </div>
                    <div class="card-footer mf-5">
                        <a href="{{ route('proposta.list')}}" class="btn btn-danger float-start">Tem algo errado! Preciso de ajuda</a>
                        <a href="{{ route('proposta.list')}}" class="btn btn-success float-end">Clique aqui para continuar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
