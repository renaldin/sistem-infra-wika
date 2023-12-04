<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelEvent extends Model
{
    use HasFactory;

    public function data($isActive)
    {
        if($isActive === 'All') {
            return DB::table('event')
                ->join('user', 'user.id_user', '=', 'event.id_user')
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        } else {
            return DB::table('event')
                ->join('user', 'user.id_user', '=', 'event.id_user')
                ->where('is_active', $isActive)
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        }
    }

    public function detail($id_event)
    {
        return DB::table('event')
            ->join('user', 'user.id_user', '=', 'event.id_user')
            ->where('id_event', $id_event)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('event')->insert($data);
    }

    public function edit($data)
    {
        DB::table('event')->where('id_event', $data['id_event'])->update($data);
    }

    public function hapus($id_event)
    {
        DB::table('event')->where('id_event', $id_event)->delete();
    }
}
