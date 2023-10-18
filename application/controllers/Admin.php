<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');;
		$this->load->library('upload');
        if ($this->session->userdata('logged_in')!= true && $this->session->userdata('role') != 'index') {
            redirect(base_url().'absensi/login');
        }
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
			$date=date('Y-m-d');
			$data['absensi_harian']=$this->m_model->getHarian($date);
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
			$data['absensi']=$this->m_model->getbulanan($bulan);
			$this->load->view('admin/rekap_bulanan',$data);
		}


		public function export_rekap_mingguan() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
            $data = $this->m_model->getAbsensiLast7Days();
            
            // Buat objek Spreadsheet
            $headers = ['NO','ID KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
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
                $tanggal = '';
                $jam_masuk = '';
                $jam_pulang = '';
                $keterangan_izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
                    } else if($cellName == 'id_karyawan') {
                        $nama_karyawan = tampil_id_karyawan($cellData);
                    } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_pulang') {
                        if($cellData == NULL) {
                            $jam_pulang = '-';
                        }else {
                            $jam_pulang = $cellData;
                        }
                    } elseif ($cellName == 'keterangan_izin') {
                        $keterangan_izin = $cellData;
                    }
            
                    // Anda juga dapat menambahkan logika lain jika perlu
                    
                    // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                    $columnIndex++;
                }
                // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
                // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
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
                'font'=> ['bold' => true],
            'alignment'=> [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
            ],
            ];
            $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
            // Konfigurasi output Excel
            $writer = new Xlsx($spreadsheet);
            $filename = ' REKAP_MINGGUAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
            // Set header HTTP untuk mengunduh file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            // Outputkan file Excel ke browser
            $writer->save('php://output');
        }


		public function export_bulan() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
            $bulan = date('m');; // Ambil nilai bulan yang dipilih dari form
            $data = $this->m_model->getbulanan($bulan);
            
            // Buat objek Spreadsheet
            $headers = ['NO','NAMA KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
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
                $nama_karyawan = '';
                $kegiatan = '';
                $tanggal = '';
                $jam_masuk = '';
                $jam_pulang = '';
                $keterangan_izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
                    } else if($cellName == 'id_karyawan') {
                        $nama_karyawan = tampil_id_karyawan($cellData);
                    } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_pulang') {
                        if($cellData == NULL) {
                            $jam_pulang = '-';
                        }else {
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
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
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
            $headerStyle =[
                'font'=> ['bold' => true],
                'alignment'=> [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
            ]];
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
        public function export_harian() {
            // $tanggal = date('Y-m-d');
            $tanggal = $this->input->post('tanggal');
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
        
            if (!empty($tanggal)) {
              $style_col = [
                'font' => ['bold' => true],
                'alignment' => [
                  'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
                  'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                  'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
                ]
              ];
        
              $style_row = [
                'alignment' => [
                  'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                  'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
                  'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
                ]
              ];
        
              $sheet->setCellValue('A1', "DATA ABSEN KARYAWAN");
              $sheet->mergeCells('A1:E1');
              $sheet->getStyle('A1')->getFont()->setBold(true);
        
              $sheet->setCellValue('A3', "ID");
              $sheet->setCellValue('B3', "USERNAME");
              $sheet->setCellValue('C3', "KEGIATAN");
              $sheet->setCellValue('D3', "TANGGAL MASUK");
              $sheet->setCellValue('E3', "JAM MASUK");
              $sheet->setCellValue('F3', "JAM PULANG");
              $sheet->setCellValue('G3', "KETERANGAN IZIN");
              $sheet->setCellValue('H3', "STATUS");
        
              $sheet->getStyle('A3')->applyFromArray($style_col);
              $sheet->getStyle('B3')->applyFromArray($style_col);
              $sheet->getStyle('C3')->applyFromArray($style_col);
              $sheet->getStyle('D3')->applyFromArray($style_col);
              $sheet->getStyle('E3')->applyFromArray($style_col);
              $sheet->getStyle('F3')->applyFromArray($style_col);
              $sheet->getStyle('G3')->applyFromArray($style_col);
              $sheet->getStyle('H3')->applyFromArray($style_col);
        
              $karyawan = $this->m_model->getHarian($tanggal);
        
              $no = 1;
              $numrow = 4;
              foreach ($karyawan as $data) {
                $sheet->setCellValue('A' . $numrow, $no);
                $sheet->setCellValue('B' . $numrow, $data->username);
                $sheet->setCellValue('C' . $numrow, $data->kegiatan);
                $sheet->setCellValue('D' . $numrow, $data->date);
                $sheet->setCellValue('E' . $numrow, $data->jam_masuk);
                $sheet->setCellValue('F' . $numrow, $data->jam_pulang);
                $sheet->setCellValue('G' . $numrow, $data->keterangan_izin);
                $sheet->setCellValue('H' . $numrow, $data->status);
        
                $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
                $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
        
                $no++;
                $numrow++;
              }
        
              $sheet->getColumnDimension('A')->setWidth(5);
              $sheet->getColumnDimension('B')->setWidth(25);
              $sheet->getColumnDimension('C')->setWidth(50);
              $sheet->getColumnDimension('D')->setWidth(20);
              $sheet->getColumnDimension('E')->setWidth(30);
              $sheet->getColumnDimension('F')->setWidth(30);
              $sheet->getColumnDimension('G')->setWidth(30);
              $sheet->getColumnDimension('H')->setWidth(30);
        
              $sheet->getDefaultRowDimension()->setRowHeight(-1);

              $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

      $sheet->setTitle("LAPORAN DATA ABSEN KARYAWAN");
      header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="absensi_perhari.xlsx"');
      header('Cache-Control: max-age=0');

      $writer = new Xlsx($spreadsheet);
      $writer->save('php://output');
    }

  }
}

?>




