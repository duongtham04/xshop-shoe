@extends('admin.layoutadmin')

@section('title', 'Quản trị Xshop')

@section('content')
<div class="container">
    <h5 class="text-center pt-2 fw-bold">BIỂU ĐỒ THỐNG KÊ</h5>
    <div class="row py-5">
        <!-- Biểu đồ cột -->
        <div class="col-6">
            <canvas id="myChartColumn" width="400" height="300"></canvas>
        </div>
        <!-- Biểu đồ tròn -->
        <div class="col-6">
            <canvas id="myChartPie" width="300" height="300"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dữ liệu và cấu hình cho biểu đồ cột
    const dataColumn = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
            label: 'Doanh thu',
            data: [100000000, 150000000, 120000000, 180000000, 200000000, 220000000, 250000000, 230000000, 210000000, 190000000, 170000000, 160000000],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const configColumn = {
        type: 'bar',
        data: dataColumn,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var myChartColumn = new Chart(
        document.getElementById('myChartColumn'),
        configColumn
    );

    // Dữ liệu và cấu hình cho biểu đồ tròn
    const dataPie = {
        labels: ['Giày thể thao', 'Balo', 'Scandal'],
        datasets: [{
            label: 'Số lượng bán',
            data: [300, 50, 100],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const configPie = {
        type: 'pie',
        data: dataPie,
        options: {}
    };

    var myChartPie = new Chart(
        document.getElementById('myChartPie'),
        configPie
    );
});
</script>
@endsection
