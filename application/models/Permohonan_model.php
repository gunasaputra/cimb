<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private $table = 'permohonan';
	private $primary_key = 'permohonan.id';

	

	public function insert($data){
		$this->db->insert($this->table,$data); // insert data ke database
		return $this->db->insert_id(); // untuk mengambakilan nilai id yg di input
	}

	public function update($data,$id){
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table,$data);
	}

	public function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table);
	}

	public function getData($id = false){
		if($id != false){
			$this->db->where($this->primary_key,$id);
		}
		if($_SESSION['role'] == 'FA'){
			$this->db->where("permohonan.user_id",$_SESSION['id']);
		}
		$this->db->select("*, $this->primary_key as p_id");
		$this->db->join('payroll','payroll.id = permohonan.payroll_id');
		$this->db->join('user','user.id = permohonan.user_id');
		$this->db->order_by('permohonan.id','desc');
		return $this->db->get($this->table);
	}

	public function filterLaporan($id = false){
		if($id != false){
			$this->db->where($this->primary_key,$id);
		}				
		$this->db->join('payroll','payroll.id = permohonan.payroll_id');
		$this->db->join('user','user.id = permohonan.user_id');
	}

	public function getLaporan($dari_tgl,$sampai_tgl){
		$jumlah = $this->filterLaporan();
		$this->db->select("*, $this->primary_key as p_id");
		$jumlah = $this->db->where('DATE(permohonan.tanggal_permohonan) >=',$dari_tgl);
		$jumlah = $this->db->where('DATE(permohonan.tanggal_permohonan) <=',$sampai_tgl);
		$this->db->order_by('permohonan.id','desc');		
		return $jumlah = $this->db->get($this->table);
	}

	public function getLaporanQty($dari_tgl,$sampai_tgl){
		$this->filterLaporan();
		$this->db->select('nama_user,COUNT(permohonan.id) as jumlah_qty,SUM(permohonan.pengajuan) as jumlah_pengajuan');
		$this->db->group_by('permohonan.user_id');
		$this->db->where('DATE(permohonan.tanggal_permohonan) >=',$dari_tgl);
		$this->db->where('DATE(permohonan.tanggal_permohonan) <=',$sampai_tgl);
		return $this->db->get($this->table);
	}

	public function getLaporanDiterima($dari_tgl,$sampai_tgl){
		$this->filterLaporan();
		$this->db->select('nama_user,COUNT(permohonan.id) as jumlah_qty,SUM(permohonan.pengajuan) as jumlah_pengajuan');
		$this->db->group_by('permohonan.user_id');
		$this->db->where('DATE(permohonan.tanggal_permohonan) >=',$dari_tgl);
		$this->db->where('DATE(permohonan.tanggal_permohonan) <=',$sampai_tgl);
		$this->db->where('permohonan.status_permohonan',2);
		return $this->db->get($this->table);
	}


	
}

	

?>