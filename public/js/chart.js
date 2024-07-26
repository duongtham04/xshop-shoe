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
   
   // Biểu đồ hình tròn
   const dataPie = {
     labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
     datasets: [{
       label: 'Doanh thu',
       data: [100000000, 150000000, 120000000, 180000000, 200000000, 220000000, 250000000, 230000000, 210000000, 190000000, 170000000, 160000000],
       backgroundColor: [
         'rgba(255, 99, 132, 0.2)',
         'rgba(54, 162, 235, 0.2)',
         'rgba(255, 206, 86, 0.2)',
         'rgba(75, 192, 192, 0.2)',
         'rgba(153, 102, 255, 0.2)',
         'rgba(255, 159, 64, 0.2)',
         'rgba(255, 99, 132, 0.2)',
         'rgba(54, 162, 235, 0.2)',
         'rgba(255, 206, 86, 0.2)',
         'rgba(75, 192, 192, 0.2)',
         'rgba(153, 102, 255, 0.2)',
         'rgba(255, 159, 64, 0.2)'
       ],
       borderColor: [
         'rgba(255, 99, 132, 1)',
         'rgba(54, 162, 235, 1)',
         'rgba(255, 206, 86, 1)',
         'rgba(75, 192, 192, 1)',
         'rgba(153, 102, 255, 1)',
         'rgba(255, 159, 64, 1)',
         'rgba(255, 99, 132, 1)',
         'rgba(54, 162, 235, 1)',
         'rgba(255, 206, 86, 1)',
         'rgba(75, 192, 192, 1)',
         'rgba(153, 102, 255, 1)',
         'rgba(255, 159, 64, 1)'
       ],
       borderWidth: 1
     }]
   };
   
   const configPie = {
     type: 'pie',
     data: dataPie,
     options: {
       responsive: true,
       plugins: {
         legend: {
           position: 'top',
         },
         title: {
           display: true,
           text: 'Biểu đồ doanh thu theo tháng'
         }
       }
     },
   };
   
   // Tạo biểu đồ cột
   var myChartColumn = new Chart(
   document.getElementById('myChart'),
   configColumn
   );
   
   // Tạo biểu đồ hình tròn
   var myChartPie = new Chart(
   document.getElementById('myPieChart'),
   configPie
   );
   
   //
   const userData = {
     labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
     datasets: [{
       label: 'Số lượng người dùng mới',
       data: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160],
       backgroundColor: 'rgba(255, 99, 132, 0.2)',
       borderColor: 'rgba(255, 99, 132, 1)',
       borderWidth: 1
     }]
   };
   
   // Cấu hình của biểu đồ thống kê người dùng
   const userConfig = {
     type: 'bar',
     data: userData,
     options: {
       scales: {
         y: {
           beginAtZero: true
        }
       }
     }
   };
   
   // Tạo biểu đồ thống kê người dùng
   var userChart = new Chart(
     document.getElementById('userChart'),
     userConfig
     );