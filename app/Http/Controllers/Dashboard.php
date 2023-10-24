<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;

class Dashboard extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {

        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $role = Session()->get('role');

        if ($role === 'Admin') {
            $route = 'admin.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
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
