<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelKiKm;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class KiKm extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelKiKm, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelTimProyek               = new ModelTimProyek();
        $this->ModelKiKm                    = new ModelKiKm();
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
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Monitoring',
            'idTimProyek'               => $idTimProyek,
            'daftarKiKm'                => $this->ModelKiKm->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.index', $data);
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
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Tambah KI/KM',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('kiKm.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek'         => 'required',
            'status_ki_km'      => 'required',
            'kategori'          => 'required',
            'department'        => 'required',
            'judul'             => 'required'
        ], [
            'id_proyek.required'    => 'Nama proyek harus diisi!',
            'status_ki_km.required' => 'Tanggal submit harus diisi!',
            'kategori.required'     => 'Kategori harus diisi!',
            'department.required'   => 'Department harus diisi!',
            'judul.required'        => 'Judul harus diisi!'
        ]);

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'status_ki_km'  => Request()->status_ki_km,
            'kategori'      => Request()->kategori,
            'department'    => Request()->department,
            'judul'         => Request()->judul,
            'tanggal_input' => date('Y-m-d')
        ];

        $this->ModelKiKm->tambah($data);
        return redirect()->route('monitoring-ki-km')->with('success', 'Data berhasil ditambahkan!');
    }

    public function pengajuan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Pengajuan',
            'daftarKiKm'                => $this->ModelKiKm->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.pengajuan', $data);
    }

    public function receive($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Form Pengajuan',
            'detail'            => $this->ModelKiKm->detail($id_ki_km),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.formRespon', $data);
    }

    public function edit($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Form Update KI/KM',
            'detail'            => $this->ModelKiKm->detail($id_ki_km),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.formRespon', $data);
    }

    public function prosesEdit($id_ki_km)
    {

        $detail = $this->ModelKiKm->detail($id_ki_km);
        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if(Request()->proses_penulisan) {
            $prosesPenulisan = 1;
        } else {
            $prosesPenulisan = 0;
        }
        if(Request()->approval_atasan) {
            $approvalAtasan = 1;
        } else {
            $approvalAtasan = 0;
        }
        if(Request()->approval_pic_divisi) {
            $approvalPicDivisi = 1;
        } else {
            $approvalPicDivisi = 0;
        }
        if(Request()->approval_pic_pusat) {
            $approvalPicPusat = 1;
        } else {
            $approvalPicPusat = 0;
        }
        if(Request()->approval_published) {
            $approvalPublished = 1;
        } else {
            $approvalPublished = 0;
        }

        if ($detail->is_respon === 0) {
            $data = [
                'id_ki_km'                  => $id_ki_km,
                'tanggal_upload'            => Request()->tanggal_upload,
                'proses_penulisan'          => $prosesPenulisan,
                'approval_atasan'           => $approvalAtasan,
                'approval_pic_divisi'       => $approvalPicDivisi,
                'approval_pic_pusat'        => $approvalPicPusat,
                'approval_published'        => $approvalPublished,
                'tanggal_published'         => Request()->tanggal_published,
                'note'                      => Request()->note,
                'id_user_respon'            => $user->id_user,
                'is_respon'                 => 1
            ];
        } else {
            $data = [
                'id_ki_km'                  => $id_ki_km,
                'tanggal_upload'            => Request()->tanggal_upload,
                'proses_penulisan'          => $prosesPenulisan,
                'approval_atasan'           => $approvalAtasan,
                'approval_pic_divisi'       => $approvalPicDivisi,
                'approval_pic_pusat'        => $approvalPicPusat,
                'approval_published'        => $approvalPublished,
                'tanggal_published'         => Request()->tanggal_published,
                'note'                      => Request()->note,
                'id_user_respon'            => $user->id_user,
                'is_respon'                 => 1
            ];
        }

        $this->ModelKiKm->edit($data);
        return redirect()->route('update-ki-km')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Update',
            'daftarKiKm'                => $this->ModelKiKm->dataIsRespon(1),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.update', $data);
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!Request()->tahun) {
            $data = [
                'title'                     => 'Kolaborasi KI/KM',
                'subTitle'                  => 'Progress',
                'tahun'                     => false,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {
            $data = [
                'title'                     => 'Kolaborasi KI/KM',
                'subTitle'                  => 'Progress',
                'tahun'                     => Request()->tahun,
                'detailProgress'            => $this->ModelKiKm->progress(Request()->tahun),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        }

        return view('kiKm.progress', $data);
    }
}
