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

        // $data = $this->ModelEngineeringActivity->dataIsRespon(1);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', '');
        $sheet->setCellValue('C1', 'Job Item');
        $sheet->setCellValue('D1', 'Januari');
        $sheet->setCellValue('E1', 'Feburari');
        $sheet->setCellValue('F1', 'Maret');
        $sheet->setCellValue('G1', 'April');
        $sheet->setCellValue('H1', 'Mei');
        $sheet->setCellValue('I1', 'Juni');
        $sheet->setCellValue('J1', 'Juli');
        $sheet->setCellValue('K1', 'Agustus');
        $sheet->setCellValue('L1', 'September');
        $sheet->setCellValue('M1', 'Oktober');
        $sheet->setCellValue('N1', 'November');
        $sheet->setCellValue('O1', 'Desember');

        $sheet->setCellValue('A2', '');
        $sheet->setCellValue('B2', '');
        $sheet->setCellValue('C2', '');
        $sheet->setCellValue('D2', '21 days');
        $sheet->setCellValue('E2', '21 days');
        $sheet->setCellValue('F2', '21 days');
        $sheet->setCellValue('G2', '21 days');
        $sheet->setCellValue('H2', '21 days');
        $sheet->setCellValue('I2', '21 days');
        $sheet->setCellValue('J2', '21 days');
        $sheet->setCellValue('K2', '21 days');
        $sheet->setCellValue('L2', '21 days');
        $sheet->setCellValue('M2', '21 days');
        $sheet->setCellValue('N2', '21 days');
        $sheet->setCellValue('O2', '21 days');

        // $row = 2;
        // $no = 1;
        // foreach ($data as $item) {
        //     if(date('Y-m', strtotime($item->tanggal_submit)) === Request()->bulan) {
        //         $sheet->setCellValue('A' . $row, $no++);
        //         $sheet->setCellValue('B' . $row, $item->nama_proyek);
        //         $sheet->setCellValue('C' . $row, $item->pic);
        //         $sheet->setCellValue('D' . $row, $item->nomor_laporan);
        //         $sheet->setCellValue('E' . $row, $item->kode);
        //         $sheet->setCellValue('F' . $row, $item->topik);
        //         $sheet->setCellValue('G' . $row, $item->tanggal_submit);
        //         $sheet->setCellValue('H' . $row, $item->tanggal_selesai ? $item->tanggal_selesai : '-');
        //         $sheet->setCellValue('I' . $row, $item->status_support ? $item->status_support : '-');
        //         $sheet->setCellValue('J' . $row, $item->note ? $item->note : '-');
        //         $sheet->setCellValue('K' . $row, $item->kendala);
        //         $sheet->setCellValue('L' . $row, $item->dokumen ? $item->dokumen : '-');
        //         $row++;
        //     }
        // }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-productivity-by-team.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
