<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelMonthlyReport extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('monthly_report')
            ->join('proyek', 'proyek.id_proyek', '=', 'monthly_report.id_proyek', 'monthly_report')
            ->orderBy('id_monthly_report', 'DESC')
            ->get();
    }

    public function detail($id_monthly_report)
    {
        return DB::table('monthly_report')
            ->join('proyek', 'proyek.id_proyek', '=', 'monthly_report.id_proyek', 'monthly_report')
            ->where('id_monthly_report', $id_monthly_report)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('monthly_report')->insert($data);
    }

    public function edit($data)
    {
        DB::table('monthly_report')->where('id_monthly_report', $data['id_monthly_report'])->update($data);
    }

    public function hapus($id_monthly_report)
    {
        DB::table('monthly_report')->where('id_monthly_report', $id_monthly_report)->delete();
    }
}
