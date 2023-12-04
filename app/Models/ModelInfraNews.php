<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelInfraNews extends Model
{
    use HasFactory;

    public function data($isActive)
    {
        if($isActive === 'All') {
            return DB::table('infra_news')
                ->join('user', 'user.id_user', '=', 'infra_news.id_user')
                ->orderBy('tanggal', 'DESC')
                ->get();
        } else {
            return DB::table('infra_news')
                ->join('user', 'user.id_user', '=', 'infra_news.id_user')
                ->where('is_active', $isActive)
                ->orderBy('tanggal', 'DESC')
                ->get();
        }
    }

    public function detail($id_infra_news)
    {
        return DB::table('infra_news')
            ->join('user', 'user.id_user', '=', 'infra_news.id_user')
            ->where('id_infra_news', $id_infra_news)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('infra_news')->insert($data);
    }

    public function edit($data)
    {
        DB::table('infra_news')->where('id_infra_news', $data['id_infra_news'])->update($data);
    }

    public function hapus($id_infra_news)
    {
        DB::table('infra_news')->where('id_infra_news', $id_infra_news)->delete();
    }
}
