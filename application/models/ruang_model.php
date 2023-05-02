<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_model extends CI_Model {

  public function get_Ruang()
  {
    $data_ruang= $this->db->get('ruang')->result();
    return $data_ruang; 
  }
  public function insert_ruang()
  {
    $data_ruang=array(
      'nama_ruang'=>$this->input->post('nama_ruang'),
      'kode_ruang'=>$this->input->post('kode_ruang'),
      'keterangan'=>$this->input->post('keterangan'),
    );
    $sql_masuk=$this->db->insert('ruang', $data_ruang);
    return $sql_masuk;
  }
  public function detail_ruang($id_ruang)
  {
  return $this->db->where('id_ruang', $id_ruang)->get('ruang')->row();
  } 
  public function update_ruang()
  {
    $db_up_ruang=array(
                    'nama_ruang'=>$this->input->post('nama_ruang'),
      'kode_ruang'=>$this->input->post('kode_ruang'),
      'keterangan'=>$this->input->post('keterangan'),
                );
                return $this->db->where('id_ruang', $this->input->post('id_ruang'))->update('ruang',$db_up_ruang);
  }
  public function delete_ruang($id_ruang)
  {
    $delete = $this->db->where('id_ruang',$id_ruang)->delete('ruang');
    return $delete;
  }
}
