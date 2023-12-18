<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelUser;
use App\Models\ModelKategoriPekerjaan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function validasi()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Engineering Activity',
            'subTitle'          => 'Validasi Activity',
            'checked'           => false,
            'daftar'            => $this->ModelEngineeringActivity->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('validasi.index', $data);
    }

    public function validasiProses($id_engineering_activity) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_engineering_activity'   => $id_engineering_activity,
            'validasi'                   => 1
        ];

        $this->ModelEngineeringActivity->edit($data);
        return back()->with('success', 'Data activity telah di-validasi!');
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

    public function exportExcel()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelEngineeringActivity->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Masuk Kerja');
        $sheet->setCellValue('C1', 'Nama Lengkap');
        $sheet->setCellValue('D1', 'NIP');
        $sheet->setCellValue('E1', 'Jabatan');
        $sheet->setCellValue('F1', 'Fungsi');
        $sheet->setCellValue('G1', 'Nomor Telepon');
        $sheet->setCellValue('H1', 'Status Kerja');
        $sheet->setCellValue('I1', 'Judul / Deskripsi Pekerjaan');
        $sheet->setCellValue('J1', 'Kategori Pekerjaan');
        $sheet->setCellValue('K1', 'Durasi');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            if(date('Y-m', strtotime($item->tanggal_masuk_kerja)) === Request()->bulan) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->tanggal_masuk_kerja);
                $sheet->setCellValue('C' . $row, $item->nama_user);
                $sheet->setCellValue('D' . $row, "$item->nip");
                $sheet->setCellValue('E' . $row, $item->jabatan);
                $sheet->setCellValue('F' . $row, $item->fungsi);
                $sheet->setCellValue('G' . $row, "$item->telepon");
                $sheet->setCellValue('H' . $row, $item->status_kerja);
                $sheet->setCellValue('I' . $row, $item->judul_pekerjaan);
                $sheet->setCellValue('J' . $row, $item->kategori_pekerjaan);
                $sheet->setCellValue('K' . $row, $item->durasi);
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-activity-bulan-'.strtolower(date('F', strtotime(Request()->bulan))).'.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
