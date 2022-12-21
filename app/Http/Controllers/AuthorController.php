<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ArtikelModel;
use Auth;
class AuthorController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();

        $authors = Auth::user()->name;
        $daftikel = ArtikelModel::OrderBy('created_at', 'DESC')
                ->where('author', $authors)
                ->paginate(5);
        return view('author.author', compact('apdet', 'daftikel'));
    }
    public function buatart()
    {
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        return view('author.buat-artikel', compact('apdet'));
    }
    public function lapberauth(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        $nama = Auth::user()->name;
        $lteknologi = DB::table('berita')->where('kategori', 'Teknologi')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lolahraga = DB::table('berita')->where('kategori', 'Olahraga')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lbencana = DB::table('berita')->where('kategori', 'Bencana')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lpolitik = DB::table('berita')->where('kategori', 'Politik')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lwisata = DB::table('berita')->where('kategori', 'Wisata')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();
        $lpendidikan = DB::table('berita')->where('kategori', 'Pendidikan')->where('author', $nama)->whereRaw('rating > 0')->whereRaw('rating > 3')->count();

        $tabelbawah = ArtikelModel::sortable()->OrderBy('rating', 'DESC')->paginate(5);

        $ratingburuk = DB::table('berita')->whereRaw('rating <= 3')->whereRaw('rating > 0')->where('author', $nama)->COUNT();   
        
        $totalberita = DB::table('berita')->where('author', $nama)->COUNT();
        return view('author.laporan-berita-author', compact('apdet', 'lteknologi','lolahraga','lbencana','lpolitik','lwisata','lpendidikan', 'tabelbawah', 'ratingburuk', 'totalberita'));
    }
    public function tambah_artikel(Request $request)
    {
        $data = $request->validate([
            'author'=>'',
            'judul' => 'required|max:255',
            'gambar' => 'required|mimes:jpg,jpeg,png,webp',
            'content' => 'required',
            'kategori' =>'required',
            'rating'=>'',
            'views'=>'',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('thumbnail',$file_name);

        $data['author'] = '{{auth()->user()->name}}';
        $data['rating'] = '0';
        $data['views'] = '0';

        $query = DB::table('berita')->insert([
            
            'author'=>$request->input('author'),
            'judul'=>$request->input('judul'),
            'gambar'=>$image,
            'content'=>$request->input('content'),
            'kategori'=>$request->input('kategori'),
            'rating'=>$request->input('rating'),
            'views'=>$request->input('views'),
            
        ]);

        if($query){
            return back()->with('message','berita baru telah ditambahkan!');
        }
        else{
            return back()->with('message','berita gagal ditambahkan');
        }
    }

    public function update_artikelget($id){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        $data = ArtikelModel::find($id);
        return view('author.updateartikel', compact('apdet', 'data', 'id'));
    }

    public function update_artikel(Request $request, $id){
        $data = $request->validate([
            'author'=>'',
            'judul' => 'max:255',
            'gambar' => 'mimes:jpg,jpeg,png,webp',
            'content' => '',
            'kategori' =>'',
            'rating'=>'',
        ]);
        
        if($request->gambar === null){
        $data['author'] = '{{auth()->user()->name}}';
        $data['rating'] = '0';

        DB::table('berita')->where('id', $id)->update([
            
            'author'=>$request->input('author'),
            'judul'=>$request->input('judul'),
            'content'=>$request->input('content'),
            'kategori'=>$request->input('kategori'),
            'rating'=>$request->input('rating'),      
        ]);

        return redirect()->route('lapberauth')->with('message', 'Berhasil Mengupdate Berita');
        }

        else{
        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('thumbnail',$file_name);

        $data['author'] = '{{auth()->user()->name}}';
        $data['rating'] = '0';

        DB::table('berita')->where('id', $id)
        ->update([
            'author'=>$request->input('author'),
            'judul'=>$request->input('judul'),
            'gambar'=>$image,
            'content'=>$request->input('content'),
            'kategori'=>$request->input('kategori'),
            'rating'=>$request->input('rating'),      
        ]);

        return redirect()->route('lapberauth')->with('message', 'Berhasil Mengupdate Berita');
        }
    }

    public function profilauthor(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        return view('author.profileauthor', compact('apdet'));
    }

    public function profilupdateauthor(Request $request){
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

            return redirect()->route('profilauthor')->with('message', 'Berhasil Mengupdate Profile');
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

            return redirect()->route('profilauthor')->with('message', 'Berhasil Mengupdate Profile');
        }
    }

    public function hapusartikelauthor($id){
        $del = DB::table('berita')->where('id', $id);
        $del->delete();
        return redirect()->route('lapberauth')->with('message', 'Berhasil Menghapus Berita');
    }

    public function beritaburukauthor(){
        $name = Auth::user()->name;
        $apdet = DB::table('users')->where('name', $name)->first();
        $aut = auth()->user()->name;

        $ratingburuk = DB::table('berita')->whereRaw('rating <= 3')->whereRaw('rating > 0')->where('author', $aut)->COUNT();   
        
        $totalberita = DB::table('berita')->where('author', $aut)->COUNT();

        $listberbur = DB::table('berita')->where('author', $aut)->whereRaw('rating <= 3')->whereRaw('rating > 0')->OrderBy('created_at', 'ASC')->paginate(5);
        return view('author.berita-buruk-author', compact('apdet', 'listberbur', 'ratingburuk', 'totalberita'));
    }

    public function hapusartikelauthor2($id){
        $del = DB::table('berita')->where('id', $id);
        $del->delete();
        return redirect()->route('beritaburukauthor')->with('message', 'Berhasil Menghapus Berita');
    }
}
