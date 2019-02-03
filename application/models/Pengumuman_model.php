<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private $table = 'pengumuman';
	private $primary_key = 'pengumuman.id';

	

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
		$this->db->select('*','$this->primary_key as p_id');
		$this->db->join("user","pengumuman.user_id = user.id");
		return $this->db->get($this->table);
	}

	
	public function getDataOption(){
		$this->db->select('id as value, judul as name');
		$this->db->where('status',1);
		return $this->db->get($this->table);
	}

	
}

	

?>