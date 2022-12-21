<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Kyslik\ColumnSortable\Sortable;

class ArtikelModel extends Model
{
    use HasFactory, Sortable;
    protected $table='berita';
    public $timestamps = false;
    public $sortable = ['rating'];
}

