<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelRkp extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('monitoring_rkp')
            ->join('proyek', 'proyek.id_proyek', '=', 'monitoring_rkp.id_proyek')
            ->orderBy('id_monitoring_rkp', 'DESC')
            ->get();
    }

    public function dataIsRespon($isRespon)
    {
        return DB::table('ki_km')
        ->join('proyek', 'proyek.id_proyek', '=', 'monitoring_rkp.id_proyek')
            ->where('is_respon', $isRespon)
            ->orderBy('id_monitoring_rkp', 'DESC')
            ->get();
    }

    public function detail($id_monitoring_rkp)
    {
        return DB::table('ki_km')
        ->join('proyek', 'proyek.id_proyek', '=', 'monitoring_rkp.id_proyek')
            ->where('id_monitoring_rkp', $id_monitoring_rkp)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('monitoring_rkp')->insert($data);
    }

    public function edit($data)
    {
        DB::table('monitoring_rkp')->where('id_monitoring_rkp', $data['id_monitoring_rkp'])->update($data);
    }

}
