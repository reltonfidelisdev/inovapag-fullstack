<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        *{
            margin:0; padding:0
        }
        .modelo{
            position: absolute;
            font-size: 70px;
            opacity: 0.1;
            -webkit-transform: rotate(-45deg);
            color: black;
            top: 500px;
            left: 10px;
        }
        table, th, td, tr {
            border: 2px solid black;
            min-width: 10%;
            padding: 5px;
        }
        .tBorder{
            border: 1px solid black;
        }
        .page_break { page-break-before: always;
        }
            /**
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                /** The width and height may change
                    according to the dimensions of your letterhead
                **/
                width:    21.8cm;
                height:   28cm;
                background-image: url('./logo-square-white-bg-without-brand.png');
                background-repeat: no-repeat;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }

    </style>
</head>
<body style="margin: 30px">
    {{-- Mostra marcadgua em todas as paginas
    <div id="watermark"></div>
    --}}
    @if($proposta)
       @foreach ($proposta as $dadosCliente)

       <p style="font-size: 30px; text-align: center">Plano de Empréstimo no Cartão de Crédito</p>
            <p style="font-size: 25px; text-align: center">Termo de Adesão</p>

            <p style="text-align: center">
            Eu, <b>{{$dadosCliente->nomeCompleto}}</b> <br>
            Brasileiro(a), inscrito(a) sob CPF nº {{$dadosCliente->cpf}}
            Residente e domiciliado(a) em {{$dadosCliente->cidade}}/{{$dadosCliente->estado}}.

            {{-- Marca d'agua da primeira pagina --}}
            <div class="modelo">VIA NÃO NEGOCIÁVEL</div>

            </p>
                <table class="table">
                    <tr>
                        <th colspan="2" style="text-align: center">
                            Dados do Plano de Crédito:
                        </th>
                    </tr>
                    <tr>
                        <td>Empréstimo no Valor de</td>
                        <td>R$ {{$dadosCliente->valorSolicitado}}</td>
                    </tr>
                    <tr>
                        <td>Com prazo de</td>
                        <td>12 meses</td>
                    </tr>
                    <tr>
                        <td>Parcelas mensais de</td>
                        <td>R$ {{$dadosCliente->parcelaMensal}}</td>
                    </tr>
                </table>

            <p style="text-align: center">
            Declaro estar de acordo com o Crédito até a data {{ date('d/m/Y', strtotime('+1 days')) }} do valor citado acima
            sendo liberado na minha conta bancária conforme dados abaixo:
            </p>

            <table class="table">
                <tr>
                    <th colspan="2" style="text-align: center">
                        Meus Daos Bancários:
                    </th>
                </tr>
                <tr>
                    <td>Banco:</td>
                    <td>{{$dadosCliente->codigoBanco}} - {{$dadosCliente->nomeBanco}}</td>
                </tr>
                <tr>
                    <td>Agência:</td>
                    <td>{{$dadosCliente->agenciaComDigito}}</td>
                </tr>
                <tr>
                    <td>Tipo de Conta:</td>
                    <td>{{$dadosCliente->tipoConta}}</td>
                </tr>
                <tr>
                    <td>Número da Conta:</td>
                    <td>{{$dadosCliente->contaComDigito}}</td>
                </tr>
            </table>
            <p style="text-align: center">
            Declaro estar ciente e de acordo com o desconto <br>
            a ser realizado na fatura de cartão de crédito de: <br>
            12 Parcelas mensais de	R$ {{$dadosCliente->parcelaMensal}}.
            </p>
            @php

                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual =  strftime('%A, %d de %B de %Y', strtotime('today'));
            @endphp
            <!-- deve mostrar o local dinamicamente com base na localidade da franquia -->
            <p style="text-align: center">
                IRATI/PR, {{ $dataAtual }}.
            </p>
            <div class="container ">

                <div class="md-6 mt-5" style="text-align: center">
                    <p>
                        _____________________________________________________ <br>
                        Nome: <b>{{$dadosCliente->nomeCompleto}}</b><br>
                        CPF: {{$dadosCliente->cpf}}
                    </p>
                </div>
              </div>
              <br><br>
                <p style="text-align: center">
                    <img src="./logo-square-white-bg-without-brand.png" alt="" style="width:150px">
                </p>
                {{-- Via Não Negociável --}}
                {{-- Page Break --}}
              <div class="page_break"></div>

              {{-- 2ª Página --}}
              <p style="font-size: 30px; text-align: center">Plano de Empréstimo no Cartão de Crédito</p>
              <p style="font-size: 25px; text-align: center">Termo de Adesão</p>

              <p style="text-align: center">
              Eu, <b>{{$dadosCliente->nomeCompleto}}</b> <br>
              Brasileiro(a), inscrito(a) sob CPF nº {{$dadosCliente->cpf}}
              Residente e domiciliado(a) em {{$dadosCliente->cidade}}/{{$dadosCliente->estado}}.

              {{-- Marca d'agua da primeira pagina
              <div class="modelo">VIA NÃO NEGOCIÁVEL</div>
                --}}
              </p>
                  <table class="table">
                      <tr>
                          <th colspan="2" style="text-align: center">
                              Dados do Plano de Crédito:
                          </th>
                      </tr>
                      <tr>
                          <td>Empréstimo no Valor de</td>
                          <td>R$ {{$dadosCliente->valorSolicitado}}</td>
                      </tr>
                      <tr>
                          <td>Com prazo de</td>
                          <td>12 meses</td>
                      </tr>
                      <tr>
                          <td>Parcelas mensais de</td>
                          <td>R$ {{$dadosCliente->parcelaMensal}}</td>
                      </tr>
                  </table>

              <p style="text-align: center">
              Declaro estar de acordo com o Crédito até a data {{ date('d/m/Y', strtotime('+1 days')) }} do valor citado acima
              sendo liberado na minha conta bancária conforme dados abaixo:
              </p>

              <table class="table">
                  <tr>
                      <th colspan="2" style="text-align: center">
                          Meus Daos Bancários:
                      </th>
                  </tr>
                  <tr>
                      <td>Banco:</td>
                      <td>{{$dadosCliente->codigoBanco}} - {{$dadosCliente->nomeBanco}}</td>
                  </tr>
                  <tr>
                      <td>Agência:</td>
                      <td>{{$dadosCliente->agenciaComDigito}}</td>
                  </tr>
                  <tr>
                      <td>Tipo de Conta:</td>
                      <td>{{$dadosCliente->tipoConta}}</td>
                  </tr>
                  <tr>
                      <td>Número da Conta:</td>
                      <td>{{$dadosCliente->contaComDigito}}</td>
                  </tr>
              </table>
              <p style="text-align: center">
              Declaro estar ciente e de acordo com o desconto <br>
              a ser realizado na fatura de cartão de crédito de: <br>
              12 Parcelas mensais de	R$ {{$dadosCliente->parcelaMensal}}.
              </p>
              @php

                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  $dataAtual =  strftime('%A, %d de %B de %Y', strtotime('today'));
              @endphp
              <!-- deve mostrar o local dinamicamente com base na localidade da franquia -->
              <p style="text-align: center">
                  IRATI/PR, {{ $dataAtual }}.
              </p>
              <div class="container ">

                  <div class="md-6 mt-5" style="text-align: center">
                      <p>
                          _____________________________________________________ <br>
                          Nome: <b>{{$dadosCliente->nomeCompleto}}</b><br>
                          CPF: {{$dadosCliente->cpf}}
                      </p>
                  </div>
                </div>
                  {{-- Fim 2ª Página --}}
                  {{-- Page Break --}}
                <br><br>
                <p style="text-align: center">
                    <img src="./logo-square-white-bg-without-brand.png" alt="" style="width:150px">
                </p>
                <div class="page_break"></div>






            <p style="font-size: 30px; text-align: center">DECLARAÇÃO DE COMPRA</p>
            <p style="text-align: center">
                A quem possa interessar, eu <b><u>{{$dadosCliente->nomeCompleto}}</u></b> <br>
                CPF nº {{$dadosCliente->cpf}}, RG n° {{$dadosCliente->rg}}, titular do cartão utilizado na<br>
                transação relacionada à compra em questão, afirmo que reconheço a compra efetuada e que<br>
                recebi corretamente as mercadorias/serviços adquiridos da empresa de Razão Social
                <b><u>{{$dadosCliente->nomeComercial}}</u></b> e CPF {{$dadosCliente->cnpj}}, segundo as informações abaixo citadas:

            </p>
            <table class="table tBorder">
                <tr>
                    <th colspan="7" style="text-align: center">Dados da Compra</th>
                </tr>
                <tr>
                    <td class="col-1">Data da Compra</td>
                    <td>Valor da Compra</td>
                    <td>Cartão Final</td>
                    <td>Produto ou Serviço</td>
                    <td>Parcelamento Escolhido</td>
                    <td>Bandeira do Cartão</td>
                    <td>Prazo para Entrega</td>
                </tr>

                <!-- looping for -->
                <tr>

                    <td> <br> ___/___/____ </td>
                    <td> R$ {{$dadosCliente->limiteNecessario}} </td>
                    <td>  </td>
                    <td> Treinamento Vendas 4.0 </td>
                    <td> <br>{{$dadosCliente->totalParcelas}} Vezes </td>
                    <td> </td>
                    <td> <br> ___/___/____ </td>
                </tr>
            </table>

            <br>
            <br>


            <div class="tBorder" style="width: 100%; height: 300px; text-align: center">
            <p>Documento</p>
            </div>

            <p style="margin-left: 25px">
                Retifico serem verdeiras as informações prestadas neste documento, e por ser espressa <br>
                 verdade, firmo a presente de declaração, para que se produza seu efeitos legais
            </p>
            <p>
                _______________________________________ <br>
                Assinatura do titular do cartão <br>
                Data: _____/_____/________.
            </p>
        </div>
        <br><br>
        <p style="text-align: center">
            <img src="./logo-square-white-bg-without-brand.png" alt="" style="width:150px">
        </p>
            <div class="page_break"></div>


            <br><br><br><br>
            <div style="text-align: center">
                <p style="font-size: 30px">Plano de Empréstimo no Cartão de Crédito</p>
                <p style="font-size: 25px">Termo de Adesão</p>

                <p>
                Eu, <b>{{$dadosCliente->nomeCompleto}}</b> <br>
                Brasileiro(a), inscrito(a) sob CPF nº {{$dadosCliente->cpf}}
                Residente e domiciliado em {{$dadosCliente->cidade}}/{{$dadosCliente->estado}}.
                </p>
                <p>
                    Declaro estar ciente da adesão ao treinamento de gestão financeira completo <br>
                    sendo incluso: aulas e dicas para criação de carteira e seleção de investimentos <br>
                    com sessoes de mentoria e acompanhamento
                </p>
            </div>
            <br><br>
            <p style="text-align: center">
                Declaro estar ciente e de acordo com o desconto <br>
                a ser realizado na fatura de cartão de crédito de: <br>
                12 Parcelas mensais de {{$dadosCliente->parcelaMensal}} <br>
                Valor total de R$ {{$dadosCliente->limiteNecessario}}
            </p>
            <br>
            <p style="text-align: center">
                IRATI/PR, {{ $dataAtual }}.
            </p>
            <br>
            <div class="assinaturaCliente" style="text-align: center">
            <p>_______________________________________________ <br>
            <b><u>{{$dadosCliente->nomeCompleto}}</u></b>
                <br>
                CPF: {{$dadosCliente->cpf}}
            </p>
            <br><br><br><br><br>
            <br><br><br><br>
            <p style="text-align: center">
                <img src="./logo-square-white-bg-without-brand.png" alt="" style="width:150px">
            </p>
            </div>
            <br>
        @endforeach
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
