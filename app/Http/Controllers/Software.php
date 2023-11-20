<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelSoftware;

class Software extends Controller
{

    private $ModelUser, $public_path, $ModelSoftware;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSoftware = new ModelSoftware();
        $this->public_path = 'software';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Software',
            'subTitle'          => 'Daftar Software',
            'daftarSoftware'    => $this->ModelSoftware->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.software.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Software',
            'subTitle'  => 'Tambah',
            'form'      => 'Tambah',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.software.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_software' => 'required',
            'fungsi'        => 'required',
            'kategori'      => 'required',
            'gambar'        => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_software.required'    => 'Nama software harus diisi!',
            'fungsi.required'           => 'Fungsi harus diisi!',
            'kategori.required'         => 'Kategori harus diisi!',
            'gambar.required'           => 'Gambar harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . ' ' . Request()->nama_software . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        $data = [
            'nama_software' => Request()->nama_software,
            'fungsi'        => Request()->fungsi,
            'kategori'      => Request()->kategori,
            'gambar'        => $fileName
        ];

        $this->ModelSoftware->tambah($data);
        return redirect()->route('daftar-software')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_software)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Software',
            'subTitle'      => 'Edit',
            'form'          => 'Edit',
            'detail'        => $this->ModelSoftware->detail($id_software),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.software.form', $data);
    }

    public function prosesEdit($id_software)
    {
        Request()->validate([
            'nama_software' => 'required',
            'fungsi'        => 'required',
            'kategori'      => 'required',
            'gambar'        => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_software.required'    => 'Nama software harus diisi!',
            'fungsi.required'           => 'Fungsi harus diisi!',
            'kategori.required'         => 'Kategori harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $software = $this->ModelSoftware->detail($id_software);

        if (Request()->gambar <> "") {
            if ($software->gambar <> "") {
                unlink(public_path($this->public_path) . '/' . $software->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . ' ' . Request()->nama_software . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data = [
                'id_software'   => $id_software,
                'nama_software' => Request()->nama_software,
                'fungsi'        => Request()->fungsi,
                'kategori'      => Request()->kategori,
                'gambar'        => $fileName
            ];
        } else {
            $data = [
                'id_software'   => $id_software,
                'nama_software' => Request()->nama_software,
                'fungsi'        => Request()->fungsi,
                'kategori'      => Request()->kategori
            ];
        }

        $this->ModelSoftware->edit($data);
        return redirect()->route('daftar-software')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_software)
    {
        $software = $this->ModelSoftware->detail($id_software);

        if ($software->gambar <> "") {
            unlink(public_path($this->public_path) . '/' . $software->gambar);
        }

        $this->ModelSoftware->hapus($id_software);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
