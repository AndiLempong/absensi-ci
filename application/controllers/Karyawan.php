<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	public function dashboard()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/dashboard', $data);
	}

	public function izin()
	{
		$data['izin'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/izin', $data);
	}

	public function absensi()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/absensi', $data);
	}

	public function aksi_absensi()
	{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id_karyawan = $this->session->userdata('id');
    $tanggal_absensi = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $absensi_terakhir = $this->m_model->getlast('absensi', array(
        'id_karyawan' => $id_karyawan
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($absensi_terakhir && $absensi_terakhir->date !== $tanggal_absensi) {
        $absensi_terakhir = null; // Atur $absensi_terakhir menjadi null jika tanggal berbeda
    }

    if ($absensi_terakhir && $absensi_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('karyawan/absensi'));
    	} else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id_karyawan' => $id_karyawan,
            'kegiatan' => $this->input->post('kegiatan'),
            'jam_pulang' => null,
            'jam_masuk' => $waktu_sekarang, 
            'date' => $tanggal_absensi,  
            'keterangan_izin' => '-',
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('karyawan/history'));
    	}
	}

	public function aksi_izin()
	{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id_karyawan = $this->session->userdata('id');
    $tanggal_izin = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $izin_terakhir = $this->m_model->get('absensi', array(
        'id_karyawan' => $id_karyawan
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($izin_terakhir && $izin_terakhir->date !== $tanggal_izin) {
        $izin_terakhir = null; // Atur $izin_terakhir menjadi null jika tanggal berbeda
    }

    if ($izin_terakhir && $izin_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('karyawan/history'));
    	} else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id_karyawan' => $id_karyawan,
            'kegiatan' => '-',
            'jam_pulang' => null,
            'jam_masuk' => null, 
            'date' => $tanggal_izin,  
            'keterangan_izin' => $this->input->post('izin'),
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('karyawan/history'));
    	}
	}

	public function profil()
	{
		$this->load->view('karyawan/profil');
	}

	   public function upload_image()
   	{  
	   $base64_image = $this->input->post('base64_image');
	   $binary_image = base64_encode($base64_image);
	   $data = array(
		   'images' => $binary_image
	   );
	   $eksekusi = $this->m_model->ubah_data('karyawan', $data, array('id'=>$this->session->userdata('id')));
	   if($eksekusi) {
		   $this->session->set_flashdata('sukses' , 'berhasil');
		   redirect(base_url('karyawan/profil'));
	   } else {
		   $this->session->set_flashdata('error' , 'gagal...');
		  echo "Tidak Berhasil Mengganti";
	   }
   	}

	public function history()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/history', $data);
	}

	public function hapus_history($id)
	{
	   $this->m_model->delete('absensi', 'id', $id);
	   redirect(base_url('karyawan/history'));
	}

	public function pulang($id)
{
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $data = [
        'jam_keluar' => $waktu_sekarang,
        'status' => 'done'
    ];
    $this->m_model->ubah_data('absensi', $data, array('id'=> $id));
    redirect(base_url('karyawan/history'));
}

	// public function hapus_dashboard($id)
	// {
	// 	$this->m_model->delete_db('dashboard', 'id', $id);
	// 	redirect(base_url('karyawan/dashboard'));
	// }
}
?>