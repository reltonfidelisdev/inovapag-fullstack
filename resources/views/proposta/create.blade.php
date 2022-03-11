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
                                <form class="row g-3 mt-3" action="{{ route('proposta.store') }}" method="post">
                                    @csrf
                                    <input id="idCliente" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                    <input id="uidCliente" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">

                                    <div class="col-md-12">
                                        <h1>Solicitar Empréstimo no Cartão de Crédito</h1>
                                        <hr>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="labelNomeCompleto" class="form-label">Nome Completo</label>
                                        <input type="text" value="{{ $dadosCliente->nomeCompleto }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        @php
                                            $ultimos6caracteresCpf = substr($dadosCliente->cpf, -6);
                                            $ultimos6caracteresCpf = '***.***.' . $ultimos6caracteresCpf;
                                        @endphp
                                        <label for="labelCPF" class="form-label">CPF</label>
                                        <input type="text" value="{{ $ultimos6caracteresCpf }}" class="form-control" disabled>
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
                                        <div class="col-md-2">
                                        <label for="inputListaBanco" class="form-label">Banco</label>
                                        <input type="text" value="{{ $dadosCliente->nomeBanco }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputTipoConta" class="form-label">Tipo de Conta</label>
                                        <input type="text" value="{{ $dadosCliente->tipoConta }}" class="form-control" disabled>
                                    </div>
                                    <!-- FIm Dados Bancarios -->
                                    <!-- Parcelamento -->
                                    <!-- valorDoEmprestimo: number, limiteNecessario: number, status: string, parcelaMensal: number, tabelaDeCalculo: number, quantidadeDeParcelas : number  -->

                                        <div class="col-md-2">
                                            <label for="valorDoEmprestimo" class="form-label">Valor Solicitado</label>
                                        <input type="text" required name="valorDoEmprestimo" class="form-control money3" id="inputValorCredito"  placeholder="Ex: 2000,00">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputTabelaDeCalculo" class="form-label">Tabela de Cálculo</label>
                                            <select name="tabelaDeCalculo" id="inputTabelaDeCalculo" class="form-select">
                                                @if ($tabelaJuros)
                                                    @foreach ($tabelaJuros as $key => $value)
                                                    <option selected value='{{ $value }}'>{{ $key }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-12 padding-footer">
                                            <button type="submit" class="btn btn-success d-grid gap-2 col-4 mx-auto float-end">Salvar Proposta para Formalização</button>
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
@endsection
