<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelTechnicalSupporting;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use App\Models\ModelRencana;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use stdClass;

class TechnicalSupporting extends Controller
{

    private $ModelProyek, $ModelRencana, $ModelTechnicalSupporting, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelRencana                 = new ModelRencana();
        $this->ModelTechnicalSupporting     = new ModelTechnicalSupporting();
        $this->ModelDetailTimProyek         = new ModelDetailTimProyek();
        $this->ModelUser                    = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimProyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $idTimProyek = [];
        foreach($detailTimProyek as $item) {
            $idTimProyek[] = $item->id_tim_proyek;
        }

        $data = [
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Monitoring',
            'idTimProyek'               => $idTimProyek,
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.index', $data);
    }

    public function tambah()
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
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Tambah Technical Supporting',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('technicalSupporting.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek'         => 'required',
            'tanggal_submit'    => 'required|date',
            'kendala'           => 'required'
        ], [
            'id_proyek.required'        => 'Nama proyek harus diisi!',
            'tanggal_submit.required'   => 'Tanggal submit harus diisi!',
            'kendala.required'           => 'Kendala teknis harus diisi!'
        ]);

        $data = [
            'id_proyek'         => Request()->id_proyek,
            'tanggal_submit'    => Request()->tanggal_submit,
            'kendala'           => Request()->kendala
        ];

        $this->ModelTechnicalSupporting->tambah($data);
        return redirect()->route('monitoring-technical-supporting')->with('success', 'Data berhasil ditambahkan!');
    }

    public function permintaan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Permintaan',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.permintaan', $data);
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Technical Supporting',
            'subTitle'                  => 'Update',
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'daftarTechnicalSupporting' => $this->ModelTechnicalSupporting->dataIsRespon(1),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.update', $data);
    }

    public function receive($id_technical_supporting)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Form Permintaan',
            'detail'            => $this->ModelTechnicalSupporting->detail($id_technical_supporting),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.formRespon', $data);
    }

    public function edit($id_technical_supporting)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Technical Supporting',
            'subTitle'          => 'Form Update',
            'detail'            => $this->ModelTechnicalSupporting->detail($id_technical_supporting),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('technicalSupporting.formRespon', $data);
    }

    public function prosesEdit($id_technical_supporting)
    {
        Request()->validate([
            'nomor_laporan'     => 'required',
            'kode'              => 'required',
            'topik'             => 'required'
        ], [
            'nomor_laporan.required'    => 'Nomor laporan harus diisi!',
            'kode.required'             => 'Kode harus diisi!',
            'topik.required'            => 'Topik harus diisi!'
        ]);

        $detail = $this->ModelTechnicalSupporting->detail($id_technical_supporting);
        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if ($detail->is_respon === 0) {
            $data = [
                'id_technical_supporting'   => $id_technical_supporting,
                'pic'                       => $user->nama_user,
                'id_user'                   => Session()->get('id_user'),
                'nomor_laporan'             => Request()->nomor_laporan,
                'kode'                      => Request()->kode,
                'topik'                     => Request()->topik,
                'is_respon'                 => 1
            ];
        } else {
            if (Request()->tanggal_selesai) {
                $data = [
                    'id_technical_supporting'   => $id_technical_supporting,
                    'nomor_laporan'             => Request()->nomor_laporan,
                    'pic'                       => $user->nama_user,
                    'id_user'                   => Session()->get('id_user'),
                    'kode'                      => Request()->kode,
                    'topik'                     => Request()->topik,
                    'status_support'            => Request()->status_support,
                    'note'                      => Request()->note,
                    'dokumen'                   => Request()->dokumen,
                    'tanggal_selesai'           => Request()->tanggal_selesai,
                ];
            } else {
                $data = [
                    'id_technical_supporting'   => $id_technical_supporting,
                    'nomor_laporan'             => Request()->nomor_laporan,
                    'pic'                       => $user->nama_user,
                    'id_user'                   => Session()->get('id_user'),
                    'kode'                      => Request()->kode,
                    'topik'                     => Request()->topik,
                    'status_support'            => Request()->status_support,
                    'note'                      => Request()->note,
                    'dokumen'                   => Request()->dokumen
                ];
            }
        }

        $this->ModelTechnicalSupporting->edit($data);
        return redirect()->route('update-technical-supporting')->with('success', 'Data berhasil ditambahkan!');
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!Request()->tahun) {
            $data = [
                'title'                     => 'Technical Supporting',
                'subTitle'                  => 'Progress',
                'tahun'                     => false,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {

            $rencana = $this->ModelRencana->checkData('Technical Supporting', Request()->tahun);
            if($rencana) {
                $rencana = $rencana;
            } else {
                $rencana = new stdClass();
                $rencana->januari = 0;
                $rencana->februari = 0;
                $rencana->maret = 0;
                $rencana->april = 0;
                $rencana->mei = 0;
                $rencana->juni = 0;
                $rencana->juli = 0;
                $rencana->agustus = 0;
                $rencana->september = 0;
                $rencana->oktober = 0;
                $rencana->november = 0;
                $rencana->desember = 0;
            }
            
            $data = [
                'title'                     => 'Technical Supporting',
                'subTitle'                  => 'Progress',
                'tahun'                     => Request()->tahun,
                'detailProgress'            => $this->ModelTechnicalSupporting->progress(Request()->tahun),
                'detailRencana'             => $rencana,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        }

        return view('technicalSupporting.progress', $data);
    }

    public function exportExcel()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelTechnicalSupporting->dataIsRespon(1);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Proyek');
        $sheet->setCellValue('C1', 'PIC');
        $sheet->setCellValue('D1', 'Nomor Laporan');
        $sheet->setCellValue('E1', 'Kode');
        $sheet->setCellValue('F1', 'Topik');
        $sheet->setCellValue('G1', 'Tanggal Submit');
        $sheet->setCellValue('H1', 'Tanggal Selesai');
        $sheet->setCellValue('I1', 'Status');
        $sheet->setCellValue('J1', 'Note');
        $sheet->setCellValue('K1', 'Kendala');
        $sheet->setCellValue('L1', 'Link Dokumen');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            if(date('Y-m', strtotime($item->tanggal_submit)) === Request()->bulan) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->nama_proyek);
                $sheet->setCellValue('C' . $row, $item->pic);
                $sheet->setCellValue('D' . $row, $item->nomor_laporan);
                $sheet->setCellValue('E' . $row, $item->kode);
                $sheet->setCellValue('F' . $row, $item->topik);
                $sheet->setCellValue('G' . $row, $item->tanggal_submit);
                $sheet->setCellValue('H' . $row, $item->tanggal_selesai ? $item->tanggal_selesai : '-');
                $sheet->setCellValue('I' . $row, $item->status_support ? $item->status_support : '-');
                $sheet->setCellValue('J' . $row, $item->note ? $item->note : '-');
                $sheet->setCellValue('K' . $row, $item->kendala);
                $sheet->setCellValue('L' . $row, $item->dokumen ? $item->dokumen : '-');
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-technical-supportiing-bulan-'.strtolower(date('F', strtotime(Request()->bulan))).'.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
