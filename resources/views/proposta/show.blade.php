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
                @if($cliente && $tabelaJuros)

                    @foreach($cliente as $dadosCliente)
                        <div class="card mt-3" id="formulario-proposta">

                            <div class="card-header">
                                <h4 class="card-title">Salvar Propsta :: {{ $dadosCliente->nomeCompleto }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="row g-3 mt-3" action="{{ route('proposta.propostacc') }}" method="post">
                                    @csrf
                                    <input id="idCliente" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                    <input id="uidCliente" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                    <input id="idProposta" value="{{ $proposta_id ?? ''}}" name="proposta_id" type="hidden">
                                    <div class="col-md-12">
                                        <h1>Plano de Empréstimo: Cartão de Crédito</h1>
                                        <hr>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="labelNomeCompleto" class="form-label">Nome Completo</label>
                                        <input type="text" value="{{ $dadosCliente->nomeCompleto }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="labelCPF" class="form-label">CPF</label>
                                        @php
                                            $ultimos6caracteresCpf = substr($dadosCliente->cpf, -6);
                                            $ultimos6caracterespf = '***.***.' . $ultimos6caracteresCpf;
                                        @endphp
                                        <input type="text" value="{{ $ultimos6caracterespf }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="labelRG" class="form-label">RG</label>
                                        <input type="text" value="{{ $dadosCliente->rg }}" class="form-control" disabled>
                                    </div>
                                    <!-- Endereço -->
                                    <div class="col-md-2">
                                        <label for="inputListaEstados" class="form-label">Estado</label>
                                        <input type="text" value="{{ $dadosCliente->estado }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                    <label for="inputCidade" class="form-label">Cidade</label>
                                    <input type="text" value="{{ $dadosCliente->cidade }}" class="form-control" disabled>
                                </div>
                                <!--Fim Endereço  -->
                                    <!-- Dados Bancarios -->
                                    <div class="col-md-2">
                                        <label for="inputCidade" class="form-label">Agência</label>
                                        <input type="text" value="{{ $dadosCliente->agenciaComDigito }}" class="form-control" disabled>
                                    </div>

                                    <div class="col-md-2">
                                    <label for="inputcelularPrincipalConta" class="form-label">Conta</label>
                                    <input type="text" value="{{ $dadosCliente->contaComDigito }}" class="form-control" disabled>
                                </div>
                                        <div class="col-md-4">
                                        <label for="inputListaBanco" class="form-label">Banco</label>
                                        <input type="text" value="{{ $dadosCliente->nomeBanco }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputTipoConta" class="form-label">Tipo de Conta</label>
                                        <input type="text" value="{{ $dadosCliente->tipoConta }}" class="form-control" disabled>
                                    </div>
                                    <!-- FIm Dados Bancarios -->
                                    <!-- Parcelamento -->
                                    <!-- valorDoEmprestimo: number, limiteNecessario: number, status: string, parcelaMensal: number, tabelaDeCalculo: number, quantidadeDeParcelas : number  -->

                                    <div class="col-md-3">
                                        <label for="valorDoEmprestimo" class="form-label">Valor Solicitado</label>
                                        <input type="text" value="{{ $dadosCliente->valorSolicitado }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputTabelaDeCalculo" class="form-label">Parcelamento</label>
                                        <input type="text" value="{{ $dadosCliente->totalParcelas }} Parcelas de R$ {{ $dadosCliente->parcelaMensal }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputTabelaDeCalculo" class="form-label">Limite Necessário</label>
                                        <input type="text" value="R$ {{ $dadosCliente->limiteNecessario }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputTabelaDeCalculo" class="form-label">Base de Calculo</label>
                                        <input type="text" value="{{ $dadosCliente->taxaJuros }}% a.m" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-4 d-grid gap-2">
                                        <button type="button" class="btn btn-dark disabled" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-cloud-upload"></i>
                                            Anexar Arquivos
                                          </button>
                                    </div>
                                    <div class="col-md-4 d-grid gap-2">
                                        <a href="{{ route('documento.list')}}/{{ $dadosCliente->uid }}/{{ $proposta_id }} " class="btn btn-primary disabled">
                                            <i class="bi bi-eye"></i>
                                            Arquivos Enviados
                                          </a>
                                    </div>
                                    <div class="col-md-4 d-grid gap-2">
                                        <button type="submit"class="btn btn-success">
                                            <i class="bi bi-printer"></i>
                                            Imprimir Contrato</button>
                                    </div>
                                    </form>


                            </div>
                            <div class="card-footer mf-5">

                            </div>

                        </div>
                    @endforeach
                @endif()


            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anexar arquivos à proposta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('documento.store') }}" class="form-group" method="post" enctype="multipart/form-data">
                    @csrf
                        <input id="idCliente" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                        <input id="tkCliente" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                        <input id="idProposta" value="{{ $proposta_id }}" name="proposta_id" type="hidden">

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-file-earmark-arrow-up"></i></span>
                                <input required class="form-control" type="file" name="nomeDocumento">
                            </div>
                            <div class="mb-3">
                              <select name="tipoDocumento" class="form-select" required>
                                <option value="" selected>Selecione o tipo de arquivo...</option>
                                <option value="RG do Cliente">RG do Cliente</option>
                                <option value="CPF do Cliente">CPF do Cliente</option>
                                <option value="Carteira de Habilitação">Carteira de Habilitação</option>
                                <hr class="dropdown-divider">
                                <option value="Extrato INSS">Extrato INSS</option>
                                <option value="Contra Cheque">Contra Cheque</option>
                                <option value="Comprovante Bancário">Comprovante Bancário</option>
                                <hr class="dropdown-divider">
                                <option value="RG do Rogado">RG do Rogado</option>
                                <option value="CPF do Rogado">CPF do Rogado</option>
                                <hr class="dropdown-divider">
                                <option value="Foto do Cliente com Contrato Assinado">Foto do Cliente com Contrato Assinado</option>
                                <option value="Contrato Assinado">Contrato Assinado</option>
                            </select>
                            </div>
                            <p>Tamanho máximo do arquivo: 5mb <br>
                            Tipos permitidos: JPG e JPEG</p>

                          </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-arrow-up"></i> Enviar Documento</button>
                    </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
@endsection
