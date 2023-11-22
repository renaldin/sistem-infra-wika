<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetailCsi extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('detail_csi')
            ->join('csi', 'csi.id_csi', '=', 'detail_csi.id_csi')
            ->join('aspek_csi', 'aspek_csi.id_aspek_csi', '=', 'detail_csi.id_aspek_csi')
            ->orderBy('id_detail_csi', 'ASC')
            ->get();
    }

    public function detail($id_detail_csi)
    {
        return DB::table('detail_csi')
            ->join('csi', 'csi.id_csi', '=', 'detail_csi.id_csi')
            ->join('aspek_csi', 'aspek_csi.id_aspek_csi', '=', 'detail_csi.id_aspek_csi')
            ->where('id_detail_csi', $id_detail_csi)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('detail_csi')->insert($data);
    }

    public function edit($data)
    {
        DB::table('detail_csi')->where('id_detail_csi', $data['id_detail_csi'])->update($data);
    }

    public function hapus($id_detail_csi)
    {
        DB::table('detail_csi')->where('id_detail_csi', $id_detail_csi)->delete();
    }

    public function hapusByCsi($id_csi)
    {
        DB::table('detail_csi')->where('id_csi', $id_csi)->delete();
    }
}
