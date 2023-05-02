<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

  public function get_jenis()
  {
    $data_jenis= $this->db->get('jenis')->result();
    return $data_jenis; 
  }
  public function insert_jenis()
  {
    $data_jenis=array(
      'nama_jenis'=>$this->input->post('nama_jenis'),
      'kode_jenis'=>$this->input->post('kode_jenis'),
      'keterangan'=>$this->input->post('keterangan'),
    );
    $sql_masuk=$this->db->insert('jenis', $data_jenis);
    return $sql_masuk;
  }
  public function detail_jenis($id_jenis)
  {
  return $this->db->where('id_jenis', $id_jenis)->get('jenis')->row();
  } 
  public function update_jenis()
  {
    $db_up_jenis=array(
                    'nama_jenis'=>$this->input->post('nama_jenis'),
      'kode_jenis'=>$this->input->post('kode_jenis'),
      'keterangan'=>$this->input->post('keterangan'),
                );
                return $this->db->where('id_jenis', $this->input->post('id_jenis'))->update('jenis',$db_up_jenis);
  }
  public function delete_jenis($id_jenis)
  {
    $delete = $this->db->where('id_jenis',$id_jenis)->delete('jenis');
    return $delete;
  }
}
