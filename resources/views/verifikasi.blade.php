<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="container">
        <h1>MASUK </h1>
        <P>Masuk untuk melanjutkan sebagai penulis Media Andalas</P>

        <!--form-->
        <form action="{{url('proses_login')}}" method="POST" id="logForm">
            <label for="kontol">Masukkan nama hewan peliharaan</label>
            {{ csrf_field() }}
            <input type="email" name="email" class="email" @error('email') is-invalid @enderror placeholder="Masukkan email" required autofocus>
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <input type="password" name="password" class="password" placeholder="Masukkan password" required>
            <a href="lupapassword">Lupa Password?</a>
            <button class="login" type="submit" value="Masuk">Login</button>
        </form>
    </div>
</body>