<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Permohonan extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			$this->load->model('Permohonan_model');	
			$this->load->model('User_model');
			$this->load->model('Payroll_model');
			$this->load->library('session');
			$this->load->helper('Global_helper');
			if(empty($_SESSION['id'])){
				$this->session->set_flashdata('status', 'error');
				$this->session->set_flashdata('text', 'Anda harus login');
				redirect(base_url().'admin/login');
			}
		}

		private function template(){
			return [
				'title' => 'Permohonan',
				'icon' => 'fa fa-file',
				'menu' => 'permohonan',
				'controller' => 'admin/permohonan',
				'sub_menu' => '-'
			];
		}

		public function form(){
			$status = [
				['name' => 'Dalam Proses' , 'value' => '1'],
				['name' => 'Diterima' , 'value' => '2'],
				['name' => 'Ditolak' , 'value' => '3'],
			];

			$payroll = $this->Payroll_model->getDataOption()->result_array();
			// print_r($payroll);
			// exit();

			$data = [
				['label' => 'Nama Nasabah','name' => 'nama_nasabah'],
				['label' => 'Tanggal Lahir','name' => 'dob', 'type' => 'datepicker'],
				['label' => 'Alamat Nasabah','name' => 'alamat_nasabah'],
				['label' => 'Handphone','name' => 'hp'],
				['label' => 'Agama','name' => 'agama'],
				['label' => 'Pendidikan Terakhir','name' => 'pendidikan'],
				['label' => 'Jabatan','name' => 'jabatan'],
				['label' => 'Departemen','name' => 'departemen'],
				['label' => 'Lama Bekerja','name' => 'lama_bekerja'],
				['label' => 'Jumlah Pengajuan','name' => 'pengajuan'],
				['label' => 'Tenor Pengajuan','name' => 'tenor'],
				['label' => 'Nomor Rekening','name' => 'no_rekening'],
	            ['label' => 'Payroll','name' => 'payroll_id', 'type' => 'select', 'option' => $payroll],
			];

			if($_SESSION['role'] == "Admin"){
				array_push($data,['label' => 'Status','name' => 'status_permohonan', 'type' => 'select','option' => $status ]);
			}

			return $data;
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Permohonan_model->getData()->result()
			);
			// print_r($this->Permohonan_model->getData());
			$this->load->view('permohonan/index',$data);
		}

		public function add(){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form()
			);	
			// echo $this->session->id;		
			$this->load->view('permohonan/add',$data);
		}

		public function save(){
			$data = $this->input->post();
			
			$data['user_id'] = $this->session->id;;			
			$this->Permohonan_model->insert($data);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->Permohonan_model->getData($id)->row()
			);			
			// print_r($this->Permohonan_model->getData($id)->row());
			$this->load->view('permohonan/edit',$data);
		}

		public function update($id){
			$data = $this->input->post();			
			$this->Permohonan_model->update($data,$id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function detail($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->Permohonan_model->getData($id)->row()
			);			
			// print_r($this->Permohonan_model->getData($id)->row());
			$this->load->view('permohonan/detail',$data);
		}

	}
 ?>