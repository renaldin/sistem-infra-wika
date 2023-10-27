<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelProjek extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('projek')
            ->join('user', 'user.id_user', '=', 'projek.id_kesie_eng', 'projek')
            ->orderBy('id_projek', 'DESC')
            ->get();
    }

    public function detail($id_projek)
    {
        return DB::table('projek')
            ->join('user', 'user.id_user', '=', 'projek.id_kesie_eng', 'projek')
            ->where('id_projek', $id_projek)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('projek')->insert($data);
    }

    public function edit($data)
    {
        DB::table('projek')->where('id_projek', $data['id_projek'])->update($data);
    }

    public function hapus($id_projek)
    {
        DB::table('projek')->where('id_projek', $id_projek)->delete();
    }
}
