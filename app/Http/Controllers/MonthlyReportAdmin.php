<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelMonthlyReport;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;

class MonthlyReportAdmin extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelMonthlyReport, $ModelDetailTimProyek, $ModelUser;

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

        if(Request()->tiga_d === 'on') {
            $tiga_d = 1;
        } else {
            $tiga_d = 0;
        }
        if(Request()->empat_d === 'on') {
            $empat_d = 1;
            $kesiapan_bim5d = 1;
        } else {
            $empat_d = 0;
            $kesiapan_bim5d = 0;
        }
        if(Request()->lima_d === 'on') {
            $lima_d = 1;
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
}
