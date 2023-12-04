<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelInfraNews;

class InfraNews extends Controller
{

    private $ModelUser, $public_path, $ModelInfraNews;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelInfraNews = new ModelInfraNews();
        $this->public_path = 'news';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'News',
            'daftarNews'        => $this->ModelInfraNews->data('All'),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.news.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Tambah News',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.news.form', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'     => 'required',
            'tanggal'   => 'required',
            'news'      => 'required',
            'gambar'    => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'tanggal.required'      => 'Tanggal harus diisi!',
            'news.required'         => 'News harus diisi!',
            'gambar.required'       => 'Gambar Anda harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . ' ' . Request()->judul . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'judul'         => Request()->judul,
            'tanggal'       => Request()->tanggal,
            'news'          => Request()->news,
            'gambar'        => $fileName,
            'is_active'     => $isActive,
            'id_user'       => Session()->get('id_user')
        ];

        $this->ModelInfraNews->tambah($data);
        return redirect()->route('data-news')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_infra_news)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Edit News',
            'form'              => 'Edit',
            'detail'            => $this->ModelInfraNews->detail($id_infra_news),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.news.form', $data);
    }

    public function prosesEdit($id_infra_news)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'     => 'required',
            'tanggal'   => 'required',
            'news'      => 'required',
            'gambar'    => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'tanggal.required'      => 'Tanggal harus diisi!',
            'news.required'         => 'News harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $detail = $this->ModelInfraNews->detail($id_infra_news);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'id_infra_news' => $id_infra_news,
            'judul'         => Request()->judul,
            'tanggal'       => Request()->tanggal,
            'news'          => Request()->news,
            'is_active'     => $isActive,
            'id_user'       => Session()->get('id_user')
        ];

        if (Request()->gambar <> "") {
            if ($detail->gambar <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') .' '. Request()->judul . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data['gambar'] = $fileName;
        }

        $this->ModelInfraNews->edit($data);
        return redirect()->route('data-news')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_infra_news)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelInfraNews->detail($id_infra_news);

        if ($detail->gambar <> "") {
            unlink(public_path($this->public_path) . '/' . $detail->gambar);
        }

        $this->ModelInfraNews->hapus($id_infra_news);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
