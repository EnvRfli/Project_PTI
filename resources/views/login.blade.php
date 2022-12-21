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
            {{ csrf_field() }}
            <div>
            <input type="email" name="email" class="email" placeholder="Masukkan email" required autofocus>
            @error('email')
            <div class="text-danger mt-2">
                {{$message}}
            </div>
            @enderror
            </div>
            <div>
            <input type="password" name="password" class="password" placeholder="Masukkan password" required>
            @error('email')
            <div class="text-danger mt-2">
                {{$message}}
            </div>
            @enderror
            </div>
            <a href="lupapassword">Lupa Password?</a>
            <button class="btn" type="submit" value="Masuk">Login</button>
        </form>
        @if(session('message'))
        <div class="alert success">
            <span class="closebtn">&times;</span>  
            <strong>{{session('message')}}</strong>
        </div>
        @endif
    </div>
</body>