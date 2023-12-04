<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelEvent;

class Event extends Controller
{

    private $ModelUser, $public_path, $ModelEvent;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelEvent = new ModelEvent();
        $this->public_path = 'events';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Events',
            'daftarEvent'       => $this->ModelEvent->data('All'),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.event.index', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'gambar'        => 'required|mimes:jpeg,png,jpg'
        ], [
            'gambar.required'       => 'Gambar Anda harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!'
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
            'gambar'        => $fileName,
            'is_active'     => $isActive,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'id_user'       => Session()->get('id_user')
        ];

        $this->ModelEvent->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_event)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'gambar'        => 'mimes:jpeg,png,jpg'
        ], [
            'gambar.mimes'  => 'Format gambar harus jpg/jpeg/png!'
        ]);

        $detail = $this->ModelEvent->detail($id_event);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'id_event'      => $id_event,
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

        $this->ModelEvent->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_event)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelEvent->detail($id_event);

        if ($detail->gambar <> "") {
            unlink(public_path($this->public_path) . '/' . $detail->gambar);
        }

        $this->ModelEvent->hapus($id_event);
        return back()->with('success', 'Data berhasil dihapus !');
    }
}
