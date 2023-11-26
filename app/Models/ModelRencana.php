<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelRencana extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('rencana')
            ->orderBy('tahun', 'DESC')
            ->get();
    }

    public function detail($id_rencana)
    {
        return DB::table('rencana')
            ->where('id_rencana', $id_rencana)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('rencana')->insert($data);
    }

    public function edit($data)
    {
        DB::table('rencana')->where('id_rencana', $data['id_rencana'])->update($data);
    }

    public function hapus($id_rencana)
    {
        DB::table('rencana')->where('id_rencana', $id_rencana)->delete();
    }

    public function checkData($tipe, $tahun)
    {
        return DB::table('rencana')
            ->where('tipe', $tipe)
            ->where('tahun', $tahun)
            ->first();
    }
}
