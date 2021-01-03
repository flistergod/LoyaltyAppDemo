<?php

class emp_model extends CI_Model
{

     public function get_emp()
     {
          $query =$this->db->get("empresa");
          return $query->result();

     }

     public function get_cli(){


          $query =$this->db->get("cliente");
          return $query->result();



     }


    public function get_camp(){


     $query =$this->db->get("campanhas");
     return $query->result();


    }

    public function get_cartao() {

     $query =$this->db->get("cartoes");
     return $query->result();

    }



     public function eliminar_emp($id) {
          $this->db->where('ID',$id);
          $this->db->delete('campanhas');

          $this->db->where('EMP_ID',$id);
          $this->db->delete('associacao');

          $this->db->where('ID',$id);
          $this->db->delete('empresa');

          $this->db->where('ID',$id);
          $this->db->delete('utilizador');


     
     }


     public function eliminar_cli($id){

          $this->db->where('ID',$id);
          $this->db->delete('associacao');

          $this->db->where('ID',$id);
          $this->db->delete('cliente');

          $this->db->where('ID',$id);
          $this->db->delete('utilizador');


     }



     public function eliminar_fidel($id,$id_emp){

          $this->db->where('ID',$id);
          $this->db->where('EMP_ID',$id_emp);
          $this->db->delete('associacao');

     }



     public function eliminar_admin($id){


          $this->db->where('ID',$id);
          $this->db->delete('administrador');

          $this->db->where('ID',$id);
          $this->db->delete('Utilizador');

     }


     
     public function perfil_emp($id) {

          $this->db->where('ID',$id);
          $this->db->get('empresa');
     
     }




     public function GetEmpDisplayble($id){
                $this->db->select('*');
                $this->db->from('empresa');
                $this->db->where('ID',$id);
                $query=$this->db->get();
                return $query->result();


     }


     
     public function GetCLIDisplayble($id){

          $this->db->select('*');
          $this->db->from('cliente');
          $this->db->where('ID',$id);
          $query=$this->db->get();
          return $query->result();


     }

     public function GETCLIENTEBYID($id){

       $sql=" SELECT* FROM cliente WHERE cliente.ID IN (Select associacao.ID FROM associacao WHERE associacao.EMP_ID='$id');";
       $query= $this->db->query($sql);
       return $query->result();

     }


public function GETCAMPANHABYID($id){


    $sql="SELECT * FROM campanhas WHERE campanhas.ID='$id';"; 

     $query= $this->db->query($sql);
     return $query->result();

}


public function GETCARTAOBYID($id){


    $sql="SELECT * FROM cartoes WHERE cartoes.EMP_ID='$id';"; 

     $query= $this->db->query($sql);
     return $query->result();

}





public function GETFIDELBYID($id){
     $sql="  SELECT * FROM  empresa INNER JOIN associacao ON empresa.ID = associacao.EMP_ID  INNER JOIN cliente ON associacao.ID = cliente.ID WHERE associacao.ID=$id;";

     $query= $this->db->query($sql);
     return $query->result();


}


public function GETTRANSBYID($id){
     $sql=" SELECT * FROM transacoes  INNER JOIN  empresa ON transacoes.ID_EMP= empresa.ID WHERE transacoes.ID=$id;";

     $query= $this->db->query($sql);
     return $query->result();



}


public function registarAdmin($du, $da)
{

	$du['TIPOUTILIZADOR'] = 1;
        $da['TIPOUTILIZADOR'] = 1;
    	$this->db->insert('utilizador', $du);

        $da['ID']=$this->db->insert_id();
    	$this->db->insert('administrador', $da);



}






}



?>