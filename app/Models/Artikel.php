<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    public function detailArtikel(){
        return DB::table('artikel')->where('id', $id)->first();
    }
}


