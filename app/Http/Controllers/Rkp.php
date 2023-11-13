<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelRkp;
use App\Models\ModelUser;

class Rkp extends Controller
{

    private $ModelRkp, $ModelProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelRkp              = new ModelRkp();
        $this->ModelUser                    = new ModelUser();
    }

    
    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        $daftarProyek = $this->ModelProyek->data();
        $data = [
            'title'             => 'Review RKP',
            'subTitle'          => 'Review RKP Reviewing',
            'daftarProyek'  => $daftarProyek,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('rkp.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek'         => 'required',
            'kode_spk'      => 'required',
        ], [
            'id_proyek.required'    => 'Nama proyek harus diisi!',
            'kode_spk.required' => 'Kode SPK harus diisi!'
        ]);

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'kode_spk'  => Request()->kode_spk,
        ];

        $this->ModelRkp->tambah($data);
        return redirect()->route('review-rkp')->with('success', 'Data berhasil ditambahkan!');
    }
}
