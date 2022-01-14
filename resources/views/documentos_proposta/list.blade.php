@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-3" id="formulario-pergunta">

                    <div class="card-header">
                        <h4 class="card-title">Arquivos da Proposta</h4>
                    </div>
                    <div class="card-body">

                        <div class="col-md12">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Documento</th>
                                <th class="text-end" scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($documentos ?? '')

                                @foreach($documentos as $documento)
                                    <tr>
                                        {{--
                                            @dd($documentos)
                                            --}}
                                        <th scope="row">#{{$documento->idDocumento}}</th>
                                        <th><span class="badge bg-secondary">{{$documento->statusDocumento}}</span></th>
                                        <td>
                                            {{$documento->tipoDocumento}}
                                        </td>
                                        <td>
                                            <form action="/proposta/show/uid/proposta_id" method="post">
                                                @csrf
                                                <input id="idCliente" value="proposta_id" name="proposta_id" type="hidden">
                                                <input id="tkCliente" value="proposta_uid" name="uid" type="hidden">

                                                {{-- <a href="#" class="btn btn-danger btn-sm m-lg-1 float-end">
                                                    <i class="bi bi-trash"></i>
                                                </a> --}}

                                                <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm m-lg-1 float-end"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{$documento->idDocumento}}">
                                            <i class="bi bi-eye"></i>
                                            </button>
                                            </form>
                                    </tr>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$documento->idDocumento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Id do documento: {{$documento->idDocumento}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">
                                                <img src="http://127.0.0.1:8000/storage/{{$documento->nomeDocumento}}" style="max-width: 100%">
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar Janela</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
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
