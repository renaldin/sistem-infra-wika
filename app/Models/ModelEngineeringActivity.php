<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelEngineeringActivity extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('engineering_activity')
            ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->orderBy('user.nama_user', 'ASC')
            ->get();
    }

    public function dataProductivityTeam($monthYear)
    {
        return DB::table('engineering_activity') 
            ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->whereRaw('DATE_FORMAT(tanggal_masuk_kerja, "%Y-%m") = ?', $monthYear)
            ->select('engineering_activity.id_user', 'nama_user', 'user.fungsi', DB::raw('SUM(durasi) as jumlah_durasi'))
            ->groupBy('engineering_activity.id_user', 'nama_user', 'user.fungsi')
            ->get();
    }
    // public function dataProductivityTeam($monthYear)
    // {
    //     return DB::table('engineering_activity') 
    //         ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
    //         ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
    //         ->whereRaw('DATE_FORMAT(tanggal_masuk_kerja, "%Y-%m") = ?', $monthYear)
    //         ->select('engineering_activity.id_user', 'nama_user', 'kategori_pekerjaan.fungsi', DB::raw('SUM(durasi) as jumlah_durasi'))
    //         ->groupBy('engineering_activity.id_user', 'nama_user', 'kategori_pekerjaan.fungsi')
    //         ->get();
    // }

    public function activityPerson($monthYear)
    {
        return DB::table('engineering_activity') 
        ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
        ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
        ->whereRaw('DATE_FORMAT(tanggal_masuk_kerja, "%Y-%m") = ?', $monthYear)
        ->select('engineering_activity.id_user', 'nama_user', 'nip', 'jabatan')
        ->distinct('engineering_activity.id_user')
        ->get();
    }

    public function whereMonthYear($monthYear)
    {
        return DB::table('engineering_activity')
            ->whereRaw('DATE_FORMAT(tanggal_masuk_kerja, "%Y-%m") = ?', $monthYear)
            ->select('id_user', DB::raw('MIN(tanggal_masuk_kerja) as tanggal_masuk_kerja'))
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->groupBy('id_user')
            ->orderBy('tanggal_masuk_kerja', 'asc')
            ->get();
        
    }

    public function detail($id_engineering_activity)
    {
        return DB::table('engineering_activity')
            ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->where('id_engineering_activity', $id_engineering_activity)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('engineering_activity')->insert($data);
    }

    public function edit($data)
    {
        DB::table('engineering_activity')->where('id_engineering_activity', $data['id_engineering_activity'])->update($data);
    }

    public function hapus($id_engineering_activity)
    {
        DB::table('engineering_activity')->where('id_engineering_activity', $id_engineering_activity)->delete();
    }

    public function dataProductivityPerson($id_user, $monthYear)
    {
        return DB::table('engineering_activity') 
            ->join('user', 'user.id_user', '=', 'engineering_activity.id_user')
            ->join('kategori_pekerjaan', 'kategori_pekerjaan.id_kategori_pekerjaan', '=', 'engineering_activity.id_kategori_pekerjaan')
            ->whereRaw('DATE_FORMAT(tanggal_masuk_kerja, "%Y-%m") = ?', $monthYear)
            ->select('engineering_activity.id_user', 'nama_user', 'kategori_pekerjaan.kategori_pekerjaan', 'kategori_pekerjaan.fungsi', DB::raw('SUM(durasi) as jumlah_durasi'))
            ->groupBy('engineering_activity.id_user', 'nama_user', 'kategori_pekerjaan.kategori_pekerjaan', 'kategori_pekerjaan.fungsi')
            ->where('engineering_activity.id_user', $id_user)
            ->get();
    }
}
