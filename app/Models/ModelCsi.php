<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCsi extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('csi')
            ->join('user', 'user.id_user', '=', 'csi.id_user')
            ->join('proyek', 'proyek.id_proyek', '=', 'csi.id_proyek')
            ->orderBy('id_csi', 'DESC')
            ->get();
    }

    public function detail($id_csi)
    {
        return DB::table('csi')
            ->join('user', 'user.id_user', '=', 'csi.id_user')
            ->join('proyek', 'proyek.id_proyek', '=', 'csi.id_proyek')
            ->where('id_csi', $id_csi)
            ->first();
    }

    public function lastData()
    {
        return DB::table('csi')
            ->orderBy('id_csi', 'DESC')
            ->first();
    }

    public function checkData($id_proyek, $periode)
    {
        return DB::table('csi')
            ->where('id_proyek', $id_proyek)
            ->where('periode', $periode)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('csi')->insert($data);
    }

    public function edit($data)
    {
        DB::table('csi')->where('id_csi', $data['id_csi'])->update($data);
    }

    public function hapus($id_csi)
    {
        DB::table('csi')->where('id_csi', $id_csi)->delete();
    }
}
