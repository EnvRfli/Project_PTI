<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/profile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Profile</title>
</head>
<body>
    <form action="{{route('profilupdate')}}" enctype="multipart/form-data" method="POST" class="container">
        <header>
            <a href="/admin" style="text-decoration: none; color:white">
                <i class='bx bx-arrow-back' ></i>
            </a>
            Profile
        </header>

        <div class="item">
            <div class="left">
                <div class="header">
                    <i class='bx bxs-user-circle bx-sm'></i>&nbsp;
                    <h4>Edit Profile</h4>
                </div>
    
                <div class="editprofile">
                        @csrf
                        <table>
                            <tr>
                                <td>Foto Profile</td>
                                <td>
                                    <label for="pp">
                                        <i class='bx bx-upload' ></i>&nbsp;
                                        pilih gambar
                                    </label>
                                    <input style="display: none" type="file" name="profil" id="pp" value="{{$apdet->profil}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="name" id="nama" value="{{ $apdet->name }}"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" id="email" value="{{ $apdet->email }}"></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                </div>
            </div>
    
            <div class="right">
                <div class="header">
                    <i class='bx bx-user bx-sm' ></i>&nbsp;
                    <h4>Profile</h4>
                </div>
    
                <div class="informasi">
                @if($apdet->profil == NULL)
                    <img src="/img/people.webp" alt="user">
                  @else
                    <img src="/storage/{{$apdet->profil}}" alt="user">
                  @endif
    
                    <div class="nama">
                        <h3>Nama</h3>
                        <p>{{ $apdet->name }}</p>
                    </div>
    
                    <div class="email">
                        <h3>Email</h3>
                        <p>{{ $apdet->email }}</p>
                    </div>
                </div>
    
            </div>
        </div>

        <div class="keamanan">
            <div class="header">
                <i class='bx bxs-lock-alt' ></i>&nbsp;
                Keamanan
            </div>

            <div class="password">
                    <label for="text">
                        Masukkan nama hewan peliharaan anda <br>
                        <input type="text" name="verification_q" value="{{$apdet->verification_q}}"><br>
                    </label>
                    @if(session('message'))
                                    <div class="alert success">
                                    <span class="closebtn">&times;</span>  
                                    <strong>{{session('message')}}</strong>
                                    </div>
                        @endif
            </div>
        </div>
        <div class="submit" style="width: 100%">
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>