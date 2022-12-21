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

    <title>Author Panel</title>
</head>

<body>
    <div class="side-menu">
      <a href="/home" class="brand-name">
            <img src="/img/logo.png" alt="">
            </a>
        <!--list-->
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
    </div>
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
        

        <div class="content">
            <div class="cards">
                <div class="laporan">
                    <i class='bx bx-error-circle bx-lg bx-border' style="color: #ED4337" ></i>
                    <div>
                        <h2>Rating Buruk</h2>
                        <h2 style="color: #ED4337">{{$ratingburuk}}</h2>
                    </div>
                </div>
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
                <table class="myTable">
                    <tr>
                        <th>no</th>
                        <th style="width: 40px">Img</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Upload</th>
                        <th>Rating</th>
                        <Th>Aksi</Th>
                    </tr>
                    @foreach($listberbur as $index => $data)
                    <tr>
                        <td>{{ $index + $listberbur->firstItem() }}</td>
                        <td>
                            <img src="/storage/{{$data->gambar}}" alt="">
                        </td>
                        <td>{{$data->judul}}</td>
                        <td style="color: salmon">{{$data->kategori}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->rating}}</td>
                        <td>
                        <a href="/updateartikel/{{$data->id}}"><i class='bx bxs-edit bx-sm' style="color: orange "></i></a> &nbsp;
                        <form method="DELETE" action="{{ route('hapusartikelauthor2', [$data->id]) }}" onsubmit="return confirm('Hapus Berita Ini?')">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}  
                          <button class='bx bx-trash bx-sm' style="color: #ED4337;border:none" type="submit" ></button>
                        </form>
                        </td>
                      
                    </tr>
                    @endforeach
                </table>
                {{ $listberbur->links() }}
         

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
