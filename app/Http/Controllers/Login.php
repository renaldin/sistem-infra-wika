<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;

class Login extends Controller
{

    private $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        if (Session()->get('nip')) {
            return redirect()->route('dashboard');
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function loginProcess()
    {

        Request()->validate([
            'nip'             => 'required|numeric',
            'password'        => 'min:6|required',
        ], [
            'nip.required'              => 'NIP harus diisi!',
            'nip.numeric'               => 'Format NIP harus angka!',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        $cekNip = $this->ModelAuth->cekNip(Request()->nip);

        if ($cekNip) {
            if (Hash::check(Request()->password, $cekNip->password)) {
                Session()->put('id_user', $cekNip->id_user);
                Session()->put('nip', $cekNip->nip);
                Session()->put('role', $cekNip->role);
                Session()->put('log', true);

                return redirect()->route('dashboard');
            } else {
                return back()->with('fail', 'Login gagal! Password tidak sesuai.');
            }
        } else {
            return back()->with('fail', 'Login gagal! NIP belum terdaftar.');
        }
    }

    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('nip');
        Session()->forget('role');
        Session()->forget('log');
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }

    // public function lupaPasswordMahasiswa()
    // {
    //     if (Session()->get('email')) {
    //         return redirect()->route('dashboard');
    //     }

    //     $data = [
    //         'title' => 'Lupa Password'
    //     ];

    //     return view('auth.lupaPasswordMahasiswa', $data);
    // }

    // public function lupaPassword()
    // {
    //     if (Session()->get('email')) {
    //         return redirect()->route('dashboard');
    //     }

    //     $data = [
    //         'title' => 'Lupa Password'
    //     ];

    //     return view('auth.lupaPassword', $data);
    // }

    // public function prosesLupaPassword()
    // {
    //     $email = Request()->email;

    //     if (Request()->status === "Mahasiswa") {
    //         $user = $this->ModelAuth->cekEmailMahasiswa($email);
    //         if (!$user) {
    //             return back()->with('fail', 'Email tidak terdaftar.');
    //         }
    //         $id_user = $user->id_mahasiswa;
    //         $urlReset = 'http://127.0.0.1:8000/reset-password-mahasiswa/' . $id_user;
    //         $route = 'login';
    //     } elseif (Request()->status === "Admin") {
    //         $user = $this->ModelAuth->cekEmail($email);
    //         if (!$user) {
    //             return back()->with('fail', 'Email tidak terdaftar.');
    //         }
    //         $id_user = $user->id_user;
    //         $urlReset = 'http://127.0.0.1:8000/reset-password/' . $id_user;
    //         $route = 'admin';
    //     }

    //     if ($user) {
    //         $data_email = [
    //             'subject'       => 'Lupa Password',
    //             'sender_name'   => 'renaldinoviandi1@gmail.com',
    //             'urlUtama'      => 'http://127.0.0.1:8000',
    //             'urlReset'      => $urlReset,
    //             'dataUser'      => $user,
    //         ];

    //         Mail::to($user->email)->send(new kirimEmail($data_email));
    //         return redirect()->route($route)->with('success', 'Kami sudah kirim pesan ke email Anda. Silahkan cek email Anda!');
    //     } else {
    //         return back()->with('fail', 'Email tidak terdaftar.');
    //     }
    // }

    // public function resetPasswordMahasiswa($id_mahasiswa)
    // {
    //     if (Session()->get('email')) {
    //         return redirect()->route('dashboard');
    //     }

    //     $data = [
    //         'title' => 'Reset Password',
    //         'user'  => $this->ModelMahasiswa->detail($id_mahasiswa),
    //     ];

    //     return view('auth.resetPassword', $data);
    // }

    // public function resetPassword($id_user)
    // {
    //     if (Session()->get('email')) {
    //         return redirect()->route('dashboard');
    //     }

    //     $data = [
    //         'title' => 'Reset Password',
    //         'user'  => $this->ModelUser->detail($id_user),
    //     ];

    //     return view('auth.resetPassword', $data);
    // }

    // public function prosesResetPassword($id_user)
    // {
    //     Request()->validate([
    //         'password' => 'min:6|required|confirmed',
    //     ], [
    //         'password.required'    => 'Password baru harus diisi!',
    //         'password.min'         => 'Password baru minimal 6 karakter!',
    //         'password.confirmed'   => 'Password baru tidak sama!',
    //     ]);

    //     $status = Request()->status;
    //     if ($status === 'Mahasiswa') {
    //         $data = [
    //             'id_mahasiswa'  => $id_user,
    //             'password'      => Hash::make(Request()->password)
    //         ];

    //         $route = 'login';

    //         $this->ModelMahasiswa->edit($data);
    //     } elseif ($status === 'Bagian Keuangan' || $status === 'Kabag Umum & Akademik' || $status === 'Akademik') {
    //         $data = [
    //             'id_user'      => $id_user,
    //             'password'      => Hash::make(Request()->password)
    //         ];

    //         $route = 'admin';

    //         $this->ModelUser->edit($data);
    //     }

    //     return redirect()->route($route)->with('success', 'Anda baru saja merubah password. Silahkan login!');
    // }
}
