<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Kandidat</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h2>Kelola Kandidat</h2>

    <form method="POST" action="/kandidat" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required>
        <textarea name="vision" placeholder="Visi" required></textarea>
        <textarea name="mission" placeholder="Misi" required></textarea>
        <input type="file" name="photo">
        <button type="submit">Tambah</button>
    </form>

    <hr>

    @foreach ($candidates as $c)
        <div class="candidate-card">
            <h3>{{ $c->name }}</h3>
            <p>{{ $c->vision }}</p>
            <p>{{ $c->mission }}</p>
            <form action="/kandidat/{{ $c->id }}/hapus" method="POST">
                @csrf
                <button type="submit">Hapus</button>
            </form>
        </div>
    @endforeach
</body>

</html>
