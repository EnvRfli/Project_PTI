
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <!--Kontainer dari kerangka-->
    <div class="container">
        <h1>Reset Password</h1>
        <form action="{{route('lanjut2')}}" method="POST">
            @csrf
            <label for="email">Masukkan email</label>
            <input type="email" name="email" id="text" placeholder="Masukkan email anda" required>
            <label for="text">Pertanyaan pemulihan</label>
            <input type="text" name="verification_q" id="text" placeholder="Masukkan nama hewan Peliharaan anda" required>
            <label for="new">Password baru</label>
            <input type="password" name="password" id="text" placeholder="Masukkan password baru" required>
            <button class="btn" type="submit" value="Masuk">Lanjutkan</button>
        </form>
        @if(session('message'))
        <div class="alert-danger">
            <span class="closebtn">&times;</span>  
            <strong>{{session('message')}}</strong>
        </div>
        @endif
    </div>
</body>

</html>