<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelSoftware;
use App\Models\ModelLicense;
use App\Models\ModelDetailLicense;

class License extends Controller
{

    private $ModelUser, $public_path, $ModelSoftware, $ModelLicense, $ModelDetailLicense;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSoftware = new ModelSoftware();
        $this->ModelLicense = new ModelLicense();
        $this->ModelDetailLicense = new ModelDetailLicense();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'License Software',
            'subTitle'          => 'Daftar',
            'daftarLicense'     => $this->ModelLicense->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('license.index', $data);
    }

    public function detail($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'License Software',
            'subTitle'          => 'Detail',
            'daftarSoftware'    => $this->ModelSoftware->data(),
            'detailLicense'     => $this->ModelLicense->detail($id_license),
            'daftarDetailLicense'     => $this->ModelDetailLicense->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('license.detail', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_device'         => Request()->id_device,
            'id_user'           => Session()->get('id_user'),
            'tanggal_license'   => date('Y-m-d')
        ];

        $this->ModelLicense->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_license'        => $id_license,
            'id_device'         => Request()->id_device
        ];

        $this->ModelLicense->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $this->ModelLicense->hapus($id_license);
        $this->ModelDetailLicense->hapusLicense($id_license);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
