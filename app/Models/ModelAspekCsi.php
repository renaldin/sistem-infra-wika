<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAspekCsi extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('aspek_csi')
            ->orderBy('id_aspek_csi', 'ASC')
            ->get();
    }
}
