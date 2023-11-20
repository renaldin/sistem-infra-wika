<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetailLicense extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('detail_license')
            ->join('software', 'software.id_software', '=', 'detail_license.id_software')
            ->join('license', 'license.id_license', '=', 'detail_license.id_license')
            ->select('*', 'software.fungsi as fungsi_software')
            ->orderBy('id_detail_license', 'DESC')->get();
    }

    public function detail($id_detail_license)
    {
        return DB::table('detail_license')
            ->join('software', 'software.id_software', '=', 'detail_license.id_software')
            ->join('license', 'license.id_license', '=', 'detail_license.id_license')
            ->select('*', 'software.fungsi as fungsi_software')
            ->where('id_detail_license', $id_detail_license)->first();
    }

    public function checkSoftware($id_software, $id_license)
    {
        return DB::table('detail_license')
            ->where('id_software', $id_software)
            ->where('id_license', $id_license)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('detail_license')->insert($data);
    }

    public function edit($data)
    {
        DB::table('detail_license')->where('id_detail_license', $data['id_detail_license'])->update($data);
    }

    public function hapus($id_detail_license)
    {
        DB::table('detail_license')->where('id_detail_license', $id_detail_license)->delete();
    }

    public function hapusLicense($id_license)
    {
        DB::table('detail_license')->where('id_license', $id_license)->delete();
    }
}
