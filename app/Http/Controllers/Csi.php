<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelLps;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelCsi;
use App\Models\ModelAspekCsi;
use App\Models\ModelDetailCsi;

class Csi extends Controller
{

    private $ModelAspekCsi, $ModelUser, $ModelProyek, $ModelCsi, $ModelDetailTimProyek, $ModelDetailCsi;

    public function __construct()
    {
        $this->ModelUser        = new ModelUser();
        $this->ModelProyek      = new ModelProyek();
        $this->ModelDetailTimProyek   = new ModelDetailTimProyek();
        $this->ModelCsi         = new ModelCsi();
        $this->ModelAspekCsi    = new ModelAspekCsi();
        $this->ModelDetailCsi   = new ModelDetailCsi();
    }

    public function index()
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
            'title'                     => 'CSI',
            'subTitle'                  => 'Daftar Proyek CSI',
            'daftarProyek'              => $dataProyekByUser,
            'monitoring'                => true,
            'daftarCsi'                 => $this->ModelCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('csi.index', $data);
    }

    public function monitoring()
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
            'title'                     => 'CSI',
            'subTitle'                  => 'Daftar Proyek CSI',
            'monitoring'                => true,
            'daftarProyek'              => $dataProyekByUser,
            'daftarCsi'                 => $this->ModelCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('csi.index', $data);
    }

    public function detail($id_csi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'CSI',
            'subTitle'                  => 'Daftar CSI',
            'detailCsi'                 => $this->ModelCsi->detail($id_csi),
            'daftarDetailCsi'           => $this->ModelDetailCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('csi.detail', $data);
    }

    public function prosesTambah() 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $check = $this->ModelCsi->checkData(Request()->id_proyek, Request()->periode);
        if($check) {
            return back()->with('fail', 'Data proyek dan periode tersebut sudah ada!');
        }

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'periode'       => Request()->periode
        ];
        $this->ModelCsi->tambah($data);

        $lastDataCsi = $this->ModelCsi->lastData();

        $dataAspekCsi = $this->ModelAspekCsi->data();
        foreach($dataAspekCsi as $item) {
            $dataDetailCsi = [
                'id_csi'        => $lastDataCsi->id_csi,
                'id_aspek_csi'  => $item->id_aspek_csi
            ];
            $this->ModelDetailCsi->tambah($dataDetailCsi);
        }
        
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_csi'        => $id_csi,
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'periode'       => Request()->periode
        ];
        $this->ModelCsi->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function pendapat($id_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_csi'        => $id_csi,
            'pendapat'     => Request()->pendapat
        ];
        $this->ModelCsi->edit($data);
        return back()->with('success', 'Data pendapat berhasil ditambahkan!');
    }

    public function updateDetailCsi($id_detail_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->penilaian === 'Sangat Baik') {
            $nilai = 5;
        } else if(Request()->penilaian === 'Baik') {
            $nilai = 4;
        } else if(Request()->penilaian === 'Cukup') {
            $nilai = 3;
        } else if(Request()->penilaian === 'Kurang') {
            $nilai = 2;
        } else if(Request()->penilaian === 'Sangat Kurang') {
            $nilai = 1;
        }

        $data = [
            'id_detail_csi' => $id_detail_csi,
            'penilaian'     => Request()->penilaian,
            'nilai'         => $nilai
        ];
        $this->ModelDetailCsi->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_csi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $this->ModelCsi->hapus($id_csi);
        $this->ModelDetailCsi->hapusByCsi($id_csi);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
