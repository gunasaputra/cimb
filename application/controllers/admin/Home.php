<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Home extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			
			$this->load->model('Pengumuman_model');
			$this->load->model('Permohonan_model');
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
			$dari_tgl = !empty($_GET['dari_tgl']) ? $_GET['dari_tgl'] : date('Y-m-01');
			$sampai_tgl = !empty($_GET['sampai_tgl']) ? $_GET['sampai_tgl'] : date('Y-m-t');
			$data = array(
				'template' => (object) $this->template(),	
				'list' => $this->Pengumuman_model->getDataActive()->result(),
				'permohonan' => $this->Permohonan_model->getLaporan($dari_tgl,$sampai_tgl)->result(),
				'rankQty' => $this->Permohonan_model->getLaporanQty($dari_tgl,$sampai_tgl)->result(),
				'rankDiterima' => $this->Permohonan_model->getLaporanDiterima($dari_tgl,$sampai_tgl)->result(),
				'dari_tgl' => $dari_tgl,
				'sampai_tgl' => $sampai_tgl			
			);
			// print_r($this->Home_model->getData());
			$this->load->view('home/index',$data);
		}		
	}
 ?>