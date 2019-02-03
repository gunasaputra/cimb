<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Home extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			
			$this->load->model('Pengumuman_model');
			//validasi login
			if(empty($_SESSION['id'])){
				$this->session->set_flashdata('status', 'error');
				$this->session->set_flashdata('text', 'Anda harus login');
				redirect(base_url().'admin/login');
			}
		}

		private function template(){
			return [
				'title' => 'Home',
				'icon' => 'fa fa-home',
				'menu' => 'home',
				'controller' => 'admin/home',
				'sub_menu' => '-'
			];
		}

		
		public function index(){
			$data = array(
				'template' => (object) $this->template(),	
				'list' => $this->Pengumuman_model->getData()->result()			
			);
			// print_r($this->Home_model->getData());
			$this->load->view('home/index',$data);
		}		
	}
 ?>