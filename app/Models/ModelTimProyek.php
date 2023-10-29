<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelTimProyek extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('tim_proyek')
            ->orderBy('id_tim_proyek', 'DESC')
            ->get();
    }

    public function detail($id_tim_proyek)
    {
        return DB::table('tim_proyek')
            ->where('id_tim_proyek', $id_tim_proyek)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('tim_proyek')->insert($data);
    }

    public function edit($data)
    {
        DB::table('tim_proyek')->where('id_tim_proyek', $data['id_tim_proyek'])->update($data);
    }

    public function hapus($id_tim_proyek)
    {
        DB::table('tim_proyek')->where('id_tim_proyek', $id_tim_proyek)->delete();
    }
}
