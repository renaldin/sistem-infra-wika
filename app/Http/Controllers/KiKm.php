<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelKiKm;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use App\Models\ModelRencana;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use stdClass;

class KiKm extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelKiKm, $ModelDetailTimProyek, $ModelUser, $ModelRencana, $public_path, $public_path_hasil;

    public function __construct()
    {
        $this->ModelProyek                  = new ModelProyek();
        $this->ModelTimProyek               = new ModelTimProyek();
        $this->ModelKiKm                    = new ModelKiKm();
        $this->ModelDetailTimProyek         = new ModelDetailTimProyek();
        $this->ModelUser                    = new ModelUser();
        $this->ModelRencana                 = new ModelRencana();
        $this->public_path                  = 'file_ki_km';
        $this->public_path_hasil            = 'file_ki_km_hasil';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimProyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $idTimProyek = [];
        foreach($detailTimProyek as $item) {
            $idTimProyek[] = $item->id_tim_proyek;
        }

        $data = [
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Monitoring',
            'idTimProyek'               => $idTimProyek,
            'daftarKiKm'                => $this->ModelKiKm->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detailTimPRoyek = $this->ModelDetailTimProyek->dataWhere('detail_tim_proyek.id_user', Session()->get('id_user'));
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = $this->ModelProyek->dataWhere('proyek.id_tim_proyek', $item->id_tim_proyek);
        }

        $data = [
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Tambah KI/KM',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('kiKm.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'id_proyek'         => 'required',
            'status_ki_km'      => 'required',
            'kategori'          => 'required',
            'department'        => 'required',
            'judul'             => 'required',
            'upload_file'       => 'required'
        ], [
            'id_proyek.required'    => 'Nama proyek harus diisi!',
            'status_ki_km.required' => 'Tanggal submit harus diisi!',
            'kategori.required'     => 'Kategori harus diisi!',
            'department.required'   => 'Department harus diisi!',
            'judul.required'        => 'Judul harus diisi!',
            'upload_file.required'  => 'File harus diisi!'
        ]);

        $file = Request()->upload_file;
        $fileName = date('mdYHis') . ' ' . Request()->judul . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'status_ki_km'  => Request()->status_ki_km,
            'kategori'      => Request()->kategori,
            'department'    => Request()->department,
            'judul'         => Request()->judul,
            'tanggal_input' => date('Y-m-d'),
            'upload_file'   => $fileName
        ];

        $this->ModelKiKm->tambah($data);
        return redirect()->route('monitoring-ki-km')->with('success', 'Data berhasil ditambahkan!');
    }

    public function pengajuan()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Pengajuan',
            'daftarKiKm'                => $this->ModelKiKm->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.pengajuan', $data);
    }

    public function receive($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Form Pengajuan',
            'detail'            => $this->ModelKiKm->detail($id_ki_km),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.formRespon', $data);
    }

    public function edit($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Kolaborasi KI/KM',
            'subTitle'          => 'Form Update KI/KM',
            'detail'            => $this->ModelKiKm->detail($id_ki_km),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.formRespon', $data);
    }

    public function prosesEdit($id_ki_km)
    {

        $detail = $this->ModelKiKm->detail($id_ki_km);
        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if(Request()->proses_penulisan) {
            $prosesPenulisan = 1;
        } else {
            $prosesPenulisan = 0;
        }
        if(Request()->terupload_kmspace) {
            $teruploadKmspace = 1;
        } else {
            $teruploadKmspace = 0;
        }
        if(Request()->approval_atasan) {
            $approvalAtasan = 1;
        } else {
            $approvalAtasan = 0;
        }
        if(Request()->approval_pic_divisi) {
            $approvalPicDivisi = 1;
        } else {
            $approvalPicDivisi = 0;
        }
        if(Request()->approval_pic_pusat) {
            $approvalPicPusat = 1;
        } else {
            $approvalPicPusat = 0;
        }
        if(Request()->approval_published) {
            $approvalPublished = 1;
        } else {
            $approvalPublished = 0;
        }

        if ($detail->is_respon === 0) {
            $data = [
                'id_ki_km'                  => $id_ki_km,
                'tanggal_upload'        => now()->format('Y-m-d'),
                'proses_penulisan'          => $prosesPenulisan,
                'terupload_kmspace'         => $teruploadKmspace,
                'approval_atasan'           => $approvalAtasan,
                'approval_pic_divisi'       => $approvalPicDivisi,
                'approval_pic_pusat'        => $approvalPicPusat,
                'approval_published'        => $approvalPublished,
                'tanggal_published'         => Request()->tanggal_published,
                // 'note'                      => Request()->note,
                'id_user_respon'            => $user->id_user,
                'is_respon'                 => 1
            ];
        } else {
            $data = [
                'id_ki_km'                  => $id_ki_km,
                'tanggal_upload'        => now()->format('Y-m-d'),
                'proses_penulisan'          => $prosesPenulisan,
                'terupload_kmspace'         => $teruploadKmspace,
                'approval_atasan'           => $approvalAtasan,
                'approval_pic_divisi'       => $approvalPicDivisi,
                'approval_pic_pusat'        => $approvalPicPusat,
                'approval_published'        => $approvalPublished,
                'tanggal_published'         => Request()->tanggal_published,
                // 'note'                      => Request()->note,
                'id_user_respon'            => $user->id_user,
                'is_respon'                 => 1
            ];
        }

        if (Request()->upload_file_hasil <> "") {
            if ($detail->upload_file_hasil <> "") {
                unlink(public_path($this->public_path_hasil) . '/' . $detail->upload_file_hasil);
            }

            $file = Request()->upload_file_hasil;
            $fileName = date('mdYHis') . ' ' . $detail->judul . '.' . $file->extension();
            $file->move(public_path($this->public_path_hasil), $fileName);

            $data['upload_file_hasil'] = $fileName;
        }

        $this->ModelKiKm->edit($data);
        return redirect()->route('update-ki-km')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Kolaborasi KI/KM',
            'subTitle'                  => 'Update',
            'daftarKiKm'                => $this->ModelKiKm->dataIsRespon(1),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('kiKm.update', $data);
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!Request()->tahun) {
            $data = [
                'title'                     => 'Kolaborasi KI/KM',
                'subTitle'                  => 'Progress',
                'tahun'                     => false,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        } else {

            $rencana = $this->ModelRencana->checkData('KI/KM', Request()->tahun);
            if($rencana) {
                $rencana = $rencana;
            } else {
                $rencana = new stdClass();
                $rencana->januari = 0;
                $rencana->februari = 0;
                $rencana->maret = 0;
                $rencana->april = 0;
                $rencana->mei = 0;
                $rencana->juni = 0;
                $rencana->juli = 0;
                $rencana->agustus = 0;
                $rencana->september = 0;
                $rencana->oktober = 0;
                $rencana->november = 0;
                $rencana->desember = 0;
            }

            $data = [
                'title'                     => 'Kolaborasi KI/KM',
                'subTitle'                  => 'Progress',
                'tahun'                     => Request()->tahun,
                'detailProgress'            => $this->ModelKiKm->progress(Request()->tahun),
                'detailRencana'             => $rencana,
                'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
            ];
        }

        return view('kiKm.progress', $data);
    }

    public function exportExcel()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelKiKm->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Proyek');
        $sheet->setCellValue('C1', 'Judul');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Kategori');
        $sheet->setCellValue('F1', 'Nama Penulis');
        $sheet->setCellValue('G1', 'NIP');
        $sheet->setCellValue('H1', 'Department');
        $sheet->setCellValue('I1', 'Tanggal Upload');
        $sheet->setCellValue('J1', 'Proses Penulisan');
        $sheet->setCellValue('K1', 'Approval Atasan Langsung');
        $sheet->setCellValue('L1', 'Approval PIC KM Divisi/AP');
        $sheet->setCellValue('M1', 'Approval PIC KM Pusat');
        $sheet->setCellValue('N1', 'Approval Published');
        $sheet->setCellValue('O1', 'Tanggal Published');
        $sheet->setCellValue('P1', 'Note');

        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            if($item->is_respon === 1) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->nama_proyek);
                $sheet->setCellValue('C' . $row, $item->judul);
                $sheet->setCellValue('D' . $row, $item->status_ki_km);
                $sheet->setCellValue('E' . $row, $item->kategori);
                $sheet->setCellValue('F' . $row, $item->nama_user);
                $sheet->setCellValue('G' . $row, $item->nip);
                $sheet->setCellValue('H' . $row, $item->department);
                $sheet->setCellValue('I' . $row, $item->tanggal_upload ? $item->tanggal_upload : '-');
                $sheet->setCellValue('J' . $row, $item->proses_penulisan  == 0 ? 'X' : 'V' );
                $sheet->setCellValue('K' . $row, $item->approval_atasan  == 0 ? 'X' : 'V' );
                $sheet->setCellValue('L' . $row, $item->approval_pic_divisi  == 0 ? 'X' : 'V' );
                $sheet->setCellValue('M' . $row, $item->approval_pic_pusat  == 0 ? 'X' : 'V' );
                $sheet->setCellValue('N' . $row, $item->approval_published  == 0 ? 'X' : 'V' );
                $sheet->setCellValue('O' . $row, $item->tanggal_published ? $item->tanggal_published : '-');
                $sheet->setCellValue('P' . $row, $item->note ? $item->note : '-');
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar-ki-km.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function downloadFile($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelKiKm->detail($id_ki_km);

        $fileName = $data->upload_file;
        return response()->download(public_path($this->public_path) . '/' . $fileName);
    }
    
    public function downloadFileHasil($id_ki_km)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = $this->ModelKiKm->detail($id_ki_km);

        $fileName = $data->upload_file_hasil;
        return response()->download(public_path($this->public_path_hasil) . '/' . $fileName);
    }
}
