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

class Dashboard extends Controller
{

    private $ModelUser, $ModelProyek, $ModelSoftware, $ModelRkp, $ModelDetailCsi, $ModelTechnicalSupporting, $ModelDetailLicense, $ModelCsi;

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

        $daftarDetailCsi = $this->ModelDetailCsi->data();
        $totalNilai = 0;
        foreach($daftarDetailCsi as $item) {
            $nilai = $item->nilai != 0 ? round($item->nilai * $item->bobot / 100, 2) : 0;
            $totalNilai = $totalNilai + $nilai;
        }
        $akumulasiCsi = number_format($totalNilai != 0 ? $totalNilai * 5 / 5 : 0, 2);
        $jumlahCsi = $this->ModelCsi->jumlah();

        $jumlahTechnicalSupport = $this->ModelTechnicalSupporting->jumlah('SENT');

        $role = Session()->get('role');

        if ($role === 'Admin') {
            $route = 'admin.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'            => $jumlahUser,
                'jumlahHeadOffice'      => $jumlahHeadOffice,
                'jumlahProyek'          => $jumlahProyek,
                'jumlahSoftware'        => $jumlahSoftware,
                'daftarRkp'             => $this->ModelRkp->dataIsRespon(1),
                'akumulasiCsi'          => $akumulasiCsi / $jumlahCsi,
                'chartLicense'          => $this->ModelDetailLicense->progress(),
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($role === 'Tim Proyek') {
            $route = 'timProyek.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($role === 'Head Office') {
            $route = 'headOffice.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'subTitle'              => 'Dashboard',
            ];
        };

        return view($route, $data);
    }
}
