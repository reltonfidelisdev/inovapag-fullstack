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
                        <h4 class="card-title">Calcular limite necessário</h4>
                    </div>
                    <div class="card-body">

                        <form class="row g-3 mt-3" method="post" action="{{ route('proposta.calculadora') }}">
                        @csrf
                        <div class="col-md-2">
                            <label for="valorDoEmprestimo" class="form-label">Valor Solicitado</label>
                        <input type="text" required name="valorDoEmprestimo" class="form-control money3" id="inputValorCredito"  placeholder="Ex: 2000,00">
                        </div>
                        <div class="col-md-3">
                            <label for="inputTabelaDeCalculo" class="form-label">Tabela de Cálculo</label>
                            <select name="tabelaDeCalculo" id="inputTabelaDeCalculo" class="form-select">
                                @if ($tabelaJuros)
                                    @foreach ($tabelaJuros as $key => $value)
                                    <option value='{{ $value }}'>{{ $key }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                            <div class="col-md-2">
                                <label for="labelParcelaMensal" class="form-label">Parcelamento (12x)</label>
                                <input type="text" value="R$ {{ $parcelaMensal ?? ''}}" class="form-control" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="labelLimiteNecessario" class="form-label">Limite Necessário</label>
                                <input type="text" value="R$ {{ $limiteNecessario ?? ''}}" class="form-control" disabled>

                                </span></h3>
                            </div>
                            <div class="col-md-3">
                                <label for="labelValorDoEmprestimo" class="form-label">A Liberar</label>
                                <input type="text" value="R$ {{ $valorDoEmprestimo ?? '' }}" class="form-control" disabled>
                            </div>
                            <div class="col-md-5">
                            <label for="labelTaxaDeJuros" class="form-label">Calcular Proposta</label>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" id="btnDubmit" type="submit">Calcular Agora</button>


                            </div></div>
                        </form>

                    </div>
                    <div class="card-footer mf-5">

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
