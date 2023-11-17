<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelLps extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('lps')
            ->join('proyek', 'proyek.id_proyek', '=', 'lps.id_proyek')
            ->join('dokumen_lps', 'dokumen_lps.id_dokumen_lps', '=', 'lps.id_dokumen_lps')
            ->orderBy('id_lps', 'ASC')
            ->get();
    }

    public function dataProyek()
    {
        return DB::table('lps')
            ->join('proyek', 'proyek.id_proyek', '=', 'lps.id_proyek')
            ->join('dokumen_lps', 'dokumen_lps.id_dokumen_lps', '=', 'lps.id_dokumen_lps')
            ->select('lps.id_proyek', 'nama_proyek')
            ->groupBy('lps.id_proyek', 'nama_proyek')
            ->orderBy('id_lps', 'ASC')
            ->get();
    }

    public function detail($id_lps)
    {
        return DB::table('lps')
            ->join('proyek', 'proyek.id_proyek', '=', 'lps.id_proyek')
            ->join('dokumen_lps', 'dokumen_lps.id_dokumen_lps', '=', 'lps.id_dokumen_lps')
            ->where('id_lps', $id_lps)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('lps')->insert($data);
    }

    public function edit($data)
    {
        DB::table('lps')->where('id_lps', $data['id_lps'])->update($data);
    }

    public function hapus($data) 
    {
        DB::table('lps')->where($data['where'], $data['value'])->delete();
    }
}
