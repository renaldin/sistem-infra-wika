<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelActivity;
use Illuminate\Support\Facades\Hash;

class Activity extends Controller
{

    private $ModelUser, $public_path, $ModelActivity;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelActivity = new ModelActivity();
        $this->public_path = 'activities';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Activities',
            'daftarActivity'    => $this->ModelActivity->data('All'),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.activity.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Tambah Activities',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.activity.form', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'deskripsi.required'    => 'Deskripsi harus diisi!',
            'gambar.required'       => 'Gambar Anda harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'judul'         => Request()->judul,
            'deskripsi'     => Request()->deskripsi,
            'gambar'        => $fileName,
            'is_active'     => $isActive,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'id_user'       => Session()->get('id_user')
        ];

        $this->ModelActivity->tambah($data);
        return redirect()->route('data-activities')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_activity)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Edit Activities',
            'form'              => 'Edit',
            'detail'            => $this->ModelActivity->detail($id_activity),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.activity.form', $data);
    }

    public function prosesEdit($id_activity)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'deskripsi.required'    => 'Deskripsi harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $detail = $this->ModelActivity->detail($id_activity);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'id_activity'   => $id_activity,
            'judul'         => Request()->judul,
            'deskripsi'     => Request()->deskripsi,
            'is_active'     => $isActive,
            'id_user'       => Session()->get('id_user')
        ];

        if (Request()->gambar <> "") {
            if ($detail->gambar <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data['gambar'] = $fileName;
        }

        $this->ModelActivity->edit($data);
        return redirect()->route('data-activities')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_activity)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelActivity->detail($id_activity);

        if ($detail->gambar <> "") {
            unlink(public_path($this->public_path) . '/' . $detail->gambar);
        }

        $this->ModelActivity->hapus($id_activity);
        return back()->with('success', 'Data berhasil dihapus !');
    }
}
