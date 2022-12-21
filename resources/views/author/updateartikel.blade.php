<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin2.css">
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Panel</title>
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
              <a class="add" href="/buat-artikel">
                <i class='bx bx-plus'></i>&nbsp;<span>Buat Artikel</span>
              </a>
            </li>
            <li >
              <a  href="/author">
                <i class='bx bxs-dashboard'></i>&nbsp;<span>Artikel</span> 
              </a>
            </li>
            <li>
              <a href="/laporan-berita-author">
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
            </div>
        </div>

          <!--KONTEN--> 
     

        
        <div class="content">
            <div class="cards">
                <form class="judul" action="" method="POST" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="author" value="{{auth()->user()->name}}"><br>
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{$data->judul}}">
                    <label for="kategori">Kategori</label>
                    <br>
                    <select id="cars" name="kategori">
                        <option value="{{$data->kategori}}">Pilih Kategori</option>
                      <option value="Teknologi">Teknologi</option>
                      <option value="Olahraga">Olahraga</option>
                      <option value="Bencana">Bencana</option>
                      <option value="Politik">Politik</option>
                      <option value="Wisata">Wisata</option>
                      <option value="Pendidikan">Pendidikan</option>
                    </select><br>
                    <label for="gambar">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar" value="{{$data->gambar}}">

                    <label for="content">Content</label>
                    <textarea id="editor" name="content">{{$data->content}}</textarea>
                    <input type="hidden" name="views" value="0"><br>
                    <input type="hidden" name="rating" value="0"><br>
                    
                    <input class="post" type="submit" value="submit">
                </form>
            </div>
        </div>
       
         
          


<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

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
