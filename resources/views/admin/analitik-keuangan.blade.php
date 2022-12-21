<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin2.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
            <li >
              <a class="aktif" href="analitik-keuangan">
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

        <div class="content">

          <h2 style="padding:20px">Laporan Keuangan</h2>
          <div class="center" style="display:flex;align-items:center; justify-content:center;">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
          </div>

          <h3>Data Iklan</h3>
                <!--Table-->
                <div class="table">
                  <table id="TableSaya">
                    <tr>
                      <th>id</td>
                      <th>Nama Iklan</td>
                      <th>Nama Pengiklan</td>
                      <th>Ukuran Iklan</td>
                      <th>Tanggal Mulai</td>
                      <th>Tanggal Selesai</td>
                      <th>Biaya</td>
                      <th>Pdf</th>
                    </tr>
                    @foreach($dafik as $index =>$data)
                    <tr>
                    <td>{{ $index + $dafik->firstItem() }}</td>
                      <td>{{$data->nama_iklan}}</td>
                      <td>{{$data->nama_pengiklan}}</td>
                      <td>{{$data->ukuran_iklan}}</td>
                      <td>{{$data->Tanggal_mulai}}</td>
                      <td>{{$data->Tanggal_selesai}}</td>
                      <?php
                        $now = new DateTime("{$data->Tanggal_mulai}");
                        $your_date = new DateTime("{$data->Tanggal_selesai}");

                        $sekarang = time();
                        
                        
                        $totalhari = $your_date->diff($now)->format("%a");

                        if(('{{$data->ukuran_iklan}}') == '256x617'){
                          $biaya = $totalhari * 100000;
                        }
                        else{
                          $biaya = $totalhari * 150000;
                        }
                        ?>
                      <td>@currency($biaya)</td>
                      <td>
                        <a href="informasi-iklan/{{$data->id}}"  target="_blank">
                          <i id="myBtn" class='bx bxs-file-pdf bx-lg'></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                  {{ $dafik->links() }}
                </div>


              </div>

            </div>
        </div>
    </div>
    <div></div>
    <script>
var xValues = ["Agustus", "September", "Oktober", "November", "Desember"];
var yValues = ['{{$agustus}}', '{{$september}}', '{{$oktober}}', '{{$november}}', '{{$desember}}'];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Analisa Keuangan 2022"
    }
  }
});
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

