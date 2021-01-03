<?php
class fetch_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function fetch_data_clientes($emp_id) {
        $this->db->select("*");  
        $this->db->from("associacao");
        $this->db->join('cliente', 'associacao.ID = cliente.ID');
        $this->db->where("associacao.EMP_ID", $emp_id);
        $query = $this->db->get();  
        return $query->result();  
    }


    public function delete($id){
        $this->db->where('EMP_ID', $id) -> delete("associacao");
        $this->db->where('ID', $id) -> delete("campanhas");
        $this->db->where('ID', $id) ->delete("empresa");
        $this->db->where('ID', $id) ->delete("utilizador");
       // $this->db->delete("empresa");
        //$this->db->delete("utilizador");
    }

    public function getcurrentinfo($userid){
        $query = $this->db->where(['ID' => $userid])
                            ->get('utilizador');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function updatepassword($new_pass, $userid){
        $data = array(
                'PASSWORD' => $new_pass

        );
        $this->db->where('ID', $userid);
        $query = $this->db->update('utilizador', $data);
        return $query;
    }

    public function update_email($new_email, $userid){
        $data = array(
            'EMAIL' => $new_email
        );

        $this->db->where('ID', $userid) ->update('utilizador', $data);
        $this->db->where('ID', $userid) ->update('empresa', $data);
        
        
    
                
        //$sql = "UPDATE utilizador SET EMAIL = $new_email WHERE utilizador.ID = $userid; UPDATE empresa SET EMAIL = $new_email WHERE empresa.ID = $userid";
        //$this->db->where('NOME', $userid);
        //$this->db->join('empresa', 'utilizador.ID = empresa.ID');
        //$query = $this->db->query($sql);// $this->db->update('utilizador', $data);
        //return $query;
    }

    public function getemp($id) {
        $sql = "SELECT * FROM empresa WHERE empresa.ID = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getcli($id){
        $sql = "SELECT * from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where cliente.ID = $id AND associacao.ID = $id ";
        $query = $this->db->query($sql);
        return $query->row();
        //return $this->db->where('ID', $id)->get('cliente')->row();

    }
    public function getcli2($id) {
        $sql = "SELECT * FROM cliente WHERE cliente.ID = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function gettran($id, $idemp) {
        $sql = "SELECT * FROM transacoes WHERE transacoes.id=$id AND transacoes.ID_EMP = $idemp";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getCard($id){
       $this->db->select('*');
       $this->db->from('cartoes');
       $this->db->where('EMP_ID', $id);
       $query = $this->db->get();
       return $query;
    }

    public function delete_Card($id){

        $this->db->where('ID_CARTAO', $id);
        $this->db->delete('cartoes');
    }

    public function procurarCartao($id){
        return $this->db->where('ID_CARTAO', $id)->get('cartoes')->row();
    }

    public function editar(){ // edita os dados do contacto
           
            //date_default_timezone_set('Europe/Lisbon');
            // dados a atualizar
            //$data_hora = new DateTime();            
            $dados = array(
                'TITULO' => $this->input->post('titulo_update'),
                'CARIMBOS' => $this->input->post('carimbos_update'),
                'PRODUTO_ALVO' => $this->input->post('produtos_update'),
                'DATA_INICIO' => $this->input->post('inicio_update'),
                'DATA_FIM' => $this->input->post('fim_update'),
                'DESCONTO' => $this->input->post('desconto_update'),
                'DESIGNACAO' => $this->input->post('descricao_update')
            );

            $this->db->where('ID_CARTAO', $this->input->post('id_cartao'));
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