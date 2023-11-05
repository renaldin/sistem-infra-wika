<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKategoriPekerjaan extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('kategori_pekerjaan')->get();
    }
}
