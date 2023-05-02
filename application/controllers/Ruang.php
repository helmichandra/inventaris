<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {



	public function index()
	{
        $data['konten']="v_ruang";
        $this->load->model('ruang_model');
        $data{'data_ruang'}=$this->ruang_model->get_ruang();
        $this->load->view("template",$data);
	}
	public function simpan_ruang()
	{
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang',
		'trim|required', array('required' => 'nama ruang harus diisi'));
		$this->form_validation->set_rules('kode_ruang', 'Kode Ruang',
        'trim|required', array('required' => 'Kode Ruang harus diisi'));
        $this->form_validation->set_rules('keterangan', 'Keterangan',
		'trim|required', array('required' => 'Keterangan harus diisi'));
		
		if ($this->form_validation->run() == TRUE ) 
		{
			$this->load->model('ruang_model','rua');
			$masuk=$this->rua->insert_ruang();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/ruang'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/ruang'), 'refresh');
		}
	}

	public function detail_ruang($id_ruang='')
	{
		$this->load->model('ruang_model');
		$data_detail=$this->ruang_model->detail_ruang($id_ruang);
		echo json_encode($data_detail);
	}
    public function update_ruang(){
        $this->form_validation->set_rules('nama_ruang','Nama Ruang', 'trim|required');
        $this->form_validation->set_rules('kode_ruang','Kode Ruang', 'trim|required');
		$this->form_validation->set_rules('keterangan','keterangan', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/ruang'),'refresh');
		}else{
			$this->load->model('ruang_model');
			$proses_update=$this->ruang_model->update_ruang();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else{
				$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/ruang'),'refresh');
		}
	}
    public function deleteRuang($id_ruang)
	{
		$this->load->model('ruang_model');
		$prosesDelete = $this->ruang_model->delete_ruang($id_ruang);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/ruang'),'refresh');
	}
}

