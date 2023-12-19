<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Admin extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');;
        $this->load->library('upload');
    }

    public function sidebar_a()
    {
        $this->load->view('admin/sidebar_a');
    }

    // Dashboard Admin
    public function dashboard_a()
    {
        $data['rekap_semua'] = $this->m_model->get_data('absensi')->result();
        $this->load->view('admin/dashboard_a', $data);
    }

    // Rekap
    public function rekap_harian()
    {
        $date = date('Y-m-d');
        $data['absensi_harian'] = $this->m_model->getHarian($date);
        $this->load->view('admin/rekap_harian', $data);
    }

    public function rekap_mingguan()
    {
        $data['absensi'] = $this->m_model->getAbsensiLast7Days();
        $this->load->view('admin/rekap_mingguan', $data);
    }


    public function rekap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $data['absensi'] = $this->m_model->getbulanan($bulan);
        $this->load->view('admin/rekap_bulanan', $data);
    }


    // export mingguan
    public function export_minggu()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->getAbsensiLast7Days();

        // Buat objek Spreadsheet
        $headers = ['NO', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN IZIN'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;

            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $izin = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan_izin') {
                    $izin = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $izin);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'REKAP_MINGGUAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="MINGGUAN' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }


    /// bulan
    public function export_bulan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $bulan = date('m');; // Ambil nilai bulan yang dipilih dari form
        $data = $this->m_model->getbulanan($bulan);

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA KARYAWAN', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN IZIN'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $id_karyawan = '';
            $kegiatan = '';
            $date = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $keterangan_izin = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } else if ($cellName == 'nama_karyawan') {
                    $id_karyawan = tampil_id_karyawan($cellData);
                } elseif ($cellName == 'date') {
                    $date = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan_izin') {
                    $keterangan_izin = $cellData;
                }
                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $id_karyawan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $date);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(7, $rowIndex, $keterangan_izin);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = ' REKAP_BULANAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    // harian
    public function export_harian()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $tanggal = date('Y-m-d'); // Ambil nilai tanggal yang dipilih dari form
        $data = $this->m_model->getharian($tanggal);

        // Buat objek Spreadsheet
        $headers = ['NO', 'KEGIATAN', 'TANGGAL', 'JAM MASUK', 'JAM PULANG', 'KETERANGAN IZIN'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;

            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $izin = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                    $kegiatan = $cellData;
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if ($cellData == NULL) {
                        $jam_masuk = '-';
                    } else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if ($cellData == NULL) {
                        $jam_pulang = '-';
                    } else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan_izin') {
                    $izin = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $izin);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'REKAP_HARIAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="HARIAN' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
}
