<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDokumenLps extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('dokumen_lps')
            ->orderBy('id_dokumen_lps', 'ASC')
            ->get();
    }

    public function detail($id_dokumen_lps)
    {
        return DB::table('dokumen_lps')
            ->where('id_dokumen_lps', $id_dokumen_lps)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('dokumen_lps')->insert($data);
    }

    public function edit($data)
    {
        DB::table('dokumen_lps')->where('id_dokumen_lps', $data['id_dokumen_lps'])->update($data);
    }

    public function jumlahData() 
    {
        $data = [
            'utama' => DB::table('dokumen_lps')->where('jenis_dokumen', 'Utama')->count(),
            'pendukung' => DB::table('dokumen_lps')->where('jenis_dokumen', 'Pendukung')->count()
        ];
        return $data;
    }
}
