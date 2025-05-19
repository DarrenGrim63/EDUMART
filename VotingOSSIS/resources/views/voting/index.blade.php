<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pilih Ketua OSIS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h2>Pilih Kandidat Ketua OSIS</h2>

    <div class="candidate-list">
        @foreach ($candidates as $c)
            <div class="candidate-card">
                <img src="{{ $c->photo_url ?? asset('img/default.jpg') }}" alt="{{ $c->name }}">
                <h3>{{ $c->name }}</h3>
                <p><strong>Visi:</strong> {{ $c->vision }}</p>
                <p><strong>Misi:</strong> {{ $c->mission }}</p>
                <form method="POST" action="/vote">
                    @csrf
                    <input type="hidden" nama="candidate_id" value="{{ $c->id }}">
                    <button type="submit">Pilih</button>
                </form>
            </div>
        @endforeach
    </div>
</body>

</html>
