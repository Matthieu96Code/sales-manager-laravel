@if (Auth::user()->role > 0)
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            // type: 'bar',
            // type: 'line',
            // type: 'radar',
            type: 'doughnut',
            // type: 'polarArea',
            // type: 'bubble',
            // type: 'scatter',
            // type: 'area',
            // type: 'pie',
            // type: 'horizontalBar',
            

            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales record',
                    backgroundColor: ['rgb(255, 99, 132)', 'red', 'blue', 'yellow', 'purple', 'orange'],
                    borderColor: ['rgb(255, 99, 132)', 'green', 'blue', 'yellow', 'purple', 'orange'],
                    // borderColor: ['orange', 'purple', 'yellow', 'blue', 'green', 'rgb(255, 99, 132)'],
                    data: [12, 19, 3, 5, 2, 7],
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
    </script>

@endif