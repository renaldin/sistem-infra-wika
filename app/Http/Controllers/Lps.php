<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelLps;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelDokumenLps;

class Lps extends Controller
{

    private $ModelLps, $ModelUser, $ModelProyek, $ModelDokumenLps;

    public function __construct()
    {
        $this->ModelLps         = new ModelLps();
        $this->ModelUser        = new ModelUser();
        $this->ModelProyek      = new ModelProyek();
        $this->ModelDokumenLps  = new ModelDokumenLps();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Input LPS',
            'daftarProyekLps'           => $this->ModelLps->dataProyek(),
            'daftarProyek'              => $this->ModelProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('lps.index', $data);
    }

    public function detail($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Detail LPS',
            'detailProyek'              => $this->ModelProyek->detail($id_proyek),
            'detailProyekLps'           => $this->ModelLps->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('lps.detail', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarDokumenLps = $this->ModelDokumenLps->data();

        foreach($daftarDokumenLps as $item) {
            $data = [
                'id_dokumen_lps'    => $item->id_dokumen_lps,
                'id_proyek'         => Request()->id_proyek,
                'tanggal_lps'       => date('Y-m-d')
            ];
            $this->ModelLps->tambah($data);
        }

        $dataProyek = [
            'id_proyek'     => Request()->id_proyek,
            'status_lps'    => 1
        ];

        $this->ModelProyek->edit($dataProyek);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_lps)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->pdf) {
            $pdf = 1;
        } else {
            $pdf = 0;
        }

        if(Request()->native) {
            $native = 1;
        } else {
            $native = 0;
        }

        $data = [
            'id_lps'             => $id_lps,
            'pdf'               => $pdf,
            'native'            => $native,
            'tanggal_lps'       => date('Y-m-d'),
            'id_user_respon'    => Session()->get('id_user'),
            'is_respon'         => 1,
        ];

        if(Request()->jenis_dokumen === 'Utama') {
            $pesan = 'successUtama';
        } else {
            $pesan = 'successPendukung';
        }

        $this->ModelLps->edit($data);
        return back()->with($pesan, 'Data berhasil diedit!');
    }

    public function prosesHapus($id_proyek)
    {
        $data = [
            'where' => 'id_proyek',
            'value' => $id_proyek
        ];

        $dataProyek = [
            'id_proyek'     => $id_proyek,
            'status_lps'    => 0
        ];

        $this->ModelLps->hapus($data);
        $this->ModelProyek->edit($dataProyek);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
