<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSoftware extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('software')->orderBy('id_software', 'DESC')->get();
    }

    public function detail($id_software)
    {
        return DB::table('software')->where('id_software', $id_software)->first();
    }

    public function tambah($data)
    {
        DB::table('software')->insert($data);
    }

    public function edit($data)
    {
        DB::table('software')->where('id_software', $data['id_software'])->update($data);
    }

    public function hapus($id_software)
    {
        DB::table('software')->where('id_software', $id_software)->delete();
    }

    public function jumlahSoftware()
    {
        return DB::table('software')->count();
    }
}
