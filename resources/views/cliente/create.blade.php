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
                <form class="row g-3 mt-3" action="/cliente/store" method="POST" enctype="application/x-www-form-urlencoded">
                   @csrf
                    <div class="col-md-12">
                        <h1>Dados Pessosais</h1>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCPF" class="form-label">CPF do Cliente</label>
                        <input type="text" name='cpf' value="{{ old('cpf') }}" class="form-control cpf" id="cpf" required placeholder="Ex: 987.654.321-00">
                    </div>
                    <div class="col-md-6">
                        <label for="inputRG" class="form-label">RG</label>
                        <input type="text" value="{{ old('rg') }}" class="form-control" name="rg" required placeholder="Ex: 98.765.432-1">
                    </div>
                    <div class="col-12">
                        <label for="inputNomeCompleto" class="form-label">Nome Completo</label>
                        <input type="text" value="{{ old('nomeCompleto') }}" class="form-control nomeCompleto" name="nomeCompleto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" value="{{ old('dataNascimento') }}" required class="form-control" name="dataNascimento" placeholder="EX: 26/08/1986">
                    </div>
                    <div class="col-md-4">
                        <label for="inputSexo" class="form-label">Sexo</label>
                        <select required name="sexo" class="form-select">
                            <option ></option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputGrauEscolaridade" class="form-label">Grau de Escolaridade</label>
                        <select required name="grauEscolaridade" class="form-select">
                            <option ></option>
                            <option value="Não Alfabetizado">Não Alfabetizado</option>
                            <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                            <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                            <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                            <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                            <option value="Superior Incompleto">Superior Incompleto</option>
                            <option value="Superior Completo">Superior Completo</option>
                            <option value="Pós Graduação Incompleto">Pós Graduação Incompleto</option>
                            <option value="Pós Graduado">Pós Graduado</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3 mb-5">
                        <button type="submit" class="btn btn-success float-end">Salvar e Avançar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>

@endsection
