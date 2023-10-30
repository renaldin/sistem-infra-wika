<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetailTimProyek extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('detail_tim_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'detail_tim_proyek.id_tim_proyek')
            ->join('user', 'user.id_user', '=', 'detail_tim_proyek.id_user')
            ->orderBy('id_detail_tim_proyek', 'DESC')
            ->get();
    }

    public function dataWhere($field, $value)
    {
        return DB::table('detail_tim_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'detail_tim_proyek.id_tim_proyek')
            ->join('user', 'user.id_user', '=', 'detail_tim_proyek.id_user')
            ->where($field, $value)
            ->get();
    }

    public function detail($id_detail_tim_proyek)
    {
        return DB::table('detail_tim_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'detail_tim_proyek.id_tim_proyek')
            ->join('user', 'user.id_user', '=', 'detail_tim_proyek.id_user')
            ->where('id_detail_tim_proyek', $id_detail_tim_proyek)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('detail_tim_proyek')->insert($data);
    }

    public function edit($data)
    {
        DB::table('detail_tim_proyek')->where('id_detail_tim_proyek', $data['id_detail_tim_proyek'])->update($data);
    }

    public function hapus($id_detail_tim_proyek)
    {
        DB::table('detail_tim_proyek')->where('id_detail_tim_proyek', $id_detail_tim_proyek)->delete();
    }

    public function hapusAnggota($id_tim_proyek)
    {
        DB::table('detail_tim_proyek')->where('id_tim_proyek', $id_tim_proyek)->delete();
    }
}
