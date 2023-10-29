<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDetailTimProyek;

class DetailTimProyek extends Controller
{

    private $ModelDetailTimProyek;

    public function __construct()
    {
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
    }

    public function index()
    {
        
    }

    public function prosesTambah()
    {
        $data = [
            'id_tim_proyek'   => Request()->id_tim_proyek,
            'id_user'         => Request()->id_user
        ];

        $this->ModelDetailTimProyek->tambah($data);
        return back()->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function prosesHapus($id_detail_tim_proyek)
    {
        $this->ModelDetailTimProyek->hapus($id_detail_tim_proyek);
        return back()->with('success', 'Anggota berhasil dihapus !');
    }
}
