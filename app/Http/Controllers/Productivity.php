<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMasterActivity;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelUser;
use App\Models\ModelKategoriPekerjaan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Productivity extends Controller
{

    private $ModelMasterActivity, $ModelTimProyek, $ModelDetailTimProyek, $ModelUser, $ModelEngineeringActivity, $ModelKategoriPekerjaan;

    public function __construct()
    {
        $this->ModelMasterActivity      = new ModelMasterActivity();
        $this->ModelTimProyek           = new ModelTimProyek();
        $this->ModelDetailTimProyek     = new ModelDetailTimProyek();
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
        $this->ModelUser                = new ModelUser();
        $this->ModelKategoriPekerjaan   = new ModelKategoriPekerjaan();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (!Request()->bulan) {
            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Team',
                'bulan'                     => false,
                'detailBulan'               => false,
                'daftarUser'                => $this->ModelUser->dataUser(),
                'daftar'                    => $this->ModelMasterActivity->whereMonthYear(Request()->bulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {

            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Team',
                'bulan'                     => true,
                'detailBulan'               => Request()->bulan,
                'daftarUser'                => $this->ModelUser->dataUser(),
                'daftarKategoriPekerjaan'   => $this->ModelKategoriPekerjaan->dataFungsi(),
                'activity'                  => $this->ModelEngineeringActivity->dataProductivityTeam(Request()->bulan),
                'masterActivity'            => $this->ModelMasterActivity->masterFungsi(Request()->bulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        }

        return view('productivity.index', $data);
    }

    public function byPerson()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (!Request()->bulan) {
            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Person',
                'bulan'                     => false,
                'detailBulan'               => false,
                'daftarUser'                => $this->ModelUser->dataUser(),
                'daftar'                    => $this->ModelMasterActivity->whereMonthYear(Request()->bulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {

            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Person',
                'bulan'                     => true,
                'detailBulan'               => Request()->bulan,
                'activity'                  => $this->ModelEngineeringActivity->activityPerson(Request()->bulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
                'pesanError'                => null
            ];
        }

        return view('productivity.byPerson', $data);
    }

    public function detailByPerson($id_user, $detailBulan) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $masterActivity = $this->ModelMasterActivity->masterPerson($id_user, $detailBulan);
        
        if($masterActivity === null) {
            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Person',
                'bulan'                     => true,
                'detailBulan'               => $detailBulan,
                'activity'                  => $this->ModelEngineeringActivity->activityPerson($detailBulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
                'pesanError'                => 'Maaf! Data master activity belum dibuat. Silahkan buat dulu di menu Master Activity!'
            ];

            return view('productivity.byPerson', $data);
        } else {
            $data = [
                'title'                     => 'Productivity',
                'subTitle'                  => 'By Person',
                'bulan'                     => true,
                'detailBulan'               => $detailBulan,
                'detailUser'                => $this->ModelUser->detail($id_user),
                'daftarKategoriPekerjaan'   => $this->ModelKategoriPekerjaan->dataFungsi(),
                'activity'                  => $this->ModelEngineeringActivity->dataProductivityPerson($id_user, $detailBulan),
                'masterActivity'            => $masterActivity,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];

            return view('productivity.detailByPerson', $data);
        }
     
    }

    public function exportExcel()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelEngineeringActivity->dataIsRespon(1);

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
