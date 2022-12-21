<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ArtikelModel;
use Auth;

class HalamanbacaController extends Controller
{
    public function home(){
        $news = ArtikelModel::orderBy('created_at', 'DESC')->limit(3)
        ->get();

        $tekno = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Teknologi')
        ->first();

        $olga = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Olahraga')
        ->first();

        $bencana = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Bencana')
        ->first();

        $politik = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Politik')
        ->first();

        $pendidikan = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Pendidikan')
        ->first();

        $wisata = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Wisata')
        ->first();

        $beritapopuler = ArtikelModel::orderBy('rating', 'DESC')
        ->orderBy('views', 'DESC')
        ->limit(3)
        ->get();
        return view('home', compact('news', 'tekno', 'olga', 'bencana', 'politik', 'pendidikan', 'wisata', 'beritapopuler'));
    }

    public function tentangkami(){
        return view('tentang-kami');
    }

    public function kategori($kategori){
        $newskategori = ArtikelModel::orderBy('created_at', 'DESC')
        ->where('kategori', $kategori)
        ->get(); 

        $tekno = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Teknologi')
        ->first();

        $olga = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Olahraga')
        ->first();

        $bencana = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Bencana')
        ->first();

        $politik = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Politik')
        ->first();

        $pendidikan = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Pendidikan')
        ->first();

        $wisata = ArtikelModel::orderBy('views', 'DESC')
        ->where('kategori', 'Wisata')
        ->first();

        $beritapopuler = ArtikelModel::orderBy('rating', 'DESC')
        ->orderBy('views', 'DESC')
        ->limit(3)
        ->get();

        return view('kategoriberita', compact('newskategori', 'tekno', 'olga', 'bencana', 'politik', 'pendidikan', 'wisata', 'beritapopuler'));
    }
    
    public function bacaa($id){
        $data = ArtikelModel::find($id);
        
        $beritapopuler = ArtikelModel::orderBy('rating', 'DESC')
        ->orderBy('views', 'DESC')
        ->limit(3)
        ->get();

        return view('baca2', compact('data', 'id', 'beritapopuler'));

    }

    public function berirating(Request $request, $id){
        $rating = $request->input('rating');
        DB::table('berita')
              ->where('id', $id)
              ->update(['rating' => $rating]);
        
              return back()->with('sukses','Terimakasih atas Rating Anda');
    }

    public function kabadi($id){
        $data = ArtikelModel::find($id);

        $beritapopuler = ArtikelModel::orderBy('rating', 'DESC')
        ->orderBy('views', 'DESC')
        ->limit(3)
        ->get();

        return view('baca2', compact('data', 'id', 'beritapopuler'));
    }
}
