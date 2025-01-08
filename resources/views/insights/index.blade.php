@extends('layouts.app')

@section('content')
<div class="container px-2 mt-5">
    <!-- Coloque o botão no topo à esquerda -->
    <div class="mb-3 d-flex justify-content-start">
        <button id="exportBtn" class="btn btn-primary">Exportar PDF</button>
    </div>

    <div class="mr-4">
        <canvas id="tasksChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        // Aguarda o carregamento do DOM e do gráfico
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('tasksChart').getContext('2d');
            const tasksCount = @json($tasksCount);

            const statusCount = {
                'Concluída': 0,
                'Em andamento': 0,
                'Espera': 0
            };

            tasksCount.forEach(task => {
                if (task.status in statusCount) {
                    statusCount[task.status] = task.count;
                }
            });

            const tasksChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Concluída', 'Em andamento', 'Espera'],
                    datasets: [{
                        label: 'Número de Tarefas',
                        data: [statusCount['Concluída'], statusCount['Em andamento'], statusCount['Espera']],
                        backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                        borderColor: ['#28a745', '#ffc107', '#dc3545'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Função para exportar o gráfico como PDF
            document.getElementById('exportBtn').addEventListener('click', () => {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Captura o gráfico como uma imagem
                const chartImage = tasksChart.toBase64Image();

                // Adiciona a imagem ao PDF
                doc.addImage(chartImage, 'JPEG', 10, 10, 180, 90); // Ajuste a posição e o tamanho conforme necessário

                // Salva o PDF
                doc.save('grafico_tarefas.pdf');
            });
        });
    </script>
</div>
@endsection
