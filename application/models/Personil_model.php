<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personil_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private $table = 'personil';
	private $primary_key = 'personil.id';

	

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
		$this->db->join('klien','klien.id = personil.klien_id');
		return $this->db->get($this->table);
	}
}

	

?>