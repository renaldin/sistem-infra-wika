<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAuth extends Model
{
    use HasFactory;

    public function cekNip($nip)
    {
        return DB::table('user')->where('nip', $nip)->first();
    }
}
