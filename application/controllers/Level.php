<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function index()
	{
		$data['konten']="v_level";
		$this->load->model('level_model');
		$data['data_level']=$this->level_model->get_level();
		$this->load->view('template', $data, FALSE);
	}
	public function simpan_level()
	{
		$this->form_validation->set_rules('nama_level', 'Nama_Level', 'trim|required',
		array('required' => 'nama level harus diisi'));
		if ($this->form_validation->run() == TRUE ) {
			$this->load->model('level_model','lev');
			$masuk=$this->lev->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/level'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/level'), 'refresh');
		}
	}
	public function update_level(){
		$this->form_validation->set_rules('nama_level','Nama Level ', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/level'),'refresh');
		}else{
			$this->load->model('level_model');
			$proses_update=$this->level_model->update_level();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else{
				$this->session->$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/level'),'refresh');
		}
	}
	public function detail_level($id_level='')
	{
		$this->load->model('level_model');
		$data_detail=$this->level_model->detail_level($id_level);
		echo json_encode($data_detail);
	}
	public function deleteLevel($id_level)
	{
		$this->load->model('level_model');
		$prosesDelete = $this->level_model->delete_level($id_level);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/level'),'refresh');
	}

}
