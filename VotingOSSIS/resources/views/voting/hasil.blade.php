<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Voting</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h2>Hasil Voting Ketua OSIS</h2>
    <canvas id="voteChart" width="400" height="400"></canvas>

    <script>
        const data = {
            labels: {!! json_encode($hasil->pluck('name')) !!},
            datasets: [{
                label: 'Jumlah Suara',
                data: {!! json_encode($hasil->pluck('votes_count')) !!},
                backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#f1c40f']
            }]
        };

        const config = {
            type: 'pie',
            data: data
        };

        new Chart(document.getElementById('voteChart'), config);
    </script>
</body>

</html>
