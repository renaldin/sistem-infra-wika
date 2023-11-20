<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelLicense extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('license')
            ->join('user', 'user.id_user', '=', 'license.id_user')
            ->orderBy('id_license', 'DESC')->get();
    }

    public function detail($id_license)
    {
        return DB::table('license')
            ->join('user', 'user.id_user', '=', 'license.id_user')
            ->where('id_license', $id_license)->first();
    }

    public function tambah($data)
    {
        DB::table('license')->insert($data);
    }

    public function edit($data)
    {
        DB::table('license')->where('id_license', $data['id_license'])->update($data);
    }

    public function hapus($id_license)
    {
        DB::table('license')->where('id_license', $id_license)->delete();
    }
}
