<?php
class transacao_model extends CI_Model{
	
	public function insert_tran($data){
		$this->db->insert('transacoes', $data);
	}

	public function create_card($data){
		$this->db->insert('cartoes', $data);
	}
}
?>