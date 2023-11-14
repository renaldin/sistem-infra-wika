<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelRkp extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('rkp')
            ->join('user', 'user.id_user', '=', 'rkp.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp.id_proyek')
            ->orderBy('id_rkp', 'DESC')
            ->get();
    }
    
    public function dataIsRespon($isRespon)
    {
        return DB::table('rkp')
            ->join('user', 'user.id_user', '=', 'rkp.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp.id_proyek')
            ->where('is_respon', $isRespon)
            ->orderBy('id_rkp', 'DESC')
            ->get();
    }

    public function detail($id_rkp)
    {
        return DB::table('rkp')
            ->join('user', 'user.id_user', '=', 'rkp.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp.id_proyek')
            ->where('id_rkp', $id_rkp)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('rkp')->insert($data);
    }

    public function edit($data)
    {
        DB::table('rkp')->where('id_rkp', $data['id_rkp'])->update($data);
    }

    public function hapus($id_rkp)
    {
        DB::table('rkp')->where('id_rkp', $id_rkp)->delete();
    }

}
