<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelRkp;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class Rkp extends Controller
{

    private $ModelProyek, $ModelRkp, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelRkp                     = new ModelRkp();
        $this->ModelDetailTimProyek         = new ModelDetailTimProyek();
        $this->ModelUser                    = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimProyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $idTimProyek = [];
        foreach($detailTimProyek as $item) {
            $idTimProyek[] = $item->id_tim_proyek;
        }

        $data = [
            'title'                     => 'RKP',
            'subTitle'                  => 'Monitoring',
            'idTimProyek'               => $idTimProyek,
            'daftarRkp'                 => $this->ModelRkp->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('rkp.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimPRoyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = $this->ModelProyek->dataWhere('proyek.id_tim_proyek', $item->id_tim_proyek);
        }

        $data = [
            'title'             => 'RKP',
            'subTitle'          => 'Tambah',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('rkp.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek' => 'required',
            'kode_spk'  => 'required'
        ], [
            'id_proyek.required'    => 'Nama proyek harus diisi!',
            'kode_spk.required'     => 'Kode SPK harus diisi!'
        ]);

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'kode_spk'      => Request()->kode_spk,
            'tanggal_rkp'   => date('Y-m-d')
        ];

        $this->ModelRkp->tambah($data);
        return redirect()->route('monitoring-rkp')->with('success', 'Data berhasil ditambahkan!');
    }

    public function terima()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'RKP',
            'subTitle'                  => 'Terima',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarRkp'                 => $this->ModelRkp->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('rkp.terima', $data);
    }

    public function edit($id_rkp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimPRoyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = $this->ModelProyek->dataWhere('proyek.id_tim_proyek', $item->id_tim_proyek);
        }

        $data = [
            'title'             => 'RKP',
            'subTitle'          => 'Form Update',
            'daftarProyek'      => $dataProyekByUser,
            'detail'            => $this->ModelRkp->detail($id_rkp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Edit'
        ];

        return view('rkp.form', $data);
    }

    public function prosesEdit($id_rkp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!Request()->id_proyek) {
            $data = [
                'id_rkp'            => $id_rkp,
                'id_user_respon'    => Session()->get('id_user'),
                'is_respon'         => 1
            ];
            $pesan = 'Data berhasil diterima!';
        } else {

          if(Request()->review1) {
            $review1 = 1;
          } else {
            $review1 = 0;
          }
          if(Request()->review2) {
            $review2 = 1;
          } else {
            $review2 = 0;
          }
          if(Request()->review3) {
            $review3 = 1;
          } else {
            $review3 = 0;
          }
          if(Request()->review4) {
            $review4 = 1;
          } else {
            $review4 = 0;
          }
          if(Request()->review5) {
            $review5 = 1;
          } else {
            $review5 = 0;
          }
          if(Request()->review6) {
            $review6 = 1;
          } else {
            $review6 = 0;
          }

          $data = [
            'id_rkp'      => $id_rkp,
            'review1'     => $review1,
            'review2'     => $review2,
            'review3'     => $review3,
            'review4'     => $review4,
            'review5'     => $review5,
            'review6'     => $review6,
            'note'        => Request()->note
          ];

          $pesan = 'Data berhasil diedit!';
        }

        $this->ModelRkp->edit($data);
        return redirect()->route('update-rkp')->with('success', $pesan);
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'RKP',
            'subTitle'                  => 'Update',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('rkp.update', $data);
    }
}