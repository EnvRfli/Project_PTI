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
                <li><a href="">Tentang Kami</a></li>
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
        <a href="login"><button>Login</button></a>
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
        </div>
        
        <!--konten tengah / utama-->
        <div class="column middle">
            <div class="card">
                <h1>Tentang Kami</h1>
                <img src="/img/logo.png" alt="gambar" >
                
               <p>Kemerdekaan berpendapat, berekspresi, dan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB. Kemerdekaan pers adalah sarana masyarakat untuk memperoleh informasi dan berkomunikasi, guna memenuhi kebutuhan hakiki dan meningkatkan kualitas kehidupan manusia. Dalam mewujudkan kemerdekaan pers itu, wartawan Indonesia juga menyadari adanya kepentingan bangsa, tanggung jawab sosial, keberagaman masyarakat, dan norma-norma agama.</p>
               <p>Dalam melaksanakan fungsi, hak, kewajiban dan peranannya, pers menghormati hak asasi setiap orang, karena itu pers dituntut profesional dan terbuka untuk dikontrol oleh masyarakat.</p>
                <p>Untuk menjamin kemerdekaan pers dan memenuhi hak publik untuk memperoleh informasi yang benar, wartawan Indonesia memerlukan landasan moral dan etika profesi sebagai pedoman operasional dalam menjaga kepercayaan publik dan menegakkan integritas serta profesionalisme. Atas dasar itu, wartawan Indonesia menetapkan dan menaati Kode Etik Jurnalistik:</p>
                <p>Pasal 1</p>
                <p>Wartawan Indonesia bersikap independen, menghasilkan berita yang akurat, berimbang, dan tidak beritikad buruk.</p>
                <p>Penafsiran</p>
                <p>1. Independen berarti memberitakan peristiwa atau fakta sesuai dengan suara hati nurani tanpa campur tangan, paksaan, dan intervensi dari pihak lain termasuk pemilik perusahaan pers.</p>
                <p>2. Akurat berarti dipercaya benar sesuai keadaan objektif ketika peristiwa terjadi.</p>
                <p>3. Berimbang berarti semua pihak mendapat kesempatan setara.</p>
                <p>4. Tidak beritikad buruk berarti tidak ada niat secara sengaja dan semata-mata untuk menimbulkan kerugian pihak lain.</p>

                <p>Pasal 2</p>
                <p>Wartawan Indonesia menempuh cara-cara yang profesional dalam melaksanakan tugas jurnalistik.</p>
                <p>Penafsiran</p>

                <p>Cara-cara yang profesional adalah:</p>
                <p>menunjukkan identitas diri kepada narasumber;</p>
                <p>menghormati hak privasi;</p>
                <p>tidak menyuap;</p>
                <p>menghasilkan berita yang faktual dan jelas sumbernya;</p>
                <p>rekayasa pengambilan dan pemuatan atau penyiaran gambar, foto, suara dilengkapi dengan keterangan tentang sumber dan ditampilkan secara berimbang;</p>
                <p>menghormati pengalaman traumatik narasumber dalam penyajian gambar, foto, suara;</p>
                <p>tidak melakukan plagiat, termasuk menyatakan hasil liputan wartawan lain sebagai karya sendiri;</p>
                <p>penggunaan cara-cara tertentu dapat dipertimbangkan untuk peliputan berita investigasi bagi kepentingan publik.</p>
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
</body>
</html>