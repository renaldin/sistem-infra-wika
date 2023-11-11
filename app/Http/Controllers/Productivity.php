<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMasterActivity;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelUser;
use App\Models\ModelKategoriPekerjaan;

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

    // public function pilihBulan()
    // {
    //     if (!Session()->get('role')) {
    //         return redirect()->route('login');
    //     }

    //     $data = [
    //         'title'                     => 'Master Activity',
    //         'subTitle'                  => 'Pilih Bulan',
    //         'bulan'                     => false,
    //         'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
    //     ];

    //     return view('admin.masterActivity.index', $data);
    // }

    // public function prosesTambah()
    // {

    //     $detailBulan = Request()->detail_bulan;
    //     $absenseEnd = Request()->absense_end;
    //     $absenseEndBulan = date('Y-m', strtotime($absenseEnd));
    //     if($detailBulan !== $absenseEndBulan) {
    //         $data = [
    //             'title'                     => 'Master Activity',
    //             'subTitle'                  => 'Daftar Master Activity',
    //             'bulan'                     => true,
    //             'detailBulan'               => $detailBulan,
    //             'daftarUser'                => $this->ModelUser->dataUser(),
    //             'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
    //             'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
    //             'pesanError'                => 'Gagal! Anda tidak memilih tanggal di bulan '.date('F Y', strtotime($detailBulan)),
    //             'pesanSuccess'              => null,
    //         ];

    //         return view('admin.masterActivity.index', $data);
    //     }

    //     $activity = $this->ModelEngineeringActivity->whereMonthYear($detailBulan);
    //     foreach($activity as $item) {

    //         $workDays = $this->networkDays($item->tanggal_masuk_kerja, $absenseEnd);
    //         $workHours = $workDays * 8;

    //         $data = [
    //             'id_user'           => $item->id_user,
    //             'absense_start'     => $item->tanggal_masuk_kerja,
    //             'absense_end'       => $absenseEnd,
    //             'work_days'         => $workDays,  
    //             'work_hours'        => $workHours,  
    //             'tanggal_master'    => $absenseEnd
    //         ];
    //         $this->ModelMasterActivity->tambah($data);
    //     }

    //     $data = [
    //         'title'                     => 'Master Activity',
    //         'subTitle'                  => 'Daftar Master Activity',
    //         'bulan'                     => true,
    //         'detailBulan'               => $detailBulan,
    //         'daftarUser'                => $this->ModelUser->dataUser(),
    //         'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
    //         'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
    //         'pesanError'                => null,
    //         'pesanSuccess'              => 'Data master activity berhasil ditambahkan!'
    //     ];

    //     return view('admin.masterActivity.index', $data);
    // }

    // public function prosesHapus()
    // {
    //     $detailBulan = Request()->detail_bulan;
    //     $this->ModelMasterActivity->hapus($detailBulan);

    //     $data = [
    //         'title'                     => 'Master Activity',
    //         'subTitle'                  => 'Daftar Master Activity',
    //         'bulan'                     => true,
    //         'detailBulan'               => $detailBulan,
    //         'daftarUser'                => $this->ModelUser->dataUser(),
    //         'daftar'                    => $this->ModelMasterActivity->whereMonthYear($detailBulan),
    //         'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
    //         'pesanError'                => null,
    //         'pesanSuccess'              => 'Data master activity berhasil dihapus!'
    //     ];

    //     return view('admin.masterActivity.index', $data);
    // }

    // public function networkDays($start, $end) {
    //     $startDate = new DateTime($start);
    //     $endDate = new DateTime($end);

    //     $weekendDays = [6, 7];
    //     $totalDays = 0;

    //     while ($startDate <= $endDate) {
    //         if (!in_array($startDate->format('N'), $weekendDays)) {
    //             $totalDays++;
    //         }
    //         $startDate->modify('+1 day');
    //     }

    //     return $totalDays;
    // }
}
