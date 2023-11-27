<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelProyek extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->orderBy('id_proyek', 'DESC')
            ->get();
    }

    public function dataProyek()
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->orderBy('realisasi', 'DESC')
            ->get();
    }

    public function dataWhere($field, $value)
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->where($field, $value)
            ->first();
    }

    public function detail($id_proyek)
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->where('id_proyek', $id_proyek)
            ->first();
    }

    public function detailLps($id_proyek)
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->join('user', 'user.id_user', '=', 'proyek.id_user_lps')
            ->where('id_proyek', $id_proyek)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('proyek')->insert($data);
    }

    public function edit($data)
    {
        DB::table('proyek')->where('id_proyek', $data['id_proyek'])->update($data);
    }

    public function hapus($id_proyek)
    {
        DB::table('proyek')->where('id_proyek', $id_proyek)->delete();
    }

    public function jumlahProyek() 
    {
        return DB::table('proyek')->count();
    }

    public function jumlah($status) {
        return DB::table('proyek')->where('prioritas', $status)->count();
    }

    public function prioritas($prioritas)
    {
        return DB::table('proyek')->where('prioritas', $prioritas)->get();
    }
}
