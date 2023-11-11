<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelMasterActivity extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('master_activity')
            ->join('user', 'user.id_user', '=', 'master_activity.id_user')
            ->orderBy('id_master_activity', 'DESC')
            ->get();
    }

    public function whereMonthYear($monthYear)
    {
        return DB::table('master_activity')
            ->join('user', 'user.id_user', '=', 'master_activity.id_user')
            ->whereRaw('DATE_FORMAT(tanggal_master, "%Y-%m") = ?', [$monthYear])
            ->orderBy('id_master_activity', 'DESC')
            ->get();
    }

    public function masterFungsi($monthYear)
    {
        return DB::table('master_activity')
            ->join('user', 'user.id_user', '=', 'master_activity.id_user')
             ->whereRaw('DATE_FORMAT(tanggal_master, "%Y-%m") = ?', [$monthYear])
            ->select('master_activity.id_user', 'master_activity.work_hours','user.fungsi')
            ->groupBy('master_activity.id_user', 'master_activity.work_hours','user.fungsi')
            ->get();
    }
    // public function masterFungsi($monthYear)
    // {
    //     return DB::table('master_activity')
    //         ->join('engineering_activity', 'engineering_activity.id_user', '=', 'master_activity.id_user')
    //         ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
    //         ->whereRaw('DATE_FORMAT(tanggal_master, "%Y-%m") = ?', [$monthYear])
    //         ->select('master_activity.id_user', 'master_activity.work_hours','kategori_pekerjaan.fungsi')
    //         ->groupBy('master_activity.id_user', 'master_activity.work_hours','kategori_pekerjaan.fungsi')
    //         ->get();
    // }

    public function masterPerson($id_user, $monthYear)
    {
        return DB::table('master_activity')
            ->join('engineering_activity', 'engineering_activity.id_user', '=', 'master_activity.id_user')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->whereRaw('DATE_FORMAT(tanggal_master, "%Y-%m") = ?', [$monthYear])
            ->select('master_activity.id_user', 'master_activity.work_hours','kategori_pekerjaan.fungsi')
            ->groupBy('master_activity.id_user', 'master_activity.work_hours','kategori_pekerjaan.fungsi')
            ->where('master_activity.id_user', $id_user)
            ->first();
    }

    public function detail($id_master_activity)
    {
        return DB::table('master_activity')
            ->join('user', 'user.id_user', '=', 'master_activity.id_user')
            ->where('id_master_activity', $id_master_activity)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('master_activity')->insert($data);
    }

    public function edit($data)
    {
        DB::table('master_activity')->where('id_master_activity', $data['id_master_activity'])->update($data);
    }

    public function hapus($monthYear)
    {
        DB::table('master_activity')
            ->whereRaw('DATE_FORMAT(tanggal_master, "%Y-%m") = ?', [$monthYear])
            ->delete();
    }
}
