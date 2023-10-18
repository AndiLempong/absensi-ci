<?php

class M_model extends CI_Model{
    function get_data($table){
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function delete($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }

    public function delete_db($table, $field, $id)
    {
        $data=$this->db->delete_db($table, array($field => $id));
        return $data;
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

// m_model profil
public function get_foto_by_id($id)
{
    $this->db->select('image');
    $this->db->from('admin');
    $this->db->where('id', $id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->f;
    } else {
        return false;
    }
}

//m_model admin
    public function register($data) {
        $this->db->insert('admin', $data);
    }
    public function register_karyawan($data) {
        $this->db->insert('admin', $data);
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function ubah_data($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

// Absensi
    public function getlast($table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
// izin
    public function get($table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    
    // mengambil data date dari 
    public function getDataBulanan($date)
    {
        $start_date = date('Y-m-d');
        $query = $this->db->select('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
        ->from('absensi')
        ->where('date >=', $start_date)
        ->get();
    return $query->result_array();
    }

    public function getHarian($date)
    {
        $query = $this->db->select('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status')
        ->from('absensi')
        ->where('date', date('Y-m-d'))
        ->get();
    return $query->result_array();
    }

public function getAbsensiLast7Days() {
    $this->load->database();
    $end_date = date('Y-m-d');
    $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));        
    $query = $this->db->select('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
                      ->from('absensi')
                      ->where('date >=', $start_date)
                      ->where('date <=', $end_date)
                      ->group_by('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status')
                      ->get();
    return $query->result_array();
}

public function getbulanan($bulan)
  {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
  }




































    // public function get_by_nisn($nisn)
    // {
    //     $this->db->select('id_siswa');
    //     $this->db->from('siswa');
    //     $this->db->select('nisn', $nisn);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->row();
    //         return $result->id_siswa;
    //     } else {
    //         return false;
    //     }
    // }
}
