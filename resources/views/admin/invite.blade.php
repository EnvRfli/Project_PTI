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
                <i class='bx bx-stats' ></i>&nbsp;<span>Analitik Iklan</span>
              </a>
            </li>
            <li>
              <a href="analitik-keuangan">
                <i class='bx bx-money-withdraw' ></i>&nbsp;<span>Analitik Keuangan</span>
              </a>
            </li>
            <li>
              <a  class="aktif" href="invite">
              <i class='bx bx-user-plus'></i>&nbsp;<span>Invite Author</span>
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

                            <h2>Penulis</h2>
                        </div>
                        

                        <div class="add">
                            <a href="add"> <i class='bx bx-user-plus bx-sm'></i></a>

                        </div>
                    </div>
                    <div class="table">
                        <table id="myTable">
                            <tr>

                                <th>Nama</td>
                                <th>Email</td>
                                <th>Aksi</td>
                                
                            </tr>

                            @foreach($daftarauthor as $total)
                            <tr>               
                                <td>{{$total->name}}</td>
                                <td>{{$total->email}}</td>
                                <td>         
                                <form method="DELETE" action="{{ route('invite.deleteauthor', [$total->id]) }}" onsubmit="return confirm('Hapus Author Ini?')">     
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}   
                                        <button class="bx bxs-trash bx-sm" type="submit" style="color: crimson; border-radius:10px;border-color:crimson"></button>                            
                                </form>
                               
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @if(session('message'))
                        <div class="alert success">
                          <span class="closebtn">&times;</span>  
                          <strong>{{session('message')}}</strong>
                        </div>
                        @endif
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
<script
  src="https://code.jquery.com/jquery-3.6.1.slim.js"
  integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<script>
  $('.delete').click(function(){
    var authorid = $(this).attr('data-id')
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = "invite/"+authorid+""
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your imaginary file is safe!");
    }
  });
  });
  
</script>

</html>
