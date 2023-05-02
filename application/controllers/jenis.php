<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {


	public function index()
	{
        $data['konten']="v_jenis";
        $this->load->model('jenis_model');
        $data{'data_jenis'}=$this->jenis_model->get_jenis();
        $this->load->view("template",$data);
	}
	public function simpan_jenis()
	{
		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis',
		'trim|required', array('required' => 'nama jenis harus diisi'));
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis',
        'trim|required', array('required' => 'Kode Jenis harus diisi'));
        $this->form_validation->set_rules('keterangan', 'Keterangan',
		'trim|required', array('required' => 'Keterangan harus diisi'));
		
		if ($this->form_validation->run() == TRUE ) 
		{
			$this->load->model('jenis_model','jen');
			$masuk=$this->jen->insert_jenis();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/jenis'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/jenis'), 'refresh');
		}
	}

	public function detail_jenis($id_jenis='')
	{
		$this->load->model('jenis_model');
		$data_detail=$this->jenis_model->detail_jenis($id_jenis);
		echo json_encode($data_detail);
	}
    public function update_jenis(){
        $this->form_validation->set_rules('nama_jenis','Nama_Jenis', 'trim|required');
        $this->form_validation->set_rules('kode_jenis','Kode Jenis', 'trim|required');
		$this->form_validation->set_rules('keterangan','keterangan', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/jenis'),'refresh');
		}else{
			$this->load->model('jenis_model');
			$proses_update=$this->jenis_model->update_jenis();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else{
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/jenis'),'refresh');
		}
	}
    public function deleteJenis($id_jenis)
	{
		$this->load->model('jenis_model');
		$prosesDelete = $this->jenis_model->delete_jenis($id_jenis);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/jenis'),'refresh');
	}
}

