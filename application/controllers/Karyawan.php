<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
            redirect(base_url() . 'absensi/login');
        }
    }
	
	public function dashboard()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$data['admin'] = $this->m_model->get_data('admin')->num_rows();
		$data['data'] = $this->m_model->get_data('absensi')->num_rows();
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

// ABSENSI
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

	public function pulang($id)
	{
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $data = [
        'jam_pulang' => $waktu_sekarang,
        'status' => 'done'
    ];
    $this->m_model->ubah_data('absensi', $data, array('id'=> $id));
    redirect(base_url('karyawan/history'));
	}
	// ABSENSI


	// PROFIL
	public function profil()
	{
		$data['admin'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
		$this->load->view('karyawan/profil', $data);
	}

    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = '../../foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        
        $this->load->library('upload', $config); // Load library 'upload' with config
        
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }
    public function aksi_update_profile()
    {
        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $foto = $this->upload_img('foto');
        // Jika ada foto yang diunggah
        if ($foto) {
            $kode = round(microtime(true) * 100);
            $file_name = $kode . '_' . $foto;
            $upload_path = './foto/' . $file_name;

            if (move_uploaded_file($foto_temp, $upload_path)) {
                // Hapus foto lama jika ada
                $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
                if ($old_file && file_exists(' ./foto/' . $old_file)) {
                    unlink(' ./foto/' . $old_file);
                }

                $data = [
                    'foto' => $file_name,
                    'username' => $username,
                    'nama_depan' => $nama_depan,
                    'nama_belakang' => $nama_belakang,
                ];
            } else {
                // Gagal mengunggah foto baru
                redirect(base_url('karyawan/profil'));
            }
        } else {
            // Jika tidak ada foto yang diunggah
            $data = [
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
        }

        // Eksekusi dengan model ubah_data
        $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

        if ($update_result) {
            $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Merubah Profile
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(base_url('karyawan/profil'));
        } else {
            redirect(base_url('karyawan/profil'));
        }
    
    }
    public function hapus_image()
    { 
        $data = array(
            'foto' => NULL
        );

        $eksekusi = $this->m_model->ubah_data('admin', $data, array('id'=>$this->session->userdata('id')));
        if($eksekusi) {
            
            $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menghapus Foto<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect(base_url('karyawan/profil'));
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-dismissible fade show" role="alert">Gagal Menghapus Foto<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect(base_url('karyawan/profil'));
        }
    }

    public function aksi_ubah_password()
        {
        
            $password_lama = $this->input->post('password_lama', true);

            $admin = $this->m_model->getWhere('admin', ['id' => $this->session->userdata('id')])->row_array();
    
            if (md5($password_lama) === $admin['password']) {
                $password_baru = $this->input->post('password_baru', true);
                $konfirmasi_password = $this->input->post('konfirmasi_password', true);
    
                // Pastikan password baru dan konfirmasi password sama
                if ($password_baru === $konfirmasi_password) {
                    // Update password baru ke dalam database
                    $data = ['password' => md5($password_baru)];
                    $this->m_model->ubah_data('admin', $data, ['id' => $this->session->userdata('id')]);
    
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Merubah Password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                            redirect(base_url('karyawan/profil'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Baru dan Konfirmasi Password Salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        redirect(base_url('karyawan/profil'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Anda Salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
                }            redirect(base_url('karyawan/profil'));
                redirect(base_url('karyawan/profil'));
            }
	// PROFIL


// history
	public function history()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/history', $data);
	}
// hapus history
	public function hapus_karyawan($id)
	{
    $this->m_model->delete('absensi', 'id', $id);
    redirect(base_url('karyawan/history'));
	}


}
?>