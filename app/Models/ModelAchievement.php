<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAchievement extends Model
{
    use HasFactory;

    public function data($isActive)
    {
        if($isActive === 'All') {
            return DB::table('achievement')
                ->join('user', 'user.id_user', '=', 'achievement.id_user')
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        } else {
            return DB::table('achievement')
                ->join('user', 'user.id_user', '=', 'achievement.id_user')
                ->where('is_active', $isActive)
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        }
    }

    public function detail($id_achievement)
    {
        return DB::table('achievement')
            ->join('user', 'user.id_user', '=', 'achievement.id_user')
            ->where('id_achievement', $id_achievement)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('achievement')->insert($data);
    }

    public function edit($data)
    {
        DB::table('achievement')->where('id_achievement', $data['id_achievement'])->update($data);
    }

    public function hapus($id_achievement)
    {
        DB::table('achievement')->where('id_achievement', $id_achievement)->delete();
    }
}
