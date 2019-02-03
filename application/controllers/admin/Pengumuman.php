<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Pengumuman extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			$this->load->model('Pengumuman_model');	
			$this->load->model('User_model');
			//validasi login
			if(empty($_SESSION['id'])){
				$this->session->set_flashdata('status', 'error');
				$this->session->set_flashdata('text', 'Anda harus login');
				redirect(base_url().'admin/login');
			}
		}

		private function template(){
			return [
				'title' => 'Pengumuman',
				'icon' => 'fa fa-file',
				'menu' => 'pengumuman',
				'controller' => 'admin/pengumuman',
				'sub_menu' => '-'
			];
		}

		public function form(){
			$status = [
				['name' => 'aktiv' , 'value' => '1'],
				['name' => 'tidak aktiv' , 'value' => '0'],
			];
			return [
				['label' => 'Judul Pengumuman','name' => 'judul'],
				['label' => 'Isi Pengumuman','name' => 'isi_pengumuman', 'type' => 'textarea'],
	            ['label' => 'Status','name' => 'status', 'type' => 'select', 'option' => $status],
			];
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Pengumuman_model->getData()->result()
			);
			// print_r($this->Pengumuman_model->getData());
			$this->load->view('pengumuman/index',$data);
		}

		public function add(){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form()
			);			
			$this->load->view('pengumuman/add',$data);
		}

		public function save(){
			$data = $this->input->post();			
			$this->Pengumuman_model->insert($data);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->Pengumuman_model->getData($id)->row()
			);			
			// print_r($this->Pengumuman_model->getData($id)->row());
			$this->load->view('pengumuman/edit',$data);
		}

		public function update($id){
			$data = $this->input->post();			
			$this->Pengumuman_model->update($data,$id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

	}
 ?>