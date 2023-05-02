<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_model extends CI_Model {

	public function get_jenis()
		{
			return $this->db->get('jenis')->result();
		}	

	public function get_ruang()
	{
		return $this->db->get('ruang')->result();
	}

	public function get_petugas()
	{
		return $this->db->join('level', 'level.id_level = petugas.id_level')->get('petugas')->result();
	}

	public function get_pegawai()
	{
		return $this->db->get('pegawai')->result();
	}

	public function get_peminjam()
	{
		return $this->db->get('peminjam')->result();
	}

	public function get_laporan()
	{
		return $this->db
		->join('inventaris','inventaris.id_inventaris=detail_pinjam.id_inventaris')
		->join('peminjaman','peminjaman.id_peminjaman=detail_pinjam.id_peminjaman')
		->join('peminjam','peminjam.id_peminjam = peminjaman.id_peminjam')
		->order_by('id_detail_pinjam','asc')
		->get('detail_pinjam')->result()
		;
	}
}


/* End of file Jumlah_model.php */
/* Location: ./application/models/Jumlah_model.php */