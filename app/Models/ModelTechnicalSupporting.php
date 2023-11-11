<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelTechnicalSupporting extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('technical_supporting')
            ->join('proyek', 'proyek.id_proyek', '=', 'technical_supporting.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->orderBy('id_technical_supporting', 'DESC')
            ->get();
    }

    public function dataIsRespon($isRespon)
    {
        return DB::table('technical_supporting')
            ->join('proyek', 'proyek.id_proyek', '=', 'technical_supporting.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->where('is_respon', $isRespon)
            ->orderBy('id_technical_supporting', 'DESC')
            ->get();
    }

    public function detail($id_technical_supporting)
    {
        return DB::table('technical_supporting')
            ->join('proyek', 'proyek.id_proyek', '=', 'technical_supporting.id_proyek', 'technical_supporting')
            ->where('id_technical_supporting', $id_technical_supporting)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('technical_supporting')->insert($data);
    }

    public function edit($data)
    {
        DB::table('technical_supporting')->where('id_technical_supporting', $data['id_technical_supporting'])->update($data);
    }

    public function hapus($id_technical_supporting)
    {
        DB::table('technical_supporting')->where('id_technical_supporting', $id_technical_supporting)->delete();
    }

    public function progress($year)
    {
        $data = [
            'januari' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '01')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'februari' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '02')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'maret' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '03')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'april' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '04')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'mei' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '05')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'juni' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '06')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'juli' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '07')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'agustus' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '08')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'september' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '09')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'oktober' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '10')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'november' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '11')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
            'desember' => DB::table('technical_supporting')->whereRaw('DATE_FORMAT(tanggal_submit, "%Y") = ?', $year)->whereRaw('DATE_FORMAT(tanggal_submit, "%m") = ?', '12')->select(DB::raw('COUNT(*) as rencana'), DB::raw('COUNT(CASE WHEN status_support = "SENT" THEN 1 ELSE NULL END) as realisasi'))->first(),
        ];
        return $data;
    }
}
