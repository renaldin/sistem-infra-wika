<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelMonthlyReport;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MonthlyReportAdmin extends Controller
{

    private $ModelProyek, $ModelTimProyek, $MonthlyReportAll, $ModelMonthlyReport, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek          = new ModelProyek();
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelMonthlyReport       = new ModelMonthlyReport();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $data = [
            'title'             => 'Monthly Report',
            'subTitle'          => 'Daftar Monthly Report',
            'daftarProyek'      => $this->ModelProyek->data(),
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.monthlyReportAdmin.index', $data);
    }

    public function detail($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Detail Monthly Report',
            'detail'                    => $this->ModelProyek->detail($id_proyek),
            'daftarMonthlyReport'     => $this->ModelMonthlyReport->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.monthlyReportAdmin.detail', $data);
    }

    public function edit($id_monthly_report)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Edit Monthly Report',
            'form'                      => 'Edit',
            'detail'     => $this->ModelMonthlyReport->detail($id_monthly_report),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.monthlyReportAdmin.form', $data);
    }

    public function prosesEdit($id_monthly_report)
    {

        if(Request()->dua_d === 'on') {
            $dua_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $dua_d = 0;
        }
        if(Request()->tiga_d === 'on') {
            $tiga_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $tiga_d = 0;
        }
        if(Request()->empat_d === 'on') {
            $empat_d = 1;
            $kesiapan_bim5d = 'Persiapan Implementasi BIM 5D';
        } else {
            $empat_d = 0;
        }
        if(Request()->lima_d === 'on') {
            $lima_d = 1;
            $kesiapan_bim5d = 'Siap Implementasi BIM 5D';
        } else {
            $lima_d = 0;
        }
        if(Request()->cde === 'on') {
            $cde = 1;
        } else {
            $cde = 0;
        }

        $dataProyek = [
            'id_proyek'             => Request()->id_proyek,
            'dua_d'                 => $dua_d,
            'tiga_d'                => $tiga_d,
            'empat_d'               => $empat_d,
            'lima_d'                => $lima_d,
            'cde'                   => $cde,
            'kesiapan_bim5d'                   => $kesiapan_bim5d,
        ];

        $data = [
            'id_monthly_report'                 => $id_monthly_report,
            'tanggal_report'                    => Request()->tanggal_report,
            'realisasi_proyek'                  => Request()->realisasi_proyek,
            'kendala_implementasi_bim'          => Request()->kendala_implementasi_bim,
            'engineering_issue_berjalan'        => Request()->engineering_issue_berjalan,
            'masalah_produksi_berjalan'         => Request()->masalah_produksi_berjalan,
            'konsep_lean_construction_berjalan' => Request()->konsep_lean_construction_berjalan,
            'feedback_untuk_perusahaan'         => Request()->feedback_untuk_perusahaan,
            'evidence_link'                     => Request()->evidence_link,
        ];

        $this->ModelMonthlyReport->edit($data);
        $this->ModelProyek->edit($dataProyek);
        return redirect('/detail-monthly-report-admin/'.Request()->id_proyek)->with('success', 'Data Monthly Report berhasil diedit!');
    }

    public function exportExcel($id_proyek = null)
    {
        $data = $this->ModelMonthlyReport->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Proyek');
        $sheet->setCellValue('C1', 'Realisasi Proyek');
        $sheet->setCellValue('D1', 'Kendala Implementasi BIM');
        $sheet->setCellValue('E1', 'Engineering Issue Berjalan');
        $sheet->setCellValue('F1', 'Masalah Produksi Berjalan');
        $sheet->setCellValue('G1', 'Konsep Lean Construction Berjalan');
        $sheet->setCellValue('H1', 'Feedback Untuk Perusahaan');
        $sheet->setCellValue('I1', 'Evidence Link');
        $sheet->setCellValue('J1', 'Remarks');
        $sheet->setCellValue('K1', 'Tanggal Report');

        $row = 2;
        $no = 1;
        if($id_proyek === null) {
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->nama_proyek);
                $sheet->setCellValue('C' . $row, $item->realisasi_proyek);
                $sheet->setCellValue('D' . $row, $item->kendala_implementasi_bim);
                $sheet->setCellValue('E' . $row, $item->engineering_issue_berjalan);
                $sheet->setCellValue('F' . $row, $item->masalah_produksi_berjalan);
                $sheet->setCellValue('G' . $row, $item->konsep_lean_construction_berjalan);
                $sheet->setCellValue('H' . $row, $item->feedback_untuk_perusahaan);
                $sheet->setCellValue('I' . $row, $item->evidence_link);
                $sheet->setCellValue('J' . $row, $item->remarks);
                $sheet->setCellValue('K' . $row, $item->tanggal_report);
                $row++;
            }
        } else {
            foreach ($data as $item) {
                if($item->id_proyek == $id_proyek) {
                    $sheet->setCellValue('A' . $row, $no++);
                    $sheet->setCellValue('B' . $row, $item->nama_proyek);
                    $sheet->setCellValue('C' . $row, $item->realisasi_proyek);
                    $sheet->setCellValue('D' . $row, $item->kendala_implementasi_bim);
                    $sheet->setCellValue('E' . $row, $item->engineering_issue_berjalan);
                    $sheet->setCellValue('F' . $row, $item->masalah_produksi_berjalan);
                    $sheet->setCellValue('G' . $row, $item->konsep_lean_construction_berjalan);
                    $sheet->setCellValue('H' . $row, $item->feedback_untuk_perusahaan);
                    $sheet->setCellValue('I' . $row, $item->evidence_link);
                    $sheet->setCellValue('J' . $row, $item->remarks);
                    $sheet->setCellValue('K' . $row, $item->tanggal_report);
                    $row++;
                }
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'monthly-report.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
