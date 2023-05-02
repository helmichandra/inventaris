<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_model extends CI_Model {

  public function get_inventaris()
  {
    $data_inventaris= $this->db->join('petugas','petugas.id_petugas=inventaris.id_petugas')->join('jenis','jenis.id_jenis=inventaris.id_jenis')->join('ruang','ruang.id_ruang=inventaris.id_ruang')->get('inventaris')->result();
    return $data_inventaris;
  }
  public function masuk_db()
  {
    $data_inventaris=array(
    'nama'=>$this->input->post('nama'),
    'kondisi'=>$this->input->post('kondisi'),
    'keterangan'=>$this->input->post('keterangan'),
    'jumlah'=>$this->input->post('jumlah'),
    'id_jenis'=>$this->input->post('id_jenis'),
    'tanggal_register'=>$this->input->post('tanggal_register'),
    'id_ruang'=>$this->input->post('id_ruang'),
    'kode_inventaris'=>$this->input->post('kode_inventaris'),
    'id_petugas'=>$this->input->post('id_petugas'),
    );
    $sql_masuk = $this->db->insert('inventaris', $data_inventaris);
    return $sql_masuk;
    
  } 
  public function detail_inventaris($id_inventaris){
    return $this->db->where('id_inventaris', $id_inventaris)->get('inventaris')->row();
  }
  public function update_inventaris($value='')
  {
    $data_inventaris=array(
    'nama'=>$this->input->post('nama'),
    'kondisi'=>$this->input->post('kondisi'),
    'keterangan'=>$this->input->post('keterangan'),
    'jumlah'=>$this->input->post('jumlah'),
    'id_jenis'=>$this->input->post('id_jenis'),
    'tanggal_register'=>$this->input->post('tanggal_register'),
    'id_ruang'=>$this->input->post('id_ruang'),
    'kode_inventaris'=>$this->input->post('kode_inventaris'),
    'id_petugas'=>$this->input->post('id_petugas'),
    );
    return $this->db->where('id_inventaris',$this->input->post('id_inventaris'))->update('inventaris', $data_inventaris);
  
  }
  public function delete_inventaris($id_inventaris)
  {
    $delete = $this->db->where('id_inventaris',$id_inventaris)->delete('inventaris');
    return $delete;
  }
}
