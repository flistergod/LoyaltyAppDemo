<?php
class Campanha_model extends CI_Model{

	public function __construct(){
        parent::__construct();
    }
	
	public function create_camp($data){
		$this->db->insert('campanhas', $data);
	}

	public function getCamp($id) {
		//$sql = "SELECT * FROM `campanhas`inner join utilizador on campanhas.ID = utilizador.ID where utilizador.ID = 'id'";
        $this->db->select('*');
        $this->db->from('campanhas');
        $this->db->join('utilizador', 'campanhas.id = utilizador.id');
        $this->db->where('utilizador.id', $id);
		$query = $this->db->get();
		return $query;
	}

	public function delete_Camp($id){

		$this->db->where('ID_CAMPANHA', $id);
        $this->db->delete('campanhas');
	}

	public function procurarCampanha($id){
    	return $this->db->where('ID_CAMPANHA', $id)->get('campanhas')->row();
    }

    public function editar(){ // edita os dados do contacto
           
            //date_default_timezone_set('Europe/Lisbon');
            // dados a atualizar
            //$data_hora = new DateTime();            
            $dados = array(
                'DESCONTO' => $this->input->post('desconto_update'),
                'TITULO' => $this->input->post('titulo_update'),
                'PRODUTO_ALVO' => $this->input->post('produtos_update'),
				'DATA_INICIO' => $this->input->post('inicio_update'),
				'DATA_FIM' => $this->input->post('fim_update'),
				'LOCALIZACAO' => $this->input->post('localidade_update'),
				'IDADE' => $this->input->post('idade_update'),
				'ESTADOCIVIL' => $this->input->post('estado_civil_update'),
				'GENERO' => $this->input->post('genero_update'),
				'ANIMAIS' =>$this->input->post('animais_update'),
            );

            $this->db->where('ID_CAMPANHA', $this->input->post('id_campanha'));
            $this->db->update('campanhas', $dados);

            // igual a
            /* UPDATE contactos SET 
                    nome = $nome, 
                    telefone = $telefone, 
                    atualizado_em = NOW() 
                WHERE id_contacto = $id_contacto
            */
        }   
}