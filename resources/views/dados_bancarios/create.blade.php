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
                                    <h4 class="card-title">Dados Bancários de {{ $dadosCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('dados-bancarios.store') }}" class="form-group" method="post">
                                        @csrf
                                        <input id="idClienteTelefone" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                        <input id="tkClienteTelefone" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                            <div class="modal-body">
                                              <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-bank"></i></span>
                                                  <select required class="form-select" name="codigoBanco" aria-label="Selecione a Instituição Bancária">
                                                    <option value="">Selecione o Banco</option>
                                                    @if ($bancos)
                                                        @foreach ($bancos as $banco)
                                                            <option value="{{$banco->compe}} - {{$banco->razao_social}}">{{$banco->compe}} - {{$banco->razao_social}}</option>
                                                        @endforeach
                                                    @endif
                                                  </select>
                                              </div>
                                              <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-piggy-bank"></i></span>
                                                <select required class="form-select" name="tipoConta" aria-label="Default select example">
                                                  <option></option>
                                                  <option value="Conta de Pagamento - Digital">Conta de Pagamentos - Digital</option>
                                                  <option value="Conta Corrente">Conta Corrente</option>
                                                  <option value="Conta Salário">Conta Salário</option>
                                                  <option value="Conta Poupança">Conta Poupança</option>
                                                  <option value="Conta Conjunta">Conta Conjunta</option>
                                                  <option value="Conta Empresa - PJ">Conta Empresa - PJ</option>
                                                </select>
                                            </div>
                                              <div class="input-group mb-3">
                                                <span class="input-group-text">Agência</span>
                                                <input type="text" name="agenciaComDigito" class="form-control" placeholder="0987-1" aria-label="0987-1">
                                                <span class="input-group-text">Conta</span>
                                                <input type="text" name="contaComDigito" class="form-control" placeholder="000012345-9" aria-label="000012345-9">
                                              </div>


                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"><i class="be bi-check"></i> Salvar</button>
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
