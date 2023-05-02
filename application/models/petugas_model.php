<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

  public function get_petugas()
  {
    $data_petugas= $this->db->join('level','level.id_level=petugas.id_level')->get('petugas')->result();
    return $data_petugas;
  }
  public function masuk_db()
  {
    $data_petugas=array(
    'username'=>$this->input->post('username'),
    'password'=>$this->input->post('password'),
    'nama_petugas'=>$this->input->post('nama_petugas'),
    'id_level'=>$this->input->post('id_level'),
    );
    $sql_masuk = $this->db->insert('petugas', $data_petugas);
    return $sql_masuk;
    
  } 
  public function detail_petugas($id_petugas){
    return $this->db->where('id_petugas', $id_petugas)->get('petugas')->row();
  }
  public function update_petugas($value='')
  {
        $dt_up_petugas=array(
        'username'=>$this->input->post('username'),
        'password'=>$this->input->post('password'),
        'nama_petugas'=>$this->input->post('nama_petugas'),
        'id_level'=>$this->input->post('id_level'),
    );
    return $this->db->where('id_petugas',$this->input->post('id_petugas'))->update('petugas', $dt_up_petugas);
  
  }
  public function delete_petugas($id_petugas)
  {
    $delete = $this->db->where('id_petugas',$id_petugas)->delete('petugas');
    return $delete;
  }
}

