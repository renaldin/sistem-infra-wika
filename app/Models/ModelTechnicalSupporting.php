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
}
