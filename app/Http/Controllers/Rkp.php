<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelRkp;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rkp extends Controller
{

    private $ModelProyek, $ModelRkp, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelRkp                     = new ModelRkp();
        $this->ModelDetailTimProyek         = new ModelDetailTimProyek();
        $this->ModelUser                    = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => null,
            'subTitle'                  => 'Monitoring RKP',
            'daftarRkp'                 => $this->ModelRkp->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('rkp.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'RKP',
            'subTitle'          => 'Tambah',
            'daftarProyek'      => $this->ModelProyek->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('rkp.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek' => 'required',
            'kode_spk'  => 'required'
        ], [
            'id_proyek.required'    => 'Nama proyek harus diisi!',
            'kode_spk.required'     => 'Kode SPK harus diisi!'
        ]);

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'kode_spk'      => Request()->kode_spk,
            'id_user_respon'=> Session()->get('id_user'),
            'is_respon'     => 1,
            'tanggal_rkp'   => date('Y-m-d')
        ];

        $dataProyek = [
          'id_proyek'       => Request()->id_proyek,
          'status_rkp'      => 1
        ];

        $this->ModelProyek->edit($dataProyek);
        $this->ModelRkp->tambah($data);
        return redirect()->route('update-rkp')->with('success', 'Data berhasil ditambahkan!');
    }

    public function terima()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'RKP',
            'subTitle'                  => 'Terima',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarRkp'                 => $this->ModelRkp->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('rkp.terima', $data);
    }

    public function edit($id_rkp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimPRoyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = $this->ModelProyek->dataWhere('proyek.id_tim_proyek', $item->id_tim_proyek);
        }

        $data = [
            'title'             => 'RKP',
            'subTitle'          => 'Form Update',
            'daftarProyek'      => $dataProyekByUser,
            'detail'            => $this->ModelRkp->detail($id_rkp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Edit'
        ];

        return view('rkp.form', $data);
    }

    public function prosesEdit($id_rkp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->review1) {
          $review1 = 1;
        } else {
          $review1 = 0;
        }
        if(Request()->review2) {
          $review2 = 1;
        } else {
          $review2 = 0;
        }
        if(Request()->review3) {
          $review3 = 1;
        } else {
          $review3 = 0;
        }
        if(Request()->review4) {
          $review4 = 1;
        } else {
          $review4 = 0;
        }
        if(Request()->review5) {
          $review5 = 1;
        } else {
          $review5 = 0;
        }
        if(Request()->review6) {
          $review6 = 1;
        } else {
          $review6 = 0;
        }

        $data = [
          'id_rkp'      => $id_rkp,
          'review1'     => $review1,
          'review2'     => $review2,
          'review3'     => $review3,
          'review4'     => $review4,
          'review5'     => $review5,
          'review6'     => $review6,
          'note'        => Request()->note
        ];

        $this->ModelRkp->edit($data);
        return redirect()->route('update-rkp')->with('success', 'Data berhasil diupdate!');
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'RKP',
            'subTitle'                  => 'Update',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('rkp.update', $data);
    }

    public function exportExcel()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelRkp->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode SPK');
        $sheet->setCellValue('C1', 'Proyek');
        $sheet->setCellValue('D1', 'Review RKP Tahap 1');
        $sheet->setCellValue('E1', 'Review RKP Tahap 2');
        $sheet->setCellValue('F1', 'Review RKP Tahap 3');
        $sheet->setCellValue('G1', 'Review RKP Tahap 4');
        $sheet->setCellValue('H1', 'Review RKP Tahap 5');
        $sheet->setCellValue('I1', 'Review RKP Tahap 6');
        $sheet->setCellValue('J1', 'Reviewer');
        $sheet->setCellValue('K1', 'Note');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            if($item->is_respon === 1) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->kode_spk);
                $sheet->setCellValue('C' . $row, $item->nama_proyek);
                $sheet->setCellValue('D' . $row, $item->review1 == 0 ? 'X' : 'V');
                $sheet->setCellValue('E' . $row, $item->review2 == 0 ? 'X' : 'V');
                $sheet->setCellValue('F' . $row, $item->review3 == 0 ? 'X' : 'V');
                $sheet->setCellValue('G' . $row, $item->review4 == 0 ? 'X' : 'V');
                $sheet->setCellValue('H' . $row, $item->review5 == 0 ? 'X' : 'V');
                $sheet->setCellValue('I' . $row, $item->review6 == 0 ? 'X' : 'V');
                $sheet->setCellValue('J' . $row, $item->nama_user);
                $sheet->setCellValue('K' . $row, $item->note);
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-rkp.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}