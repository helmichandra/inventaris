<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	


	public function index()
	{
        $data['konten']="v_pegawai";
        $this->load->model('pegawai_model');
        $data{'data_pegawai'}=$this->pegawai_model->get_pegawai();
        $this->load->view("template",$data);
	}
	public function simpan_pegawai()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai',
		'trim|required', array('required' => 'Nama Pegawai harus diisi'));
		$this->form_validation->set_rules('nip', 'Nip',
        'trim|required', array('required' => 'Nip harus diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat',
		'trim|required', array('required' => 'Alam aharus diisi'));
		
		if ($this->form_validation->run() == TRUE ) 
		{
			$this->load->model('pegawai_model','pew');
			$masuk=$this->pew->insert_pegawai();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/pegawai'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/pegawai'), 'refresh');
		}
	}

	public function detail_pegawai($id_pegawai='')
	{
		$this->load->model('pegawai_model');
		$data_detail=$this->pegawai_model->detail_pegawai($id_pegawai);
		echo json_encode($data_detail);
	}
    public function update_pegawai(){
        $this->form_validation->set_rules('nama_pegawai','Nama Pegawai', 'trim|required');
        $this->form_validation->set_rules('nip','Nip', 'trim|required');
		$this->form_validation->set_rules('alamat','Alamat', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/pegawai'),'refresh');
		}else{
			$this->load->model('pegawai_model');
			$proses_update=$this->pegawai_model->update_pegawai();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else{
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/pegawai'),'refresh');
		}
	}
    public function deletePegawai($id_pegawai)
	{
		$this->load->model('pegawai_model');
		$prosesDelete = $this->pegawai_model->delete_pegawai($id_pegawai);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/pegawai'),'refresh');
	}
}

