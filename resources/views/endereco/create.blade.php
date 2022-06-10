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
                                    <h4 class="card-title">Informe o endereço de {{ $dadosCliente->nomeCompleto }}</h4>
                                </div>
                                <div class="card-body">
                                        <form action="{{ route('endereco.store') }}" class="form-group" method="POST">
                                            @csrf
                                            <input id="idClienteEndereco" value="{{ $dadosCliente->id }}" name="cliente_id" type="hidden">
                                            <input id="tkClienteEndereco" value="{{ $dadosCliente->uid }}" name="uid" type="hidden">
                                            <div class="modal-body">
                                            <span class="text-danger">Informação Requerida</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">CEP</span>
                                                    <input type="text" name="cep" class="form-control cep" required placeholder="53110-080">
                                                    <span class="input-group-text">Nº</span>
                                                    <input type="text" name="numero" class="form-control" required placeholder="20A">
                                                </div>
                                                <span class="text-danger">Informação Requerida</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-signpost"></i></span>
                                                    <input type="text" name="logradouro" class="form-control" required placeholder="Informe a rua ou avenida">
                                                </div>
                                                <span class="text-danger">Informação Requerida</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-geo-alt"></i></span>
                                                    <select name="estado" required class="form-select">
                                                        <option value="">Selecione o Estado</option>
                                                        <option value="AC">Acre</option><option value="AL">Alagoas</option><option value="AP">Amapá</option><option value="AM">Amazonas</option><option value="BA">Bahia</option><option value="CE">Ceará</option><option value="ES">Espírito Santo</option><option value="MA">Maranhão</option><option value="MT">Mato Grosso</option><option value="MS">Mato Grosso do Sul</option><option value="MG">Minas Gerais</option><option value="PA">Pará</option><option value="PB">Paraíba</option><option value="PR">Paraná</option><option value="PE">Pernambuco</option><option value="PI">Piauí</option><option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option><option value="RS">Rio Grande do Sul</option><option value="RO">Rondônia</option><option value="RR">Roraima</option><option value="SC">Santa Catarina</option><option value="SP">São Paulo</option><option value="TO">Tocantins</option>
                                                    </select>
                                                </div>
                                                <span class="text-danger">Informação Requerida</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-map"></i></span>
                                                    <input maxlength="100" name="cidade" type="text" class="form-control" required placeholder="Informe a Cidade">
                                                </div>
                                                <span class="text-danger">Informação Requerida</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-geo"></i></span>
                                                    <input maxlength="100" name="bairro" type="text" class="form-control" required placeholder="Informe o Bairro">
                                                </div>
                                                <span class="text-success">Informação Opcional</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-pin-map"></i></span>
                                                    <input type="text" name="complemento" class="form-control" placeholder="Complemento, ex: Bloco 04, AP 404">
                                                </div>
                                                <span class="text-success">Informação Opcional</span>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" ><i class="bi bi-signpost-split"></i></span>
                                                    <input type="text" name="pontoReferencia" class="form-control" placeholder="Ponto de referência">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success float-end"><i class="bi bi-check2-square"></i> Salvar Endereço</button>
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
