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
            <li><a href="Teknologi">Teknologi</a></li>
            <li><a href="Olahraga">Olahraga</a></li>
            <li><a href="Bencana">Bencana</a></li>
            <li><a href="Politik">Politik</a></li>
            <li><a href="Wisata">Wisata</a></li>
            <li><a href="Pendidikan">Pendidikan</a></li>
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
            <br/>
            <!-- <h3>Berita Kategori :</h3><br/> -->
            <!--konten berita utama-->
            @foreach($newskategori as $newss)
            <div class="main-content">
                <!--gambar berita-->
                <div class="gambar-berita">
                    <a href="/baca2/{{$newss->id}}"><img src="/storage/{{$newss->gambar}}" alt="berita1"></a>
                </div>
                <!--judul, kategori dan waktu upload-->
                <div class="berita">    
                    <div>
                        <h3 class="judul-berita">
                            <a href="/baca2/{{$newss->id}}">{{$newss->judul}}</a>
                        </h3>
                    </div>
                    <div class="kategori-waktu">
                        <a class="kategori" href="#" style="color: salmon">{{$newss->kategori}}</a>
                        <p class="waktu" >{{$newss->created_at}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!--Berita Rekomendasi-->
            <div class="rekomendasi">
                <!--text berita rekomendasi-->
                <br/>
                <h3 class="berita rekomendasi">Berita Rekomendasi</h3>

                <!--artikel berita rekomendasi-->
                <div class="box-rekomendasi">
                    
                    <!--artikel-->
                    <article>
                        <a href="baca2/{{$tekno->id}}" class="gambar-berita">
                            <img src="/storage/{{$tekno->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$tekno->judul}}</h3>
                    </article>

                    <article>
                        <a href="baca2/{{$olga->id}}" class="gambar-berita">
                            <img src="/storage/{{$olga->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$olga->judul}}</h3>
                    </article>

                    <article>
                        <a href="baca2/{{$bencana->id}}" class="gambar-berita">
                            <img src="/storage/{{$bencana->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$bencana->judul}}</h3>
                    </article>

                    <article>
                        <a href="baca2/{{$politik->id}}" class="gambar-berita">
                            <img src="/storage/{{$politik->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$politik->judul}}</h3>
                    </article>

                    <article>
                        <a href="baca2/{{$wisata->id}}" class="gambar-berita">
                            <img src="/storage/{{$wisata->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$wisata->judul}}</h3>
                    </article>

                    <article>
                        <a href="baca2/{{$pendidikan->id}}" class="gambar-berita">
                            <img src="/storage/{{$pendidikan->gambar}}" alt="gambar berita rekomendasi">
                        </a>
                        <h3 class="text" maxlength="10">{{$pendidikan->judul}}</h3>
                    </article>
                    
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
                    <a href="baca2/{{$beripop->id}}">
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