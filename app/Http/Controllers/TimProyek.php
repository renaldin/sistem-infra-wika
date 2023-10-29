<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class TimProyek extends Controller
{

    private $ModelTimProyek, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
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
            'title'                 => 'Data Tim Proyek',
            'subTitle'              => 'Daftar Tim Proyek',
            'daftarDetailTimProyek' => $this->ModelDetailTimProyek->data(),
            'daftarTimProyek'       => $this->ModelTimProyek->data(),
            'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.timProyek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Tim Proyek',
            'subTitle'  => 'Tambah Tim Proyek',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'form'      => 'Tambah',
        ];

        return view('admin.timProyek.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_tim_proyek'   => 'required',
            'deskripsi'         => 'required',
            'tanggal_dibuat'    => 'required|date'
        ], [
            'nama_tim_proyek.required'  => 'Nama Tim Proyek harus diisi!',
            'deskripsi.required'        => 'Deskripsi harus diisi!',
            'tanggal_dibuat.required'   => 'Tanggal Dibuat harus diisi!',
            'tanggal_dibuat.date'       => 'Tanggal Dibuat harus format tanggal!'
        ]);

        $data = [
            'nama_tim_proyek'   => Request()->nama_tim_proyek,
            'deskripsi'         => Request()->deskripsi,
            'tanggal_dibuat'    => Request()->tanggal_dibuat
        ];

        $this->ModelTimProyek->tambah($data);
        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil ditambahkan!');
    }

    public function edit($id_tim_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                 => 'Data Tim Proyek',
            'subTitle'              => 'Edit Tim Proyek',
            'form'                  => 'Edit',
            'daftarUser'            => $this->ModelUser->dataUser(),
            'daftarDetailTimProyek' => $this->ModelDetailTimProyek->data(),
            'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'                => $this->ModelTimProyek->detail($id_tim_proyek)
        ];

        return view('admin.timProyek.form', $data);
    }

    public function prosesEdit($id_tim_proyek)
    {
        Request()->validate([
            'nama_tim_proyek'   => 'required',
            'deskripsi'         => 'required',
            'tanggal_dibuat'    => 'required|date'
        ], [
            'nama_tim_proyek.required'  => 'Nama Tim Proyek harus diisi!',
            'deskripsi.required'        => 'Deskripsi harus diisi!',
            'tanggal_dibuat.required'   => 'Tanggal Dibuat harus diisi!',
            'tanggal_dibuat.date'       => 'Tanggal Dibuat harus format tanggal!'
        ]);

        $data = [
            'id_tim_proyek'     => $id_tim_proyek,
            'nama_tim_proyek'   => Request()->nama_tim_proyek,
            'deskripsi'         => Request()->deskripsi,
            'tanggal_dibuat'    => Request()->tanggal_dibuat
        ];

        $this->ModelTimProyek->edit($data);

        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil diedit!');
    }

    public function prosesHapus($id_tim_proyek)
    {
        $this->ModelTimProyek->hapus($id_tim_proyek);
        $this->ModelDetailTimProyek->hapusAnggota($id_tim_proyek);
        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil dihapus !');
    }
}
