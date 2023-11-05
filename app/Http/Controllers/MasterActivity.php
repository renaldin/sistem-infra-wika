<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMasterActivity;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelUser;
use DateTime;

class MasterActivity extends Controller
{

    private $ModelMasterActivity, $ModelTimProyek, $ModelDetailTimProyek, $ModelUser, $ModelEngineeringActivity;

    public function __construct()
    {
        $this->ModelMasterActivity      = new ModelMasterActivity();
        $this->ModelTimProyek           = new ModelTimProyek();
        $this->ModelDetailTimProyek     = new ModelDetailTimProyek();
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
        $this->ModelUser                = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Master Activity',
            'subTitle'                  => 'Daftar Master Activity',
            'bulan'                     => true,
            'detailBulan'               => Request()->bulan,
            'daftarUser'                => $this->ModelUser->dataUser(),
            'daftar'                    => $this->ModelMasterActivity->whereMonthYear(Request()->bulan),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            'pesanError'                => null,
            'pesanSuccess'              => null
        ];

        return view('admin.masterActivity.index', $data);
    }

    public function pilihBulan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Master Activity',
            'subTitle'                  => 'Pilih Bulan',
            'bulan'                     => false,
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.masterActivity.index', $data);
    }

    public function prosesTambah()
    {

        $detailBulan = Request()->detail_bulan;
        $absenseEnd = Request()->absense_end;
        $absenseEndBulan = date('Y-m', strtotime($absenseEnd));
        if($detailBulan !== $absenseEndBulan) {
            $data = [
                'title'                     => 'Master Activity',
                'subTitle'                  => 'Daftar Master Activity',
                'bulan'                     => true,
                'detailBulan'               => $detailBulan,
                'daftarUser'                => $this->ModelUser->dataUser(),
                'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
                'pesanError'                => 'Gagal! Anda tidak memilih tanggal di bulan '.date('F Y', strtotime($detailBulan)),
                'pesanSuccess'              => null,
            ];

            return view('admin.masterActivity.index', $data);
        }

        $activity = $this->ModelEngineeringActivity->whereMonthYear($detailBulan);
        foreach($activity as $item) {

            $workDays = $this->networkDays($item->tanggal_masuk_kerja, $absenseEnd);
            $workHours = $workDays * 8;

            $data = [
                'id_user'           => $item->id_user,
                'absense_start'     => $item->tanggal_masuk_kerja,
                'absense_end'       => $absenseEnd,
                'work_days'         => $workDays,  
                'work_hours'        => $workHours,  
                'tanggal_master'    => $absenseEnd
            ];
            $this->ModelMasterActivity->tambah($data);
        }

        $data = [
            'title'                     => 'Master Activity',
            'subTitle'                  => 'Daftar Master Activity',
            'bulan'                     => true,
            'detailBulan'               => $detailBulan,
            'daftarUser'                => $this->ModelUser->dataUser(),
            'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            'pesanError'                => null,
            'pesanSuccess'              => 'Data master activity berhasil ditambahkan!'
        ];

        return view('admin.masterActivity.index', $data);
    }

    public function prosesHapus()
    {
        $detailBulan = Request()->detail_bulan;
        $this->ModelMasterActivity->hapus($detailBulan);

        $data = [
            'title'                     => 'Master Activity',
            'subTitle'                  => 'Daftar Master Activity',
            'bulan'                     => true,
            'detailBulan'               => $detailBulan,
            'daftarUser'                => $this->ModelUser->dataUser(),
            'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            'pesanError'                => null,
            'pesanSuccess'              => 'Data master activity berhasil dihapus!'
        ];

        return view('admin.masterActivity.index', $data);
    }

    public function networkDays($start, $end) {
        $startDate = new DateTime($start);
        $endDate = new DateTime($end);
    
        $weekendDays = [6, 7];
        $totalDays = 0;
    
        while ($startDate <= $endDate) {
            if (!in_array($startDate->format('N'), $weekendDays)) {
                $totalDays++;
            }
            $startDate->modify('+1 day');
        }
    
        return $totalDays;
    }
}
