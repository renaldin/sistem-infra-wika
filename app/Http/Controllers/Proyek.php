<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class Proyek extends Controller
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
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Data Proyek',
            'subTitle'                  => 'Daftar Proyek',
            'daftarProyek'              => $this->ModelProyek->data(),
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.proyek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Proyek',
            'subTitle'          => 'Tambah Proyek',
            'daftarTimProyek'   => $this->ModelTimProyek->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('admin.proyek.form', $data);
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
            'coordinat'         => 'required'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_tim_proyek.required'    => 'Kesie Eng harus diisi!',
            'coordinat.required'        => 'Coordinat harus diisi!',
        ]);

        $data = [
            'nama_proyek'       => Request()->nama_proyek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'      => Request()->id_tim_proyek,
            'coordinat'         => Request()->coordinat,
        ];

        $this->ModelProyek->tambah($data);
        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil ditambahkan!');
    }

    public function edit($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Proyek',
            'subTitle'          => 'Edit Proyek',
            'form'              => 'Edit',
            'daftarTimProyek'   => $this->ModelTimProyek->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'            => $this->ModelProyek->detail($id_proyek)
        ];

        return view('admin.proyek.form', $data);
    }

    public function prosesEdit($id_proyek)
    {
        Request()->validate([
            'nama_proyek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'id_tim_proyek'      => 'required',
            'coordinat'         => 'required'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_tim_proyek.required'     => 'Kesie Eng harus diisi!',
            'coordinat.required'        => 'Coordinat harus diisi!',
        ]);

        $data = [
            'id_proyek'         => $id_proyek,
            'nama_proyek'       => Request()->nama_proyek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'      => Request()->id_tim_proyek,
            'coordinat'         => Request()->coordinat,
        ];

        $this->ModelProyek->edit($data);

        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil diedit!');
    }

    public function prosesHapus($id_proyek)
    {
        $this->ModelProyek->hapus($id_proyek);
        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil dihapus !');
    }
}
