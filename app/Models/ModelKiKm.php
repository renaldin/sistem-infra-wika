<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKiKm extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('ki_km')
            ->join('user', 'user.id_user', '=', 'ki_km.id_user')
            ->join('proyek', 'proyek.id_proyek', '=', 'ki_km.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->orderBy('id_ki_km', 'DESC')
            ->get();
    }

    public function dataIsRespon($isRespon)
    {
        return DB::table('ki_km')
            ->join('user', 'user.id_user', '=', 'ki_km.id_user')
            ->join('proyek', 'proyek.id_proyek', '=', 'ki_km.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->where('is_respon', $isRespon)
            ->orderBy('id_ki_km', 'DESC')
            ->get();
    }

    public function detail($id_ki_km)
    {
        return DB::table('ki_km')
            ->join('user', 'user.id_user', '=', 'ki_km.id_user')
            ->join('proyek', 'proyek.id_proyek', '=', 'ki_km.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->where('id_ki_km', $id_ki_km)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('ki_km')->insert($data);
    }

    public function edit($data)
    {
        DB::table('ki_km')->where('id_ki_km', $data['id_ki_km'])->update($data);
    }

    public function progress($year)
    {
        $data = [
            'januari' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['01'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'februari' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['02'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'maret' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['03'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'april' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['04'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'mei' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['05'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'juni' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['06'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'juli' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['07'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'agustus' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['08'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'september' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['09'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'oktober' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['10'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'november' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['11'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
            'desember' => DB::table('ki_km')->whereRaw('DATE_FORMAT(tanggal_input, "%Y") = ?', [$year])->whereRaw('DATE_FORMAT(tanggal_input, "%m") = ?', ['12'])->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN proses_penulisan = 1 AND approval_atasan = 1 AND approval_pic_divisi = 1 AND approval_pic_pusat = 1 AND approval_published = 1 THEN 1 ELSE NULL END) as realisasi'))->first(),
        ];

        return $data;
    }
}
