<!DOCTYPE html>
<html lang="en">
<head>
    <title>Media Andalas</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <!--Header-->
    <header class="container">
        <a class = "aheader" href="/home">
            <img src="/img/logo.png" alt="logo" class="logo">
        </a>

        <nav>
            <ul class="nav__links">
                <li><a href="#">Hubungi Kami</a></li>
                <li><a href="/tentang-kami">Tentang Kami</a></li>
            </ul>
        </nav>

        @if(Auth::check())
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Hi, {{auth()->user()->name}}</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="/admin">Dashboard</a>
                <a href="/profileadmin">Profile</a>
                <a href="{{url('logout')}}">Logout</a>
            </div>
        </div>
        @else
        <a href="/login"><button>Login</button></a>
        @endif
    </header>

    <!--navigasi-->
    <nav class="navigasi">
        <ul class="nav__links">
            <li><a href="/kategoriberita/Teknologi">Teknologi</a></li>
            <li><a href="/kategoriberita/Olahraga">Olahraga</a></li>
            <li><a href="/kategoriberita/Bencana">Bencana</a></li>
            <li><a href="/kategoriberita/Politik">Politik</a></li>
            <li><a href="/kategoriberita/Wisata">Wisata</a></li>
            <li><a href="/kategoriberita/Pendidikan">Pendidikan</a></li>
        </ul>
    </nav>

    <!--konten-->
    <div class="row">

        <!--Konten Kiri-->
        <div class="column side">
            <!--iklan kiri-->
            <div class="card">
                <img style="width: 100%;" src="/img/iklan.jpg" alt="iklan">
            </div>

        </div>
        
        <!--konten tengah / utama-->
        <div class="column middle">
            <div class="card">
                <h1>{{$data->judul}}</h1>
                <p>{{$data->author}}</p>
                <h5><span style="color:salmon;">{{$data->kategori}}</span>, {{$data->created_at}}</h5>
                <img src="/storage/{{$data->gambar}}" alt="gambar" class="thumbnail">
                
                {!! $data->content !!}

                
                <div class="form-rating">
                @if($data->rating == 0)
                    <form class="rating" method="POST" action="/baca2/{{$data->id}}">
                        @csrf
                        <div class="bintang">
                            <p>Berikan Rating Untuk berita Ini</p>
                            <input type="radio" name="rating" id="rating1" value="1">
                            <label class="fa-solid fa-star" for="rating1"></label>
                            <input type="radio" name="rating" id="rating2" value="2">
                            <label class="fa-solid fa-star" for="rating2"></label>
                            <input type="radio" name="rating" id="rating3" value="3">
                            <label class="fa-solid fa-star" for="rating3" ></label>
                            <input type="radio" name="rating" id="rating4" value="4">
                            <label class="fa-solid fa-star" for="rating4"></label>
                            <input type="radio" name="rating" id="rating5" value="5">
                            <label class="fa-solid fa-star" for="rating5"></label>
                        </div>
                        <div class="pushable">
                            <input type="submit" value="Kirim">
                        </div>
                    </form>
                    @else
                    <p class="adyrate">anda sudah memberi rating untuk berita ini</p>
                @endif
                </div>
                
            </div>
        </div>
        
        <!--konten kanan-->
        <div class="column side">
            <div class="card">
                <img src="/img/iklan.jpg" alt="iklan" style="width: 100%;">
            </div>
            <div class="card">
                <h3>Berita Popular </h3>
                @foreach($beritapopuler as $beripop)
                <div class="fakeimg">
                    <a href="/baca2/{{$beripop->id}}">
                    <img src="/storage/{{$beripop->gambar}}" alt="" style="width: 100%">
                    </a>
                    <p>{{$beripop->judul}}</p>
                    
                </div>
                @endforeach
            </div>
            
        </div>
    </div>

    <!--footer-->
    <footer>
        <img style="width: 20%" src="/img/logo.png" alt="logo">
        <div>
            <a href="www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
            <a href="www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <hr>
        <div>
            <p>2022 Copyright dkk dll reserved paanlah. Co. Ltd.</p>
        </div>
    </footer>
</body>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
            }
            }
        }
        }
}
</script>
</html>