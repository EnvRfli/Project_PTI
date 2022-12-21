<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin2.css">
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Author Panel</title>
</head>

<body>
  <!--side menu-->
    <div class="side-menu">
    <a href="/home" class="brand-name">
            <img src="/img/logo.png" alt="">
        </a>
        <!--list menu-->
        <ul>
            <li>
              <a class="add" href="buat-artikel">
                <i class='bx bx-plus'></i>&nbsp;<span>Buat Artikel</span>
              </a>
            </li>
            <li >
              <a class="aktif" href="author">
                <i class='bx bxs-dashboard'></i>&nbsp;<span>Artikel</span> 
              </a>
            </li>
            <li>
              <a href="laporan-berita-author">
                <i class='bx bxs-report' ></i>&nbsp;<span>Laporan Berita</span> 
              </a>
            </li>
        </ul>
        <!--akhir dari list menu-->
    </div>
    <!--akhir dari side menu-->

    <!--HEADER-->
    <div class="container">
          <!--HEADER-->
        <div class="header">
            <div class="nav">
            @auth
              <div class="user">
              @if($apdet->profil == NULL)
                    <img src="/img/people.webp" alt="user">
                  @else
                    <img src="/storage/{{$apdet->profil}}" alt="user">
                  @endif
                
                <p>HI, {{auth()->user()->name}}</p>
                
                <div class="dropdown">
                  <a onclick="myFunction()" id="dropbtn"class='bx bxs-down-arrow' ></a>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="/profileauthor">Profile</a>
                    <a href="{{url('logout')}}">Logout</a>
                  </div>
                </div>
              </div>
            @endauth
            </div>
        </div>

          <!--KONTEN--> 
        <div class="content">
            

        
        @foreach($daftikel as $daftarartikel)
        <div class="main-content">
                      <!--gambar berita-->
          <div class="gambar-berita">
              <a href="baca2/{{$daftarartikel->id}}"><img src="/storage/{{$daftarartikel->gambar}}" alt="berita1"></a>
          </div>
                      <!--judul, kategori dan waktu upload-->
          <div class="berita">
              <div>
                  <h3 class="judul-berita">
                      <a href="baca2/{{$daftarartikel->id}}">{{$daftarartikel->judul}}</a>
                  </h3>
              </div>
              <div class="kategori-waktu">
                  <a class="kategori" href="#" style="color: salmon">{{$daftarartikel->kategori}}</a>
                  <p class="waktu" >{{$daftarartikel->created_at}}</p>
              </div>
            </div>
            <div class="nama-author">
              <p>{{$daftarartikel->author}}</p>
            </div>
        </div>
        <br/>
        @endforeach
        {{ $daftikel->links() }}
         
          

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#dropbtn')) {
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
</script>

</body>

</html>
