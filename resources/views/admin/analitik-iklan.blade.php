

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
     <script src="https://kit.fontawesome.com/53ddd97378.js" crossorigin="anonymous"></script>

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
            <li  >
              <a class="aktif" href="analitik-iklan">
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
              <div class="isi-laporan">
                <!--Table-->
                <div class="table">
                  <!--tambah iklan-->
                  <div class="tambah">
                    <h2>Iklan</h2>
                    <a  href="tambah-iklan" class="add">
                      <i class="fa-solid fa-plus"></i>
                    </a>
                  </div>

                  <!--akhit tambah iklan-->
                  <table id="TableSaya">
                    <tr>
                      <th>no</td>
                      <th>Nama Iklan</td>
                      <th>Nama Pengiklan</td>
                      <th>Ukuran Iklan</td>
                      <th>Tanggal Mulai</td>
                      <th>Tanggal Selesai</td>
                    </tr>
                    @foreach($dafik as $index =>$data)
                    <tr>
                    <td>{{ $index + $dafik->firstItem() }}</td>
                      <td>{{$data->nama_iklan}}</td>
                      <td>{{$data->nama_pengiklan}}</td>
                      <td>{{$data->ukuran_iklan}}</td>
                      <td>{{$data->Tanggal_mulai}}</td>
                      <td>{{$data->Tanggal_selesai}}</td>
                    </tr>
                    @endforeach
                  </table>
                  @if(session('message'))
                        <div class="alert success">
                          <span class="closebtn">&times;</span>  
                          <strong>{{session('message')}}</strong>
                        </div>
                        @endif
                  <br/>
                  {{ $dafik->links() }}
                  
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
