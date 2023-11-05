<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelUser;
use App\Models\ModelKategoriPekerjaan;

class EngineeringActivity extends Controller
{

    private $ModelEngineeringActivity, $public_path, $ModelUser, $ModelKategoriPekerjaan;

    public function __construct()
    {
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
        $this->ModelUser                = new ModelUser();
        $this->ModelKategoriPekerjaan   = new ModelKategoriPekerjaan();
        $this->public_path              = 'evidence';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Engineering Activity',
            'subTitle'          => 'Daftar Activity',
            'checked'           => true,
            'daftar'            => $this->ModelEngineeringActivity->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('engineeringActivity.index', $data);
    }

    public function check()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Engineering Activity',
            'subTitle'          => 'Check Activity',
            'checked'           => false,
            'daftar'            => $this->ModelEngineeringActivity->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('engineeringActivity.index', $data);
    }

    public function checkProses($id_engineering_activity) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_engineering_activity'   => $id_engineering_activity,
            'checked'                   => 1
        ];

        $this->ModelEngineeringActivity->edit($data);
        return back()->with('success', 'Data activity telah di-check!');
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Engineering Activity',
            'subTitle'          => 'Tambah Activity',
            'daftarPekerjaan'   => $this->ModelKategoriPekerjaan->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('engineeringActivity.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'tanggal_masuk_kerja'   => 'required',
            'status_kerja'          => 'required',
            'judul_pekerjaan'       => 'required',
            'id_kategori_pekerjaan'    => 'required',
            'durasi'                => 'required',
            'evidence'              => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'tanggal_masuk_kerja.required'  => 'Tanggal masuk kerja harus diisi!',
            'status_kerja.required'         => 'Status kerja harus diisi!',
            'judul_pekerjaan.required'      => 'Judul / deskripsi pekerjaan harus diisi!',
            'id_kategori_pekerjaan.required'   => 'Kategori pekerjaan harus diisi!',
            'durasi.required'               => 'Durasi harus diisi!',
            'evidence.required'             => 'Evidence Anda harus diisi!',
            'evidence.mimes'                => 'Evidence User harus jpg/jpeg/png!',
            'evidence.max'                  => 'Evidence User maksimal 2 mb',
        ]);

        $file = Request()->evidence;
        $fileName = date('mdYHis') . ' ' . Request()->id_user . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        $data = [
            'id_user'               => Request()->id_user,
            'tanggal_masuk_kerja'   => Request()->tanggal_masuk_kerja,
            'status_kerja'          => Request()->status_kerja,
            'judul_pekerjaan'       => Request()->judul_pekerjaan,
            'durasi'                => Request()->durasi,
            'evidence'              => $fileName,
            'id_kategori_pekerjaan'    => Request()->id_kategori_pekerjaan,
        ];

        $this->ModelEngineeringActivity->tambah($data);
        return redirect()->route('check-activity')->with('success', 'Data activity berhasil ditambahkan!');
    }

    public function edit($id_engineering_activity)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Engineering Activity',
            'subTitle'          => 'Edit Activity',
            'form'              => 'Edit',
            'daftarPekerjaan'   => $this->ModelKategoriPekerjaan->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'            => $this->ModelEngineeringActivity->detail($id_engineering_activity)
        ];

        return view('engineeringActivity.form', $data);
    }

    public function prosesEdit($id_engineering_activity)
    {
        Request()->validate([
            'tanggal_masuk_kerja'   => 'required',
            'status_kerja'          => 'required',
            'judul_pekerjaan'       => 'required',
            'id_kategori_pekerjaan'    => 'required',
            'durasi'                => 'required',
            'evidence'              => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'tanggal_masuk_kerja.required'  => 'Tanggal masuk kerja harus diisi!',
            'status_kerja.required'         => 'Status kerja harus diisi!',
            'judul_pekerjaan.required'      => 'Judul / deskripsi pekerjaan harus diisi!',
            'id_kategori_pekerjaan.required'   => 'Kategori pekerjaan harus diisi!',
            'durasi.required'               => 'Durasi harus diisi!',
            'evidence.mimes'                => 'Evidence User harus jpg/jpeg/png!',
            'evidence.max'                  => 'Evidence User maksimal 2 mb',
        ]);

        $detail = $this->ModelEngineeringActivity->detail($id_engineering_activity);

        if (Request()->evidence <> "") {
            if ($detail->evidence <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->evidence);
            }

            $file = Request()->evidence;
            $fileName = date('mdYHis') . Request()->id_user . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data = [
                'id_engineering_activity'   => $id_engineering_activity,
                'id_user'                   => Request()->id_user,
                'tanggal_masuk_kerja'       => Request()->tanggal_masuk_kerja,
                'status_kerja'              => Request()->status_kerja,
                'judul_pekerjaan'           => Request()->judul_pekerjaan,
                'durasi'                    => Request()->durasi,
                'evidence'                  => $fileName,
                'id_kategori_pekerjaan'     => Request()->id_kategori_pekerjaan,
            ];
        } else {
            $data = [
                'id_engineering_activity'   => $id_engineering_activity,
                'id_user'                   => Request()->id_user,
                'tanggal_masuk_kerja'       => Request()->tanggal_masuk_kerja,
                'status_kerja'              => Request()->status_kerja,
                'judul_pekerjaan'           => Request()->judul_pekerjaan,
                'durasi'                    => Request()->durasi,
                'id_kategori_pekerjaan'     => Request()->id_kategori_pekerjaan,
            ];
        }
        
        $this->ModelEngineeringActivity->edit($data);
        return redirect()->route('check-activity')->with('success', 'Data activity berhasil diedit!');
    }

    public function prosesHapus($id_engineering_activity)
    {
        $this->ModelEngineeringActivity->hapus($id_engineering_activity);
        return back()->with('success', 'Data activity berhasil dihapus!');
    }
}
