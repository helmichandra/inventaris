<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

  public function get_Pegawai()
  {
    $data_pegawai= $this->db->get('pegawai')->result();
    return $data_pegawai; 
  }
  public function insert_pegawai()
  {
    $data_pegawai=array(
      'nama_pegawai'=>$this->input->post('nama_pegawai'),
      'nip'=>$this->input->post('nip'),
      'alamat'=>$this->input->post('alamat'),
    );
    $sql_masuk=$this->db->insert('pegawai', $data_pegawai);
    return $sql_masuk;
  }
  public function detail_pegawai($id_pegawai)
  {
  return $this->db->where('id_pegawai', $id_pegawai)->get('pegawai')->row();
  } 
  public function update_pegawai()
  {
    $db_up_pegawai=array(
                    'nama_pegawai'=>$this->input->post('nama_pegawai'),
      'nip'=>$this->input->post('nip'),
      'alamat'=>$this->input->post('alamat'),
                );
                return $this->db->where('id_pegawai', $this->input->post('id_pegawai'))->update('pegawai',$db_up_pegawai);
  }
  public function delete_pegawai($id_pegawai)
  {
    $delete = $this->db->where('id_pegawai',$id_pegawai)->delete('pegawai');
    return $delete;
  }
}
