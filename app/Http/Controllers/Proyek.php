<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Proyek extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelDetailTimProyek, $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelProyek          = new ModelProyek();
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
        $this->public_path          = 'proyek';
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
            'latitude'          => 'required',
            'longitude'         => 'required',
            'deskripsi_proyek'         => 'required',
            'gambar'            => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_tim_proyek.required'    => 'Kesie Eng harus diisi!',
            'latitude.required'         => 'Latitude harus diisi!',
            'longitude.required'        => 'Longitude harus diisi!',
            'deskripsi_proyek.required'        => 'Deskripsi harus diisi!',
            'gambar.required'           => 'Gambar Anda harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . ' ' . Request()->nama_proyek . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        $data = [
            'nama_proyek'       => Request()->nama_proyek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'     => Request()->id_tim_proyek,
            'latitude'          => Request()->latitude,
            'longitude'         => Request()->longitude,
            'deskripsi_proyek'         => Request()->deskripsi_proyek,
            'gambar'            => $fileName,
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
            'latitude'          => 'required',
            'longitude'         => 'required',
            'deskripsi_proyek'         => 'required',
            'gambar'            => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_proyek.required'      => 'Nama proyek harus diisi!',
            'tanggal.required'          => 'Tanggal harus diisi!',
            'tipe_konstruksi.required'  => 'Tipe konstruksi harus diisi!',
            'prioritas.required'        => 'Prioritas harus diisi!',
            'status.required'           => 'Status harus diisi!',
            'id_tim_proyek.required'     => 'Kesie Eng harus diisi!',
            'latitude.required'         => 'Latitude harus diisi!',
            'longitude.required'        => 'Longitude harus diisi!',
            'deskripsi_proyek.required'        => 'Deskripsi harus diisi!',
            'gambar.mimes'              => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $detail = $this->ModelProyek->detail($id_proyek);

        $data = [
            'id_proyek'         => $id_proyek,
            'nama_proyek'       => Request()->nama_proyek,
            'tanggal'           => Request()->tanggal,
            'tipe_konstruksi'   => Request()->tipe_konstruksi,
            'prioritas'         => Request()->prioritas,
            'status'            => Request()->status,
            'id_tim_proyek'      => Request()->id_tim_proyek,
            'latitude'          => Request()->latitude,
            'longitude'         => Request()->longitude,
            'deskripsi_proyek'         => Request()->deskripsi_proyek,
        ];

        if (Request()->gambar <> "") {
            if ($detail->gambar <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . ' ' . Request()->nama_proyek . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data['gambar'] = $fileName;
        }


        $this->ModelProyek->edit($data);
        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil diedit!');
    }

    public function prosesHapus($id_proyek)
    {
        $this->ModelProyek->hapus($id_proyek);
        return redirect()->route('daftar-proyek')->with('success', 'Data Proyek berhasil dihapus !');
    }

    public function exportExcel()
    {
        $data = $this->ModelProyek->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Proyek');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Tipe Konstruksi');
        $sheet->setCellValue('E1', 'Prioritas');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Latitude');
        $sheet->setCellValue('H1', 'Longitude');
        $sheet->setCellValue('I1', 'Nama Tim Proyek');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item->nama_proyek);
            $sheet->setCellValue('C' . $row, $item->tanggal);
            $sheet->setCellValue('D' . $row, $item->tipe_konstruksi);
            $sheet->setCellValue('E' . $row, $item->prioritas);
            $sheet->setCellValue('F' . $row, $item->status);
            $sheet->setCellValue('G' . $row, $item->latitude);
            $sheet->setCellValue('H' . $row, $item->longitude);
            $sheet->setCellValue('I' . $row, $item->nama_tim_proyek);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-proyek.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
