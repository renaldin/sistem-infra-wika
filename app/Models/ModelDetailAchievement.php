<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetailAchievement extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('detail_achievement')
            ->join('achievement', 'achievement.id_achievement', '=', 'detail_achievement.id_achievement')
            ->orderBy('tanggal_input', 'DESC')
            ->get();
    }

    public function detail($id_detail_achievement)
    {
        return DB::table('detail_achievement')
            ->join('achievement', 'achievement.id_achievement', '=', 'detail_achievement.id_achievement')
            ->where('id_detail_achievement', $id_detail_achievement)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('detail_achievement')->insert($data);
    }

    public function edit($data)
    {
        DB::table('detail_achievement')->where('id_detail_achievement', $data['id_detail_achievement'])->update($data);
    }

    public function hapus($id_detail_achievement)
    {
        DB::table('detail_achievement')->where('id_detail_achievement', $id_detail_achievement)->delete();
    }

    public function hapusByAchievement($id_achievement)
    {
        DB::table('detail_achievement')->where('id_achievement', $id_achievement)->delete();
    }
}
