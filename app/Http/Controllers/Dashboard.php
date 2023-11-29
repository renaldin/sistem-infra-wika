<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelSoftware;
use App\Models\ModelRkp;
use App\Models\ModelDetailCsi;
use App\Models\ModelTechnicalSupporting;
use App\Models\ModelDetailLicense;
use App\Models\ModelCsi;
use App\Models\ModelRencana;
use App\Models\ModelKiKm;
use App\Models\ModelLps;
use App\Models\ModelDokumenLps;
use App\Models\ModelKategoriPekerjaan;
use App\Models\ModelMasterActivity;
use App\Models\ModelEngineeringActivity;
use stdClass;

class Dashboard extends Controller
{

    private $ModelUser, $ModelProyek, $ModelSoftware, $ModelRkp, $ModelDetailCsi, $ModelTechnicalSupporting, $ModelDetailLicense, $ModelCsi, $ModelRencana, $ModelKiKm, $ModelLps, $ModelDokumenLps, $ModelKategoriPekerjaan, $ModelMasterActivity, $ModelEngineeringActivity;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->ModelSoftware = new ModelSoftware();
        $this->ModelRkp = new ModelRkp();
        $this->ModelDetailCsi = new ModelDetailCsi();
        $this->ModelTechnicalSupporting = new ModelTechnicalSupporting();
        $this->ModelDetailLicense = new ModelDetailLicense();
        $this->ModelCsi = new ModelCsi();
        $this->ModelRencana = new ModelRencana();
        $this->ModelKiKm = new ModelKiKm();
        $this->ModelLps = new ModelLps();
        $this->ModelDokumenLps = new ModelDokumenLps();
        $this->ModelKategoriPekerjaan = new ModelKategoriPekerjaan();
        $this->ModelMasterActivity = new ModelMasterActivity();
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
    }

    public function index()
    {

        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $jumlahUser = $this->ModelUser->jumlahUser();
        $jumlahHeadOffice = $this->ModelUser->jumlahHeadOffice();
        $jumlahProyek = $this->ModelProyek->jumlahProyek();
        $jumlahSoftware = $this->ModelSoftware->jumlahSoftware();
        $jumlahDokumen = $this->ModelDokumenLps->jumlahData();
        $jumlahDokumenLps = $jumlahDokumen['utama'] + $jumlahDokumen['pendukung'];

        $daftarDetailCsi = $this->ModelDetailCsi->data();
        $totalNilai = 0;
        foreach($daftarDetailCsi as $item) {
            $nilai = $item->nilai != 0 ? round($item->nilai * $item->bobot / 100, 2) : 0;
            $totalNilai = $totalNilai + $nilai;
        }
        $akumulasiCsi = number_format($totalNilai != 0 ? $totalNilai * 5 / 5 : 0, 2);
        $jumlahCsi = $this->ModelCsi->jumlah();
        
        $persenTechnicalSupport = $this->progress('Technical Support');
        $persenKiKm = $this->progress('KI/KM');

        $progressLps = $this->ModelLps->progress();
        $dokumenLps = $this->ModelDokumenLps->jumlahData();

        $daftarProyek = $this->ModelProyek->dataProyek();
        $persen_0_30 = 0;
        $persen_30_50 = 0;
        $persen_50_70 = 0;
        $persen_70_100 = 0;
        foreach($daftarProyek as $item) {
            if($item->realisasi <= 30) {
                $persen_0_30 += 1;
            } elseif($item->realisasi <= 50) {
                $persen_30_50 += 1;
            } elseif($item->realisasi <= 70) {
                $persen_50_70 += 1;
            } elseif($item->realisasi <= 100) {
                $persen_70_100 += 1;
            }
        }

        $role = Session()->get('role');

        if ($role === 'Admin') {
            $route = 'admin.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                     => null,
                'user'                      => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity(date('Y').'-01'),
                'productivityFeb'           => $this->productivity(date('Y').'-02'),
                'productivityMar'           => $this->productivity(date('Y').'-03'),
                'productivityApr'           => $this->productivity(date('Y').'-04'),
                'productivityMei'           => $this->productivity(date('Y').'-05'),
                'productivityJun'           => $this->productivity(date('Y').'-06'),
                'productivityJul'           => $this->productivity(date('Y').'-07'),
                'productivityAug'           => $this->productivity(date('Y').'-08'),
                'productivitySep'           => $this->productivity(date('Y').'-09'),
                'productivityOct'           => $this->productivity(date('Y').'-10'),
                'productivityNov'           => $this->productivity(date('Y').'-11'),
                'productivityDes'           => $this->productivity(date('Y').'-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'subTitle'                  => 'Dashboard',
            ];
        } elseif ($role === 'Tim Proyek') {
            $route = 'timProyek.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity(date('Y').'-01'),
                'productivityFeb'           => $this->productivity(date('Y').'-02'),
                'productivityMar'           => $this->productivity(date('Y').'-03'),
                'productivityApr'           => $this->productivity(date('Y').'-04'),
                'productivityMei'           => $this->productivity(date('Y').'-05'),
                'productivityJun'           => $this->productivity(date('Y').'-06'),
                'productivityJul'           => $this->productivity(date('Y').'-07'),
                'productivityAug'           => $this->productivity(date('Y').'-08'),
                'productivitySep'           => $this->productivity(date('Y').'-09'),
                'productivityOct'           => $this->productivity(date('Y').'-10'),
                'productivityNov'           => $this->productivity(date('Y').'-11'),
                'productivityDes'           => $this->productivity(date('Y').'-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($role === 'Head Office') {
            $route = 'headOffice.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity(date('Y').'-01'),
                'productivityFeb'           => $this->productivity(date('Y').'-02'),
                'productivityMar'           => $this->productivity(date('Y').'-03'),
                'productivityApr'           => $this->productivity(date('Y').'-04'),
                'productivityMei'           => $this->productivity(date('Y').'-05'),
                'productivityJun'           => $this->productivity(date('Y').'-06'),
                'productivityJul'           => $this->productivity(date('Y').'-07'),
                'productivityAug'           => $this->productivity(date('Y').'-08'),
                'productivitySep'           => $this->productivity(date('Y').'-09'),
                'productivityOct'           => $this->productivity(date('Y').'-10'),
                'productivityNov'           => $this->productivity(date('Y').'-11'),
                'productivityDes'           => $this->productivity(date('Y').'-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'subTitle'              => 'Dashboard',
            ];
        };

        return view($route, $data);
    }

    public function progress($tipe) 
    {
        if($tipe === 'Technical Support') {
            $dataRencanaTechnicalSupport = $this->ModelRencana->checkData('Technical Supporting', date('Y'));
            $detailProgress = $this->ModelTechnicalSupporting->progress(date('Y'));

            $realisasiJan = $detailProgress['januari']->realisasi;
            $realisasiFeb = $realisasiJan + $detailProgress['februari']->realisasi;
            $realisasiMar = $realisasiFeb + $detailProgress['maret']->realisasi;
            $realisasiApr = $realisasiMar + $detailProgress['april']->realisasi;
            $realisasiMei = $realisasiApr + $detailProgress['mei']->realisasi;
            $realisasiJun = $realisasiMei + $detailProgress['juni']->realisasi;
            $realisasiJul = $realisasiJun + $detailProgress['juli']->realisasi;
            $realisasiAgu = $realisasiJul + $detailProgress['agustus']->realisasi;
            $realisasiSep = $realisasiAgu + $detailProgress['september']->realisasi;
            $realisasiOkt = $realisasiSep + $detailProgress['oktober']->realisasi;
            $realisasiNov = $realisasiOkt + $detailProgress['november']->realisasi;
            $realisasiDes = $realisasiNov + $detailProgress['desember']->realisasi;

            if(date('m') == '01') {
                $rencana = $dataRencanaTechnicalSupport->januari;
                $realisasi = $realisasiJan;
            } elseif(date('m') == '02') {
                $rencana = $dataRencanaTechnicalSupport->februari;
                $realisasi = $realisasiFeb;
            } elseif(date('m') == '03') {
                $rencana = $dataRencanaTechnicalSupport->maret;
                $realisasi = $realisasiMar;
            } elseif(date('m') == '04') {
                $rencana = $dataRencanaTechnicalSupport->april;
                $realisasi = $realisasiApr;
            } elseif(date('m') == '05') {
                $rencana = $dataRencanaTechnicalSupport->mei;
                $realisasi = $realisasiMei;
            } elseif(date('m') == '06') {
                $rencana = $dataRencanaTechnicalSupport->juni;
                $realisasi = $realisasiJun;
            } elseif(date('m') == '07') {
                $rencana = $dataRencanaTechnicalSupport->juli;
                $realisasi = $realisasiJul;
            } elseif(date('m') == '08') {
                $rencana = $dataRencanaTechnicalSupport->agustus;
                $realisasi = $realisasiAgu;
            } elseif(date('m') == '09') {
                $rencana = $dataRencanaTechnicalSupport->september;
                $realisasi = $realisasiSep;
            } elseif(date('m') == '10') {
                $rencana = $dataRencanaTechnicalSupport->oktober;
                $realisasi = $realisasiOkt;
            } elseif(date('m') == '11') {
                $rencana = $dataRencanaTechnicalSupport->november;
                $realisasi = $realisasiNov;
            } elseif(date('m') == '12') {
                $rencana = $dataRencanaTechnicalSupport->desember;
                $realisasi = $realisasiDes;
            }

            return $rencana != 0 ? round($realisasi / $rencana * 100, 1) : 0;
        } elseif($tipe === 'KI/KM') {
            $detailProgress = $this->ModelKiKm->progress(date('Y'));
            $rencanaKiKm = $this->ModelRencana->checkData('KI/KM', date('Y'));

            $realisasiJan = $detailProgress['januari']->realisasi;
            $realisasiFeb = $realisasiJan + $detailProgress['februari']->realisasi;
            $realisasiMar = $realisasiFeb + $detailProgress['maret']->realisasi;
            $realisasiApr = $realisasiMar + $detailProgress['april']->realisasi;
            $realisasiMei = $realisasiApr + $detailProgress['mei']->realisasi;
            $realisasiJun = $realisasiMei + $detailProgress['juni']->realisasi;
            $realisasiJul = $realisasiJun + $detailProgress['juli']->realisasi;
            $realisasiAgu = $realisasiJul + $detailProgress['agustus']->realisasi;
            $realisasiSep = $realisasiAgu + $detailProgress['september']->realisasi;
            $realisasiOkt = $realisasiSep + $detailProgress['oktober']->realisasi;
            $realisasiNov = $realisasiOkt + $detailProgress['november']->realisasi;
            $realisasiDes = $realisasiNov + $detailProgress['desember']->realisasi;

            if($rencanaKiKm) {
                $rencanaKiKm = $rencanaKiKm;
            } else {
                $rencanaKiKm = new stdClass();
                $rencanaKiKm->januari = 0;
                $rencanaKiKm->februari = 0;
                $rencanaKiKm->maret = 0;
                $rencanaKiKm->april = 0;
                $rencanaKiKm->mei = 0;
                $rencanaKiKm->juni = 0;
                $rencanaKiKm->juli = 0;
                $rencanaKiKm->agustus = 0;
                $rencanaKiKm->september = 0;
                $rencanaKiKm->oktober = 0;
                $rencanaKiKm->november = 0;
                $rencanaKiKm->desember = 0;
            }

            if(date('m') == '01') {
                $rencana = $rencanaKiKm->januari;
                $realisasi = $realisasiJan;
            } elseif(date('m') == '02') {
                $rencana = $rencanaKiKm->februari;
                $realisasi = $realisasiFeb;
            } elseif(date('m') == '03') {
                $rencana = $rencanaKiKm->maret;
                $realisasi = $realisasiMar;
            } elseif(date('m') == '04') {
                $rencana = $rencanaKiKm->april;
                $realisasi = $realisasiApr;
            } elseif(date('m') == '05') {
                $rencana = $rencanaKiKm->mei;
                $realisasi = $realisasiMei;
            } elseif(date('m') == '06') {
                $rencana = $rencanaKiKm->juni;
                $realisasi = $realisasiJun;
            } elseif(date('m') == '07') {
                $rencana = $rencanaKiKm->juli;
                $realisasi = $realisasiJul;
            } elseif(date('m') == '08') {
                $rencana = $rencanaKiKm->agustus;
                $realisasi = $realisasiAgu;
            } elseif(date('m') == '09') {
                $rencana = $rencanaKiKm->september;
                $realisasi = $realisasiSep;
            } elseif(date('m') == '10') {
                $rencana = $rencanaKiKm->oktober;
                $realisasi = $realisasiOkt;
            } elseif(date('m') == '11') {
                $rencana = $rencanaKiKm->november;
                $realisasi = $realisasiNov;
            } elseif(date('m') == '12') {
                $rencana = $rencanaKiKm->desember;
                $realisasi = $realisasiDes;
            }

            return $rencana == 0 ? 0 : round($realisasi / $rencana * 100, 1);
        }
    }

    public function productivity($bulan)
    {
        $daftarKategoriPekerjaan = $this->ModelKategoriPekerjaan->dataFungsi();
        $masterActivity          = $this->ModelMasterActivity->masterFungsi($bulan);
        $activity                = $this->ModelEngineeringActivity->dataProductivityTeam($bulan);

        $totalSubtotal = 0;
        $totalWork = 0;
        foreach($daftarKategoriPekerjaan as $item) {
            if ($item->fungsi !== null) {
                $subTotal = 0;   
                $totalWorkHours = 0;
                foreach($masterActivity as $row) {
                    if($row->fungsi === $item->fungsi) {
                        $totalWorkHours = $totalWorkHours + $row->work_hours;
                    }
                }
                foreach($activity as $row) {
                    if ($row->fungsi === $item->fungsi) {
                        $subTotal = $subTotal + $row->jumlah_durasi;
                    }
                }
                if ($totalWorkHours == 0){
                    $persen = 0;
                } else {
                    $persen = round(($subTotal / $totalWorkHours) * 100, 1);
                }

                $totalSubtotal = $totalSubtotal + $subTotal;
                $totalWork = $totalWork + $totalWorkHours;
            }
        }
        
        return  round($totalWork == 0? 0 : ($totalSubtotal / $totalWork) * 100);
    }

    public function prioritasProyek($prioritas)
    {
        $daftarProyek = $this->ModelProyek->prioritas($prioritas);
        $jumlahProyekByPrioritas = $this->ModelProyek->jumlah($prioritas);
        
        $prioritas = 0;
        foreach($daftarProyek as $item) {
            $prioritas += $item->realisasi;
        }

        return $jumlahProyekByPrioritas != 0 ? round($prioritas / $jumlahProyekByPrioritas, 2) : 0;
    }
}
