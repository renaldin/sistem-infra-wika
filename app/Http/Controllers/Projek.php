<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProjek;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;

class Projek extends Controller
{

    private $ModelProjek, $ModelUser;

    public function __construct()
    {
        $this->ModelProjek = new ModelProjek();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Projek',
            'subTitle'          => 'Daftar Projek',
            'daftarProjek'      => $this->ModelProjek->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.projek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Projek',
            'subTitle'  => 'Tambah Projek',
            'daftarUser'=> $this->ModelUser->dataUser(),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'form'      => 'Tambah',
        ];

        return view('admin.projek.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_projek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'id_kesie_eng'      => 'required',
            'coordinat'         => 'required'
        ], [
            'nama_projek.required'      => 'Nama projek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_kesie_eng.required'     => 'Kesie Eng harus diisi!',
            'coordinat.required'        => 'Coordinat harus diisi!',
        ]);

        $data = [
            'nama_projek'       => Request()->nama_projek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_kesie_eng'      => Request()->id_kesie_eng,
            'coordinat'         => Request()->coordinat,
        ];

        $this->ModelProjek->tambah($data);
        return redirect()->route('daftar-projek')->with('success', 'Data Projek berhasil ditambahkan!');
    }

    public function edit($id_projek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Projek',
            'subTitle'      => 'Edit Projek',
            'form'          => 'Edit',
            'daftarUser'    => $this->ModelUser->dataUser(),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'        => $this->ModelProjek->detail($id_projek)
        ];

        return view('admin.projek.form', $data);
    }

    public function prosesEdit($id_projek)
    {
        Request()->validate([
            'nama_projek'       => 'required',
            'tanggal'           => 'required',
            'tipe_konstruksi'   => 'required',
            'prioritas'         => 'required',
            'status'            => 'required',
            'id_kesie_eng'      => 'required',
            'coordinat'         => 'required'
        ], [
            'nama_projek.required'      => 'Nama projek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_kesie_eng.required'     => 'Kesie Eng harus diisi!',
            'coordinat.required'        => 'Coordinat harus diisi!',
        ]);

        $data = [
            'id_projek'         => $id_projek,
            'nama_projek'       => Request()->nama_projek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_kesie_eng'      => Request()->id_kesie_eng,
            'coordinat'         => Request()->coordinat,
        ];

        $this->ModelProjek->edit($data);

        return redirect()->route('daftar-projek')->with('success', 'Data Projek berhasil diedit!');
    }

    public function prosesHapus($id_projek)
    {
        $user = $this->ModelProjek->detail($id_projek);

        $this->ModelProjek->hapus($id_projek);
        return redirect()->route('daftar-projek')->with('success', 'Data Projek berhasil dihapus !');
    }
}
