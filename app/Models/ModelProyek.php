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

    public function detail($id_proyek)
    {
        return DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
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
}
