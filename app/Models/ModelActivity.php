<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelActivity extends Model
{
    use HasFactory;

    public function data($isActive)
    {
        if($isActive === 'All') {
            return DB::table('activity')
                ->join('user', 'user.id_user', '=', 'activity.id_user')
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        } else {
            return DB::table('activity')
                ->join('user', 'user.id_user', '=', 'activity.id_user')
                ->where('is_active', $isActive)
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        }
    }

    public function detail($id_activity)
    {
        return DB::table('activity')
            ->join('user', 'user.id_user', '=', 'activity.id_user')
            ->where('id_activity', $id_activity)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('activity')->insert($data);
    }

    public function edit($data)
    {
        DB::table('activity')->where('id_activity', $data['id_activity'])->update($data);
    }

    public function hapus($id_activity)
    {
        DB::table('activity')->where('id_activity', $id_activity)->delete();
    }
}
