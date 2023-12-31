<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'foto_user';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data User',
            'subTitle'          => 'Daftar User',
            'daftarUser'        => $this->ModelUser->dataUser(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('admin.user.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data User',
            'subTitle'  => 'Tambah User',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'form'      => 'Tambah',
        ];

        return view('admin.user.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required|unique:user,nip',
            'jabatan'       => 'required',
            'password'      => 'min:6|required',
            'role'          => 'required',
            'foto_user'     => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'nip.unique'            => 'niP sudah digunakan!',
            'jabatan.required'      => 'Jabatan harus diisi!',
            'password.required'     => 'Password harus diisi!',
            'password.min'          => 'Password minikal 6 karakter!',
            'role.required'         => 'Role harus diisi!',
            'foto_user.required'    => 'Foto Anda harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . ' ' . Request()->nama_user . '.' . $file1->extension();
        $file1->move(public_path($this->public_path), $fileUser);

        if (Request()->fungsi !== null && Request()->role === 'Head Office') {
            $fungsi = Request()->fungsi;
        } else {
            $fungsi = null;
        }

        $data = [
            'nama_user'     => Request()->nama_user,
            'telepon'       => Request()->telepon,
            'nip'           => Request()->nip,
            'jabatan'       => Request()->jabatan,
            'fungsi'        => $fungsi,
            'foto_user'     => $fileUser,
            'role'          => Request()->role,
            'password'      => Hash::make(Request()->password),
        ];

        $this->ModelUser->tambah($data);
        return redirect()->route('daftar-user')->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id_user)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data User',
            'subTitle'      => 'Edit User',
            'form'          => 'Edit',
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'        => $this->ModelUser->detail($id_user)
        ];

        return view('admin.user.form', $data);
    }

    public function prosesEdit($id_user)
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required',
            'jabatan'       => 'required',
            'role'          => 'required',
            'foto_user'     => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'jabatan.required'      => 'Jabatan harus diisi!',
            'role.required'         => 'Role harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        $detail = $this->ModelUser->detail($id_user);

        if (Request()->fungsi !== null && Request()->role === 'Head Office') {
            $fungsi = Request()->fungsi;
        } else if (Request()->fungsi === null && Request()->role === 'Head Office') {
            $fungsi = $detail->fungsi;
        } else {
            $fungsi = null;
        }

        if (Request()->password) {

            $user = $this->ModelUser->detail($id_user);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path($this->public_path) . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
                $file->move(public_path($this->public_path), $fileUser);

                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => Request()->jabatan,
                    'fungsi'        => $fungsi,
                    'foto_user'     => $fileUser,
                    'role'          => Request()->role,
                    'password'      => Hash::make(Request()->password),
                ];
                $this->ModelUser->edit($data);
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => Request()->jabatan,
                    'role'          => Request()->role,
                    'fungsi'        => $fungsi,
                    'password'      => Hash::make(Request()->password),
                ];
                $this->ModelUser->edit($data);
            }
        } else {
            $user = $this->ModelUser->detail($id_user);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path($this->public_path) . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
                $file->move(public_path($this->public_path), $fileUser);

                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => Request()->jabatan,
                    'foto_user'     => $fileUser,
                    'fungsi'        => $fungsi,
                    'role'          => Request()->role,
                ];
                $this->ModelUser->edit($data);
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'fungsi'        => $fungsi,
                    'jabatan'       => Request()->jabatan,
                    'role'          => Request()->role,
                ];
                $this->ModelUser->edit($data);
            }
        }

        return redirect()->route('daftar-user')->with('success', 'Data user berhasil diedit!');
    }

    public function prosesHapus($id_user)
    {
        $user = $this->ModelUser->detail($id_user);

        if ($user->foto_user <> "") {
            unlink(public_path($this->public_path) . '/' . $user->foto_user);
        }

        $this->ModelUser->hapus($id_user);
        return redirect()->route('daftar-user')->with('success', 'Data user berhasil dihapus !');
    }

    public function profil()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Edit Profil',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.index', $data);
    }

    public function prosesEditProfil($id_user)
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required',
            'foto_user'     => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {

            $user = $this->ModelUser->detail($id_user);

            if ($user->foto_user <> "") {
                unlink(public_path($this->public_path) . '/' . $user->foto_user);
            }

            $file = Request()->foto_user;
            $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileUser);

            $data = [
                'id_user'       => $id_user,
                'nama_user'     => Request()->nama_user,
                'telepon'       => Request()->telepon,
                'nip'           => Request()->nip,
                'foto_user'     => $fileUser
            ];
        } else {
            $data = [
                'id_user'       => $id_user,
                'nama_user'     => Request()->nama_user,
                'telepon'       => Request()->telepon,
                'nip'           => Request()->nip
            ];
        }


        $this->ModelUser->edit($data);
        return redirect()->route('profil')->with('success', 'Profil berhasil diedit !');
    }

    public function ubahPassword()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Ubah Password',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.ubahPassword', $data);
    }

    public function prosesUbahPassword($id_user)
    {
        Request()->validate([
            'password_lama'     => 'required|min:6',
            'password_baru'     => 'required|min:6',
        ], [
            'password_lama.required'    => 'Password Lama harus diisi!',
            'password_lama.min'         => 'Password Lama minikal 6 karakter!',
            'password_baru.required'    => 'Password Baru harus diisi!',
            'password_baru.min'         => 'Password Lama minikal 6 karakter!',
        ]);

        $user = $this->ModelUser->detail($id_user);

        if (Hash::check(Request()->password_lama, $user->password)) {
            $data = [
                'id_user'         => $id_user,
                'password'         => Hash::make(Request()->password_baru)
            ];

            $this->ModelUser->edit($data);
            return back()->with('success', 'Password berhasil diubah !');
        } else {
            return back()->with('fail', 'Password Lama tidak sesuai.');
        }
    }
}
