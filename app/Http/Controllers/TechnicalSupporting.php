<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelTechnicalSupporting;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class TechnicalSupporting extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelTechnicalSupporting, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelTimProyek               = new ModelTimProyek();
        $this->ModelTechnicalSupporting     = new ModelTechnicalSupporting();
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
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Monitoring',
            'idTimProyek'               => $idTimProyek,
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.index', $data);
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
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Tambah Technical Supporting',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('technicalSupporting.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek'         => 'required',
            'tanggal_submit'    => 'required|date',
            'kendala'           => 'required'
        ], [
            'id_proyek.required'        => 'Nama proyek harus diisi!',
            'tanggal_submit.required'   => 'Tanggal submit harus diisi!',
            'kendala.required'           => 'Kendala teknis harus diisi!'
        ]);

        $data = [
            'id_proyek'         => Request()->id_proyek,
            'tanggal_submit'    => Request()->tanggal_submit,
            'kendala'           => Request()->kendala
        ];

        $this->ModelTechnicalSupporting->tambah($data);
        return redirect()->route('monitoring-technical-supporting')->with('success', 'Data berhasil ditambahkan!');
    }

    public function permintaan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Permintaan',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.permintaan', $data);
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Update',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.update', $data);
    }

    public function receive($id_technical_supporting)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Form Permintaan',
            'detail'            => $this->ModelTechnicalSupporting->detail($id_technical_supporting),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.formRespon', $data);
    }

    public function edit($id_technical_supporting)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Form Update',
            'detail'            => $this->ModelTechnicalSupporting->detail($id_technical_supporting),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.formRespon', $data);
    }

    public function prosesEdit($id_technical_supporting)
    {
        Request()->validate([
            'nomor_laporan'     => 'required',
            'kode'              => 'required',
            'topik'             => 'required'
        ], [
            'nomor_laporan.required'    => 'Nomor laporan harus diisi!',
            'kode.required'             => 'Kode harus diisi!',
            'topik.required'            => 'Topik harus diisi!'
        ]);

        $detail = $this->ModelTechnicalSupporting->detail($id_technical_supporting);
        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if ($detail->is_respon === 0) {
            $data = [
                'id_technical_supporting'   => $id_technical_supporting,
                'pic'                       => $user->nama_user,
                'id_user'                   => Session()->get('id_user'),
                'nomor_laporan'             => Request()->nomor_laporan,
                'kode'                      => Request()->kode,
                'topik'                     => Request()->topik,
                'is_respon'                 => 1
            ];
        } else {
            if (Request()->tanggal_selesai) {
                $data = [
                    'id_technical_supporting'   => $id_technical_supporting,
                    'nomor_laporan'             => Request()->nomor_laporan,
                    'pic'                       => $user->nama_user,
                    'id_user'                   => Session()->get('id_user'),
                    'kode'                      => Request()->kode,
                    'topik'                     => Request()->topik,
                    'status_support'            => Request()->status_support,
                    'note'                      => Request()->note,
                    'dokumen'                   => Request()->dokumen,
                    'tanggal_selesai'           => Request()->tanggal_selesai,
                ];
            } else {
                $data = [
                    'id_technical_supporting'   => $id_technical_supporting,
                    'nomor_laporan'             => Request()->nomor_laporan,
                    'pic'                       => $user->nama_user,
                    'id_user'                   => Session()->get('id_user'),
                    'kode'                      => Request()->kode,
                    'topik'                     => Request()->topik,
                    'status_support'            => Request()->status_support,
                    'note'                      => Request()->note,
                    'dokumen'                   => Request()->dokumen
                ];
            }
        }

        $this->ModelTechnicalSupporting->edit($data);
        return redirect()->route('update-technical-supporting')->with('success', 'Data berhasil ditambahkan!');
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!Request()->tahun) {
            $data = [
                'title'                     => 'Technical Supporting',
                'subTitle'                  => 'Progress',
                'tahun'                     => false,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {
            $data = [
                'title'                     => 'Technical Supporting',
                'subTitle'                  => 'Progress',
                'tahun'                     => Request()->tahun,
                'detailProgress'            => $this->ModelTechnicalSupporting->progress(Request()->tahun),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        }

        return view('technicalSupporting.progress', $data);
    }
}
