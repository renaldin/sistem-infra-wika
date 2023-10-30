<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class MonthlyReport extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek          = new ModelProyek();
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
    }

    public function index()
    {
        // if (!Session()->get('role')) {
        //     return redirect()->route('login');
        // }

        // $data = [
        //     'title'                     => 'Data Proyek',
        //     'subTitle'                  => 'Daftar Proyek',
        //     'daftarProyek'              => $this->ModelProyek->data(),
        //     'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
        //     'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        // ];

        // return view('admin.proyek.index', $data);
    }

    public function pilihProyek()
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
            'title'             => 'Monthly Report',
            'subTitle'          => 'Pilih Proyek',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('admin.monthlyReport.pilihProyek', $data);
    }

    public function prosesPilihProyek()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Monthly Report',
            'subTitle'          => 'Tambah Monthly Report',
            'detail'            => $this->ModelProyek->detail(Request()->id_proyek),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('admin.monthlyReport.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_proyek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'id_tim_proyek'     => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_tim_proyek.required'    => 'Kesie Eng harus diisi!',
            'latitude.required'         => 'Latitude harus diisi!',
            'longitude.required'        => 'Longitude harus diisi!',
        ]);

        $data = [
            'nama_proyek'       => Request()->nama_proyek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'     => Request()->id_tim_proyek,
            'latitude'          => Request()->latitude,
            'longitude'         => Request()->longitude,
        ];

        $this->ModelProyek->tambah($data);
        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil ditambahkan!');
    }

    // public function edit($id_proyek)
    // {
    //     if (!Session()->get('role')) {
    //         return redirect()->route('login');
    //     }

    //     $data = [
    //         'title'             => 'Data Proyek',
    //         'subTitle'          => 'Edit Proyek',
    //         'form'              => 'Edit',
    //         'daftarTimProyek'   => $this->ModelTimProyek->data(),
    //         'user'              => $this->ModelUser->detail(Session()->get('id_user')),
    //         'detail'            => $this->ModelProyek->detail($id_proyek)
    //     ];

    //     return view('admin.proyek.form', $data);
    // }

    // public function prosesEdit($id_proyek)
    // {
    //     Request()->validate([
    //         'nama_proyek'       => 'required',
    //         'tanggal'           => 'required',
    //         'tipe_konstruksi'   => 'required',
    //         'prioritas'         => 'required',
    //         'status'            => 'required',
    //         'id_tim_proyek'      => 'required',
    //         'latitude'          => 'required',
    //         'longitude'         => 'required'
    //     ], [
    //         'nama_proyek.required'      => 'Nama proyek harus diisi!',
    //         'tanggal.required'          => 'Tanggal harus diisi!',
    //         'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
    //         'prioritas.required'        => 'Prioritas harus diisi!',
    //         'status.required'           => 'Status harus diisi!',
    //         'id_tim_proyek.required'     => 'Kesie Eng harus diisi!',
    //         'latitude.required'         => 'Latitude harus diisi!',
    //         'longitude.required'        => 'Longitude harus diisi!',
    //     ]);

    //     $data = [
    //         'id_proyek'         => $id_proyek,
    //         'nama_proyek'       => Request()->nama_proyek,
    //         'tanggal'           => Request()->tanggal,
    //         'tipe_konstruksi'   => Request()->tipe_konstruksi,
    //         'prioritas'         => Request()->prioritas,
    //         'status'            => Request()->status,
    //         'id_tim_proyek'      => Request()->id_tim_proyek,
    //         'latitude'          => Request()->latitude,
    //         'longitude'         => Request()->longitude,
    //     ];

    //     $this->ModelProyek->edit($data);

    //     return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil diedit!');
    // }

    // public function prosesHapus($id_proyek)
    // {
    //     $this->ModelProyek->hapus($id_proyek);
    //     return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil dihapus !');
    // }
}
