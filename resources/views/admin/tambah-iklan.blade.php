<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://apis.google.com/_/scs/abc-static/_/js/k=gapi.gapi.en.7I3T5S8x4Qg.O/m=gapi_iframes,googleapis_client/rt=j/sv=1/d=1/ed=1/rs=AHpOoo9SzNpm6HglASFo9cZ-GgP5E5f5WQ/cb=gapi.loaded_0" nonce="" async=""></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
              <a  href="laporan-berita">
                <i class='bx bxs-report' ></i>&nbsp;<span>Laporan Berita</span> 
              </a>
            </li>
            <li >
              <a  class="aktif" href="analitik-iklan">
                <i class='bx bx-stats' ></i>&nbsp;<span>Laporan Iklan</span>
              </a>
            </li>
            <li>
              <a href="analitik-keuangan">
                <i class='bx bx-money-withdraw' ></i>&nbsp;<span>Analitik Keuangan</span>
              </a>
            </li>
            <li>
              <a href="invite">
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
              <div class="isi">
                <h2>TAMBAH IKLAN</h2>
              </div>
              
              <div class="table">
                <form action="/tambah-iklan" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div>
                    <label for="nama_iklan">Nama iklan</label>
                    <input type="text" name="nama_iklan" id="nama-iklan">
                      @error('nama_iklan')
                      <div class="text-danger mt-2">
                        {{$message}}
                      </div>
                      @enderror
                  </div>

                  <div>
                    <label for="nama_pengiklan">Nama Pengiklan</label>
                    <input type="text" name="nama_pengiklan" id="nama-pengiklan">
                    @error('nama_pengiklan')
                      <div class="text-danger mt-2">
                        {{$message}}
                      </div>
                      @enderror
                  </div>

                  <div>
                    <label for="ukuran_iklan">Ukuran Iklan</label>
                    <input list="ukuran" name="ukuran_iklan">
                    <datalist id="ukuran">
                        <option value="256x617">
                        <option value="1013x125">
                    </datalist>
                    @error('ukuran_iklan')
                      <div class="text-danger mt-2">
                        {{$message}}
                      </div>
                      @enderror
                  </div>

                  <div>
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" name="Tanggal_mulai" id="tanggal">
                    @error('Tanggal_mulai')
                      <div class="text-danger mt-2">
                        {{$message}}
                      </div>
                      @enderror
                    </div>

                    <div>
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" name="Tanggal_selesai" id="tanggal">
                    @error('Tanggal_selesai')
                      <div class="text-danger mt-2">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    
                    <input type="submit" value="Tambah Iklan">
                </form>
              </div>
            </div>
        </div>
        

        
    </div>
<script>
  //pie chart//
var xValues = ["Olahraga", "Bencana Alam", "Makanan", "Game"];
var yValues = [25, 25, 50, 10];
var barColors = [
  "#5E3FBE",
  "#e8c3b9",
  "#57D1F8",
  "#FF0000"
  
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  
});

//dropdown script

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
