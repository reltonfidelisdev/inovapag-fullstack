<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin: 30px">
    @if($proposta)

        @foreach ($proposta as $dadosCliente)

    <h1>Termo de Adesão</h1>

    <p>
    Eu, <b>{{$dadosCliente->nomeCompleto}}</b>
    Brasileiro(a), inscrito(a) sob CPF nº {{$dadosCliente->cpf}}
    Residente e domiciliado em {{$dadosCliente->cidade}}/{{$dadosCliente->estado}}.
    </p>
    <h4>Dados do Plano de Credito:</h4>
    <p>
    Empréstimo no Valor de	R$ {{$dadosCliente->valorSolicitado}}
    Com prazo de 12 meses
    Parcelas mensais de R$ {{$dadosCliente->parcelaMensal}}
    </p>
    <p>

    Declaro estar de acordo com o Crédito até a data {{ date('d/m/Y', strtotime('+1 days')) }} do valor citado acima
    Sendo liberado na minha conta bancária conforme dados abaixo:
    </p>
    <p>
    <b>Banco:</b> .................................. {{$dadosCliente->codigoBanco}} - {{$dadosCliente->nomeBanco}}
    <br>
    <b>Agência:</b> ............................... {{$dadosCliente->agenciaComDigito}}
    <br>
    <b>Tipo de Conta:</b> .................... {{$dadosCliente->tipoConta}}
    <br>
    <b>Número da Conta</b> ............... {{$dadosCliente->contaComDigito}}
    </p>
    <p>
    Declaro estar ciente e de acordo com o desconto
    a ser realizado na fatura de cartão de crédito de:
    12 Parcelas mensais de	R$ {{$dadosCliente->parcelaMensal}}.

    <br>
    <br>
    @php

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual =  strftime('%A, %d de %B de %Y', strtotime('today'));
    @endphp
    <!-- deve mostrar o local dinamicamente com base na localidade da franquia -->
    IRATI/PR {{ $dataAtual }}.
    <br>
    <br>
    <br>

    <div class="assinaturaCliente" style="text-align: center">
    <p>_______________________________________________</p>
        Cliente:	{{$dadosCliente->nomeCompleto}}
        <br>
        CPF:	{{$dadosCliente->cpf}}
    </div>
    <br>
    <br>
    <div class="assinaturaCliente" style="text-align: center">
        <p>_______________________________________________</p>
        Operador: Nome do Operador
        <br>
        CPF:	***.***.***-**
    </div>


    {{-- <div class="logoRodape" style="text-align: center; margin-top: 50px">
        <img src="./../inovacred-site-without-slogan-logo.svg" alt="" srcset="">
    </div> --}}
</p>
@endforeach
@endif
</body>
</html>
