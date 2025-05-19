<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login & Registrasi</title>
</head>

<body>
    <h2>Login</h2>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form method="POST" action="/login">
        @csrf
        <label>NISN/NIK:</label>
        <input type="text" name="identifier" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>

    <h2>Registrasi</h2>
    <form method="POST" action="/register">
        @csrf
        <label>Role:</label>
        <select name="role">
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
        </select><br>
        <label>Nama:</label>
        <input type="text" name="name" required><br>
        <label>NISN/NIK:</label>
        <input type="text" name="identifier" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Terssebut</button>
    </form>
</body>

</html>
