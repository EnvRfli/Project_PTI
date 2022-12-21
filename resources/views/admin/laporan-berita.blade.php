<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" href="/css/admin2.css">
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel='stylesheet' href="{{asset('bootstrap-4.1.1/css/bootstrap.min.css')}}">

     <!-- Latest compiled and minified CSS -->

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
            <li >
              <a  class="aktif" href="laporan-berita">
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
            <div class="cards">
                <a href="berita-buruk" style="color:black" class="laporan">
                      <i class='bx bx-error-circle bx-lg bx-border' style="color: #ED4337" ></i>
                      <div>
                          <h2>Rating Buruk</h2>
                          <h2 style="color: #ED4337">{{$ratingburuk}}</h2>
                      </div>
                </a>
                <div class="laporan">
                    <i class='bx bx-category  bx-lg bx-border' style="color: #009AE1"></i>
                    <div>
                        <h2>Kategori berita</h2>
                        <h2 style="color: #009AE1">6</h2>
                    </div>
                </div>
                <div class="laporan">
                    <i class='bx bxs-report  bx-lg bx-border' style="color: #7805A0"></i>
                    <div>
                        <h2>Total berita</h2>
                        <h2 style="color: #7805a0">{{$totalberita}}</h2>
                    </div>
                </div>
            </div>

            <div class="container-laporan">
              <div class="isi">
                <h2>LAPORAN BERITA</h2>
              </div>
              
              <div class="isi-laporan">
                
                <!--Laporan pie chart kategori-->
                <h2 style="padding:20px">Kategori Teratas berdasarkan rating</h2>
                <div  class="chart">
                  <canvas style="align-items: center" id="myChart" style="width:100%;max-width:300px"></canvas>
                </div>

                <!--Table-->
                <div class="table">
                  <h2>Daftar Berita</h2>
                  <table class="myTable">
                    <tr>
                      <th>No</th>
                      <th>Judul Artikel</td>
                      <th>Author</td>
                      <th>Kategori</td>
                      <th>Tanggal</td>
                      <th>@sortablelink('rating')</td>
                      <th>action</th>
                    </tr>
                    @foreach($tabelbawah as $index => $data)
                    <tr>
                      <td>{{ $index + $tabelbawah->firstItem() }}</td>
                      <td>{{$data->judul}}</td>
                      <td>{{$data->author}}</td>
                      <td>{{$data->kategori}}</td>
                      <td>{{$data->created_at}}</td>
                      <td>{{$data->rating}}</td>
                      <td>
                      <form method="DELETE" action="{{ route('hapusartikeladmin2', [$data->id]) }}" onsubmit="return confirm('Hapus Berita Ini?')">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}  
                          <button class='bx bx-trash bx-sm' style="color: #ED4337" type="submit"></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </table>
                  <br/>
                {{ $tabelbawah->links() }}
                </div>
              </div>

            </div>
        </div>
        

        
    </div>
<script>
  //pie chart//
var xValues = ["Teknologi", "Olahraga", "Bencana", "Politik", "Wisata", "Pendidikan"];
var yValues = ['{{$lteknologi}}', '{{$lolahraga}}', '{{$lbencana}}', '{{$lpolitik}}', '{{$lwisata}}', '{{$lpendidikan}}'];
var barColors = [
  "#5E3FBE",
  "#e8c3b9",
  "#57D1F8",
  "#FF0000",
  "#FFFEa4",
  "#193ac5"
  
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
