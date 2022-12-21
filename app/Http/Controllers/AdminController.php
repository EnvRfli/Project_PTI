<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ArtikelModel;
use App\Models\iklanModel;
use Auth;
use Carbon\Carbon;
use DateTime;
class AdminController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $daftikel = ArtikelModel::OrderBy('created_at', 'DESC')
                ->paginate(5);
        return view('admin.admin', compact('daftikel', 'apdet'));
    }
    public function add(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        return view('admin.add', compact('apdet'));
    }
    public function analiklan(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $dafik = DB::table('iklan')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.analitik-iklan', compact('dafik', 'apdet'));
    }
    public function analuang(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $dafik = DB::table('iklan')->orderBy('id', 'DESC')->paginate(5);
        $agustus = DB::table('iklan')->whereBetween('Tanggal_mulai', ['2022-08-01', '2022-09-01'])
        ->SUM('harga');
        $september = DB::table('iklan')->whereBetween('Tanggal_mulai', ['2022-09-01', '2022-10-01'])
        ->SUM('harga');
        $oktober = DB::table('iklan')->whereBetween('Tanggal_mulai', ['2022-10-01', '2022-11-01'])
        ->SUM('harga');
        $november = DB::table('iklan')->whereBetween('Tanggal_mulai', ['2022-11-01', '2022-12-01'])
        ->SUM('harga');
        $desember = DB::table('iklan')->whereBetween('Tanggal_mulai', ['2022-12-01', '2023-01-01'])
        ->SUM('harga');
        return view('admin.analitik-keuangan', compact('dafik', 'agustus', 'september', 'oktober', 'november', 'desember', 'apdet'));
    }
    public function invites(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        
        $daftarauthor = DB::table('users')
        ->OrderBy('created_at', 'ASC')
        ->where('role', 'author')
        ->get();

        return view('admin.invite', compact('daftarauthor', 'apdet'));
    }

    public function destroy($id){
        $del = DB::table('users')->where('id', $id);
        $del->delete();
        return redirect()->route('invites')->with('message', 'Berhasil Menghapus Author');
    }

    public function inforik($id){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $informasi = iklanModel::find($id);
        return view('admin.informasi-iklan', compact('informasi', 'id', 'apdet'));
    }
    public function lapber(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $lteknologi = DB::table('berita')->where('kategori', 'Teknologi')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lolahraga = DB::table('berita')->where('kategori', 'Olahraga')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lbencana = DB::table('berita')->where('kategori', 'Bencana')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lpolitik = DB::table('berita')->where('kategori', 'Politik')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lwisata = DB::table('berita')->where('kategori', 'Wisata')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lpendidikan = DB::table('berita')->where('kategori', 'Pendidikan')->whereRaw('rating > 0')->whereRaw('rating > 3')->count();

        $tabelbawah = ArtikelModel::sortable()->OrderBy('rating', 'DESC')->paginate(5);

        $ratingburuk = DB::table('berita')->whereRaw('rating <= 3')->whereRaw('rating > 0')->COUNT();   
        
        $totalberita = DB::table('berita')->COUNT();
        return view('admin.laporan-berita', compact('apdet', 'lteknologi','lolahraga','lbencana','lpolitik','lwisata','lpendidikan', 'tabelbawah', 'ratingburuk', 'totalberita'));
    }

    public function tambik(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        return view('admin.tambah-iklan', compact('apdet'));
    }

    public function tambah_iklan(Request $request){
        $data = $request->validate([
            'nama_iklan' => 'required',
            'nama_pengiklan' => 'required',
            'ukuran_iklan' => 'required',
            'Tanggal_mulai' =>'required',
            'Tanggal_selesai' =>'required',
            'harga'=> '',
        ]);
        $now = new DateTime("{$data['Tanggal_mulai']}");
        $your_date = new DateTime("{$data['Tanggal_selesai']}");

        $sekarang = time();
        
        
        $totalhari = $your_date->diff($now)->format("%a");

        if(("{$data['ukuran_iklan']}") == '256x617'){
            $asd = $totalhari * 100000;
        }
        else{
            $asd = $totalhari * 150000;
        }
        

        // $data['Tanggal_mulai'] = Carbon::createFromFormat('m/d/Y', $data['Tanggal_mulai'])->format('Y-m-d');
        // $data['Tanggal_selesai'] = Carbon::createFromFormat('m/d/Y', $data['Tanggal_selesai'])->format('Y-m-d');

        $query = DB::table('iklan')->insert([
            
            'nama_iklan'=>$request->input('nama_iklan'),
            'nama_pengiklan'=>$request->input('nama_pengiklan'),
            'ukuran_iklan'=>$request->input('ukuran_iklan'),
            'Tanggal_mulai'=>$request->input('Tanggal_mulai'),
            'Tanggal_selesai'=>$request->input('Tanggal_selesai'), 
            'harga'=>$asd,
            
        ]);
            return redirect()->route('analiklan')->with('message','iklan baru telah ditambahkan!');

    }
    public function tambah_author(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255|unique:users',
            'role' =>'',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|min:6',
            
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'author';
        User::create($data);

        return redirect()->route('invites')->with('message', 'Berhasil Menambahkan Author');
    }

    public function profil(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        return view('admin.profile', compact('apdet'));
    }

    public function profilupdate(Request $request){
        $namaa = Auth::user()->name;

        $data = $request->validate([
            'profil' => 'mimes:jpg,jpeg,png,webp',
            'name' => 'max:255',
            'email' => 'email',
            'verification_q' => '',
        ]);

        if($request->profil === null){
            $asd = DB::table('users')->where('name', $namaa)
              ->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'verification_q'=>$request->input('verification_q'),
              ]);

            return redirect()->route('profil')->with('message', 'Berhasil Mengupdate Profile');
        }

        else{
        $file_name = $request->profil->getClientOriginalName();
        $image = $request->profil->storeAs('thumbnail',$file_name);

        $asd = DB::table('users')->where('name', $namaa)
              ->update([
                'profil'=> $image,
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'verification_q'=>$request->input('verification_q'),
              ]);

            return redirect()->route('profil')->with('message', 'Berhasil Mengupdate Profile');
        }
    }

    public function beritaburuk(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $ratingburuk = DB::table('berita')->whereRaw('rating <= 3')->whereRaw('rating > 0')->COUNT();   
        
        $totalberita = DB::table('berita')->COUNT();

        $listberbur = DB::table('berita')->whereRaw('rating <= 3')->whereRaw('rating > 0')->OrderBy('created_at', 'ASC')->paginate(5);
        return view('admin.berita-buruk', compact('apdet', 'listberbur', 'ratingburuk', 'totalberita'));
    }

    public function hapusartikeladmin($id){
        $del = DB::table('berita')->where('id', $id);
        $del->delete();
        return redirect()->route('beritaburuk')->with('message', 'Berhasil Menghapus Berita');
    }

    public function hapusartikeladmin2($id){
        $del = DB::table('berita')->where('id', $id);
        $del->delete();
        return redirect()->route('lapber')->with('message', 'Berhasil Menghapus Berita');
    }
}
