<h2 class="title-right-div a-dk h2-title-1"><i class="fa-solid fa-chart-pie"></i> Stadistics</h2>
<hr style="margin-top: 10px">
<div style="margin-top: 20px" class="grid-layout-2-1 grid-gap-1">
    <div class="card-container-1 table-div">
        <h2>Assigned Courses</h2>
        <canvas id="myChart" class="chart-1"></canvas>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                }
            });
        </script>
    </div>

    <div class="card-container-1 table-div">
        <h2>Students Gender</h2>
        <canvas id="myChart2" class="chart-1"></canvas>
        <script>
            const ctx2 = document.getElementById('myChart2').getContext('2d');
            const myChart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                }
            });
        </script>
    </div>

    <div class="card-container-1 table-div">
        <h2>Assignments</h2>
        <canvas id="myChart4" class="chart-1"></canvas>
        <script>
            const ctx4 = document.getElementById('myChart4').getContext('2d');
            const myChart4 = new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: ["January","February","March","April","May","June","July"],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                }
            });
        </script>
    </div>
</div>