
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <!--Kontainer dari kerangka-->
    <div class="container">
        <h1>Reset Password</h1>
        <p>Masukkan Email Anda</p>
        <form action="{{route('lanjut1')}}" method="POST">
            @csrf
            <input type="email" name="email" id="text" placeholder="Masukkan Email Anda" required>
            <button class="Login" type="submit" value="Masuk">Lanjutkan</button>
        </form>
    </div>
</body>

</html>