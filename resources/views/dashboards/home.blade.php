@extends('layouts.adm')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Carteira de Clientes</h5>
                                <div>
                                    <canvas id="graficoTotalClientes"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ranking dos Atendentes</h5>
                                <div>
                                    <canvas id="graficoTotalPropostas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Franquias e Parceiros</h5>
                                <div>
                                    <canvas id="graficoTotalFranquias"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div><!-- Fim Row -->
            </div>
        </div>
    </div>

    <script>

        // Calcule e mostre um gráfico com o total de clientes cadastrados por mês
        const labelsTotalClientes = [
          'Janeiro',
          'fevereiro',
          'Março',
          'Abril',
          'Maio',
          'Junho',
        ];

        const data_graficoTotalClientes = {
          labels: labelsTotalClientes,
          datasets: [{
            label: 'Total de Clientes /mês',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [65, 70, 150, 200, 98, 72, 64],
          }]
        };
        const config_graficoTotalClientes = {
          type: 'bar',
          data: data_graficoTotalClientes,
          options: {}
        };
        const totalClientesPorMes = new Chart(
            document.getElementById('graficoTotalClientes'),
            config_graficoTotalClientes
        );
        // FIM

        const labelsTotalPropostas = [
          'Adriana',
          'Marcelo',
          'Tassiana',
          'Amália',
          'Miguel',
          'Juliana',
        ];

        const data_graficoTotalPropostas = {
          labels: labelsTotalPropostas,
          datasets: [{
            label: 'Top 5 Atendentes',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [56, 10, 5, 2, 20, 30, 45],
          }]
        };

        const config_TotalPropostas = {
          type: 'bar',
          data: data_graficoTotalPropostas,
          options: {}
        };
        const totalPropostas = new Chart(
            document.getElementById('graficoTotalPropostas'),
            config_TotalPropostas
        );

        // Mostre o toal de franquias por estado
        const labelsTotalFranquias = [
          'PE',
          'RJ',
          'SP',
          'ES',
          'BA',
          'PI',
        ];
        const data_graficoTotalFranquias = {
          labels: labelsTotalFranquias,
          datasets: [{
            label: 'QTD. Franquiados',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [17, 10, 20, 15, 6, 30, 45],
          }]
        };

        const config_graficoTotalFranquias = {
          type: 'bar',
          data: data_graficoTotalFranquias,
          options: {}
        };
        const propostaProAnalistaFranquias = new Chart(
            document.getElementById('graficoTotalFranquias'),
            config_graficoTotalFranquias
        );

      </script>

@endsection
