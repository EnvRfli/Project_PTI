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
    <div class="side-menu">
    <a href="/home" class="brand-name">
            <img src="/img/logo.png" alt="">
        </a>
        <!--list-->
        <ul>
            <li>
              <a href="admin">
                <i class='bx bxs-dashboard'></i>&nbsp;<span>Artikel</span> 
              </a>
            </li>
            <li>
              <a href="laporan-berita">
                <i class='bx bxs-report' ></i>&nbsp;<span>Laporan Berita</span> 
              </a>
            </li>
            <li>
              <a href="analitik-iklan">
                <i class='bx bx-stats' ></i>&nbsp;<span>Laporan Iklan</span>
              </a>
            </li>
            <li>
              <a href="analitik-keuangan">
                <i class='bx bx-money-withdraw' ></i>&nbsp;<span>Analitik Keuangan</span>
              </a>
            </li>
            <li>
              <a  class="aktif" href="invite">
                <i class='bx bx-user'></i>&nbsp;<span>Invite Author</span>
              </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
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
                            <a href="/profileadmin">Profile</a>
                            <a href="{{url('logout')}}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="content">
            <div class="container-laporan">
                <div class="isi-laporan">
                    <!--Table-->
                    <div class="head-invite">
                        <div class="penulis">

                            <h2>Tambah Penulis</h2>
                        </div>
                    </div>

                    <div class="table">
                        <form action="/add" method="POST">
                        @csrf
                          <div class="form-group">
                            <label for="name">Nama</label><br>
                            <input type="text" name="name" id="nama" placeholder="John Doe">
                            @error('name')
                            <div class="text-danger mt-2">
                              {{$message}}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="email">Email</label><br>
                            <input type="email" name="email" id="email" placeholder="johndoe@gmail.com">
                            @error('email')
                            <div class="text-danger mt-2">
                              {{$message}}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password" placeholder="******">
                            @error('password')
                            <div class="text-danger mt-2">
                              {{$message}}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="phone">No Hp</label><br>
                            <input type="text" name="phone" id="nohp">
                            @error('phone')
                            <div class="text-danger mt-2">
                              {{$message}}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <input type="submit" value="Tambah Penulis">
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
