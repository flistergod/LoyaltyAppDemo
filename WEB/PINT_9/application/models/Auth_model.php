<?php
class Auth_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function registarEmpresa($data, $data2){
      /*coloco na tabela utilizador a informação que vem do $data colocando a coluna TIPOUTILIZADOR =2*/
    	$data['TIPOUTILIZADOR'] = 2;
        $data2['TIPOUTILIZADOR'] = 2;
    	$this->db->insert('utilizador', $data);
      /*o ID que se coloca na tabela utilizador após a inserção do registo é igual ao ID que se coloca na tabela empresa devido à linha de código abaixo*/
        $data2['ID']=$this->db->insert_id();
    	$this->db->insert('empresa', $data2);
   
    }

    public function checkifexists($email, $telefone, $nif){
      /*verifica-se a existência do Email, Telefone ou NIF na Base de Dados*/
       $sql = "SELECT * from empresa where empresa.EMAIL = '$email' OR (empresa.TELEFONE = '$telefone' OR empresa.NIF = '$nif');";
       $query = $this->db->query($sql);

        if ($query->num_rows()>0) {
            return false;
        } else {
            return true;
        }
    }

    public function emailexists($email){
      /*verifica-se se existe o Email na base de Dados*/
        $query = $this->db->query("SELECT * from utilizador where utilizador.EMAIL = '$email'");
        return $query->result();

    }

    public function updatepass($pass, $email){
        $this->db->set('PASSWORD', $pass);
        $this->db->where('EMAIL', $email);
        $this->db->update('utilizador');
        //$query = $this->db->query("UPDATE utilizador set utilizador.PASSWORD= '$data' where utilizador.EMAIL ='$email'");
        //return $query;
    }

    public function getNomeEmp($id)
    {
        $sql = "SELECT NOMEEMPRESA FROM empresa WHERE empresa.ID = $id";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function login($username, $password) {
    	$this->db->select('*');
        $this->db->from('utilizador');
        $this->db->where('EMAIL', $username);
        $this->db->where('PASSWORD', $password);
        $query = $this->db->get();
        return $query;

	}
    /* app */

    public function login_app($email_login, $password){

        $sql = "SELECT * FROM utilizador WHERE EMAIL = '$email_login' AND PASSWORD = '$password'";
        $query = $this->db->query($sql);
        return $query;
    }

  

    public function register_app($nome, $telefone, $datanasc, $password, $email, $morada, $estadocivil, $genero, $animais, $cc, $nif, $foto, $upload_path){

        $mysql_qry="SELECT * FROM utilizador WHERE EMAIL = '$email'";
        $confirm_email = $this->db->query($mysql_qry);
        
       $mysql_qry="SELECT * FROM cliente WHERE TELEFONE = '$telefone'";
        $confirm_tlf = $this->db->query( $mysql_qry);
        
        $mysql_qry="SELECT * FROM cliente WHERE CARTAOCIDADAO = '$cc'";
        $confirm_cc = $this->db->query( $mysql_qry);
        
        $mysql_qry="SELECT * FROM cliente WHERE NIF = '$nif'";
        $confirm_nif = $this->db->query( $mysql_qry);

        if ($confirm_email->num_rows() > 0) {
       

            $array= array("REGISTER"=>"FAILED", "MSG"=>"Email utilizado por uma conta já existente");
            return $array;
        
           
        
        
        }else if ($confirm_tlf->num_rows() > 0) {
        
            $array= array("REGISTER"=>"FAILED", "MSG"=>"Telefone utilizado por uma conta já existente");
            return $array;
        
            
        
        }else if ($confirm_cc->num_rows() > 0) {
        
            $array= array("REGISTER"=>"FAILED", "MSG"=>"Cartão de cidadão utilizado por uma conta já existente");
            return $array;
        
            
        
        }elseif ($confirm_tlf->num_rows() > 0) {
        
            $array= array("REGISTER"=>"FAILED", "MSG"=>"NIF utilizado por uma conta já existente");
            return $array;
        
            
        
        }else  {

            $this->db->query("INSERT INTO utilizador (NOME,TELEFONE,DATANASC,PASSWORD,EMAIL,MORADA,TIPOUTILIZADOR,FOTO_PERFIL) VALUES ('$nome','$telefone','$datanasc','md5($password)','$email','$morada','3','$upload_path')");
            
    

        $id_pai = $this->db->insert_id();
          
        $this->db->query("INSERT INTO cliente (ID,NOME,TELEFONE,DATANASC,EMAIL,MORADA,FOTO_PERFIL,ESTADOCIVIL,GENERO,ANIMAIS,CARTAOCIDADAO,NIF) VALUES ('$id_pai','$nome','$telefone','$datanasc','$email','$morada','$upload_path','$estadocivil','$genero','$animais','$cc','$nif')");
        $image = base64_decode($foto);

        file_put_contents($upload_path, $image);

         $array= array("REGISTER"=>"OK", "MSG"=>"Registo feito!");
         return $array;

    }
    }
    public function forgot_email_app($email, $telefone){

        $sql = "SELECT * FROM utilizador WHERE EMAIL = '$email' AND TELEFONE = '$telefone'";
        $query = $this->db->query($sql);
        return $query;
        
 
    }

    public function update_pass_app($email, $novaPass){


$sql="UPDATE utilizador SET PASSWORD = '$novaPass' WHERE EMAIL = '$email';";

$query = $this->db->query($sql);
return $query;
       

    }

    
    public function mostraEmpresasRecentes_app($email_login){

        $sql="SELECT * FROM empresa 
        WHERE empresa.ID NOT IN (
        SELECT associacao.EMP_ID FROM associacao WHERE associacao.ID=(
        SELECT ID FROM cliente WHERE cliente.EMAIL = '$email_login'))
        ORDER BY empresa.DATA_REGISTO DESC
        LIMIT 5;";

        $query = $this->db->query($sql);
        return $query;        


    }

    public function mostraCampanhasRecentes_app($email_login){

        $sql="SELECT  *
        FROM campanhas INNER JOIN empresa
        ON (campanhas.ID=empresa.id)
        WHERE campanhas.ID IN (SELECT associacao.EMP_ID FROM associacao
                              WHERE associacao.ID= (SELECT cliente.ID FROM cliente
                                                   WHERE cliente.EMAIL = '$email_login'))
        ORDER BY campanhas.DATA_INICIO DESC
        LIMIT 5;";

        $query = $this->db->query($sql);
        return $query;        


    }


    public function mostraEmpresasF_app($email_login){

        $sql="SELECT * FROM empresa 
        WHERE empresa.ID  IN (
        SELECT associacao.EMP_ID FROM associacao WHERE associacao.ID=(
        SELECT ID FROM cliente WHERE cliente.EMAIL = '$email_login'));";

        $query = $this->db->query($sql);
        return $query;       


    }

    public function mostraEmpresasNF_app($email_login){

        $sql="SELECT * FROM empresa
        WHERE empresa.ID NOT IN (SELECT associacao.EMP_ID FROM associacao
                                WHERE associacao.ID=(SELECT ID FROM cliente
                                                    WHERE EMAIL = '$email_login'));";

        $query = $this->db->query($sql);
        return $query;        


    }

    public function emailExiste_app($email_novo){

        $sql="SELECT EMAIL FROM cliente WHERE cliente.EMAIL='$email_novo';";

 $query = $this->db->query($sql);
        return $query;     

    }

    public function updateEmail_app($email_atual, $email_novo){
       
       $sql="UPDATE cliente SET cliente.EMAIL ='$email_novo'WHERE cliente.EMAIL = '$email_atual';";
      $sql2="UPDATE utilizador SET utilizador.EMAIL ='$email_novo' WHERE utilizador.EMAIL = '$email_atual';";

        $query = $this->db->query($sql);
        $query = $this->db->query($sql2);
        return $query;   

    }


 

    public function updatePass_app($pass_atual, $pass_nova,$email){
       
      $sql="UPDATE utilizador SET utilizador.PASSWORD ='$pass_nova' WHERE utilizador.PASSWORD = '$pass_atual' AND utilizador.EMAIL = '$email';";

      $query = $this->db->query($sql);
      return $query;   
    }


    public function emailExisteApagar_app($email, $pass){
       
        $sql="SELECT * FROM utilizador
        WHERE utilizador.EMAIL='$email' AND utilizador.PASSWORD='$pass';";
        $query = $this->db->query($sql);
        return $query;   
      }


      public function apagarConta_app($email){

       $sql3="DELETE from associacao where associacao.ID = (SELECT cliente.ID FROM cliente WHERE cliente.EMAIL='$email');";
       $sql="DELETE FROM cliente WHERE cliente.EMAIL='$email';";
       $sql2="DELETE FROM utilizador WHERE utilizador.EMAIL='$email';";

       $query = $this->db->query($sql3);
    $query = $this->db->query($sql);
    $query = $this->db->query($sql2);
  return $query;   
      }

      public function getPerfil_app($email){

        $sql="SELECT * FROM cliente
        WHERE cliente.EMAIL='$email';";

        $query = $this->db->query($sql);
        return $query;
        
      }

      
      public function mostraCampanhas_app($email_login){

        $sql="SELECT campanhas.TITULO, campanhas.ID_CAMPANHA FROM `campanhas` WHERE campanhas.ID= (SELECT empresa.ID from empresa where empresa.EMAIL='$email_login' );";

        $query = $this->db->query($sql);
        return $query;
       
      }

      


public function campanha_especifica_app($id){

    $sql="SELECT campanhas.DATA_INICIO, campanhas.DATA_FIM, campanhas.DESCONTO, campanhas.TITULO, empresa.NOMEEMPRESA, campanhas.PRODUTO_ALVO, campanhas.LOCALIZACAO, campanhas.GENERO, campanhas.ESTADOCIVIL, campanhas.IDADE, campanhas.ANIMAIS, campanhas.CODIGO  FROM campanhas INNER JOIN empresa
    ON (campanhas.ID=empresa.ID)
    WHERE campanhas.ID_CAMPANHA='$id';";

    $query = $this->db->query($sql);
    return $query;
   
  }

  public function getIDcampanha_app($titulo, $nome_empresa){

    $sql="SELECT campanhas.ID_CAMPANHA FROM campanhas
    WHERE campanhas.TITULO='$titulo' AND campanhas.ID =(SELECT empresa.ID FROM empresa WHERE empresa.NOMEEMPRESA='$nome_empresa');";
    $query = $this->db->query($sql);
    return $query;

  }


  public function getTelefoneEmpresa_app($email){

    $sql="SELECT TELEFONE FROM empresa
    WHERE empresa.EMAIL='$email';";
    $query = $this->db->query($sql);
    return $query;
    
  }

  public function getMoradaEmpresa_app($email){

    $sql="SELECT MORADA FROM empresa
    WHERE empresa.EMAIL='$email';";
    $query = $this->db->query($sql);
    return $query;

  }

  public function desfidelizar_app($email_empresa, $email_cliente){

    $sql="DELETE FROM associacao
    WHERE associacao.EMP_ID =(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa') AND associacao.ID=(SELECT cliente.ID FROM cliente WHERE cliente.EMAIL='$email_cliente');";
    $query = $this->db->query($sql);
    return $query;

  }

  

  public function perfil_empresa_app($email){

    $sql="SELECT * FROM empresa WHERE empresa.EMAIL='$email';";
    $query = $this->db->query($sql);
    return $query;

  }

  public function fideliza_app($email_empresa, $email_cliente){


    $sql_empresa="SELECT empresa.ID 
    FROM empresa 
    WHERE empresa.EMAIL='$email_empresa';";

$query_empresa = $this->db->query($sql_empresa);

$result=$query_empresa->row();
    $id_empresa=$result->ID;


    $sql_cliente="SELECT cliente.ID 
    FROM cliente 
    WHERE cliente.EMAIL='$email_cliente';";

$query_cliente = $this->db->query($sql_cliente);

$result=$query_cliente->row();
    $id_cliente=$result->ID;



    $sql="INSERT INTO associacao (EMP_ID, ID, Data_registo) VALUES ('$id_empresa', '$id_cliente', CURRENT_TIMESTAMP);";
    $query = $this->db->query($sql);
    return $query;

  }

  public function getTransacoes_app($email_empresa, $email_cliente){

    $sql_empresa="SELECT empresa.ID 
    FROM empresa 
    WHERE empresa.EMAIL='$email_empresa';";

$query_empresa = $this->db->query($sql_empresa);

$result=$query_empresa->row();
    $id_empresa=$result->ID;


    $sql_cliente="SELECT cliente.ID 
    FROM cliente 
    WHERE cliente.EMAIL='$email_cliente';";

$query_cliente = $this->db->query($sql_cliente);

$result=$query_cliente->row();
    $id_cliente=$result->ID;



    $sql="SELECT * FROM transacoes WHERE transacoes.ID=$id_cliente AND transacoes.ID_EMP='$id_empresa';";
    $query = $this->db->query($sql);
    return $query;
  }



  public function transacao_app($id_transacao){

    $sql="SELECT * FROM transacoes WHERE transacoes.ID_TRANSACAO='$id_transacao';";
    $query = $this->db->query($sql);
    return $query;

  }


  public function getNomeEmpresa_app($email_empresa){

    $sql="SELECT * FROM empresa WHERE empresa.EMAIL='$email_empresa';";
    $query = $this->db->query($sql);
    return $query;


  }


  public function getcartao_app($email_empresa){

    
    $sql="SELECT * FROM cartoes
    WHERE cartoes.EMP_ID=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa');";
    $query = $this->db->query($sql);
    return $query;

  }

  public function getcartao_associacao_app($email_empresa, $email_cliente){
    $sql_cartao="SELECT cartoes.ID_CARTAO FROM cartoes WHERE cartoes.EMP_ID=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa');";

    $query_cartao= $this->db->query($sql_cartao);
    
    $result=$query_cartao->row();
        $id_cartao=$result->ID_CARTAO;
    
    
        $sql_cliente="SELECT cliente.ID 
        FROM cliente 
        WHERE cliente.EMAIL='$email_cliente';";
    
    $query_cliente = $this->db->query($sql_cliente);
    
    $result=$query_cliente->row();
        $id_cliente=$result->ID;


        $sql="SELECT * FROM associacao_cartoes WHERE associacao_cartoes.ID_CARTAO='$id_cartao' AND associacao_cartoes.ID='$id_cliente';";
        $query= $this->db->query($sql);
        return $query;



  }

  public function cria_associacao_cartao_app($email_empresa, $email_cliente, $codigo){

    $sql_cartao="SELECT cartoes.ID_CARTAO FROM cartoes WHERE cartoes.EMP_ID=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa');";

$query_cartao= $this->db->query($sql_cartao);

$result=$query_cartao->row();
    $id_cartao=$result->ID_CARTAO;


    $sql_cliente="SELECT cliente.ID 
    FROM cliente 
    WHERE cliente.EMAIL='$email_cliente';";

$query_cliente = $this->db->query($sql_cliente);

$result=$query_cliente->row();
    $id_cliente=$result->ID;

    $sql="INSERT INTO associacao_cartoes (ID_CARTAO, ID) VALUES ('$id_cartao', '$id_cliente');";
    $query = $this->db->query($sql);
    
    $sql_transacao="SELECT * FROM transacoes WHERE transacoes.ID=(SELECT cliente.ID FROM cliente WHERE cliente.EMAIL='$email_cliente') AND transacoes.ID_EMP=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa') AND transacoes.CODIGO='$codigo';";
    $query_transacao = $this->db->query($sql_transacao);

    $carimbos_atuais=$query_transacao->num_rows();

    $sql_update="UPDATE associacao_cartoes
    SET associacao_cartoes.CARIMBOS='$carimbos_atuais'
    WHERE associacao_cartoes.ID_CARTAO='$id_cartao' AND associacao_cartoes.ID='$id_cliente';";

$query_update = $this->db->query($sql_update);



    return $carimbos_atuais;
    
  }

  public function atualizaCarimbos_app($email_empresa, $email_cliente, $codigo){

    $sql_cartao="SELECT cartoes.ID_CARTAO FROM cartoes WHERE cartoes.EMP_ID=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa');";

    $query_cartao= $this->db->query($sql_cartao);
    
    $result=$query_cartao->row();
        $id_cartao=$result->ID_CARTAO;
    
    
        $sql_cliente="SELECT cliente.ID 
        FROM cliente 
        WHERE cliente.EMAIL='$email_cliente';";
    
    $query_cliente = $this->db->query($sql_cliente);
    
    $result=$query_cliente->row();
        $id_cliente=$result->ID;

        $sql_transacao="SELECT * FROM transacoes WHERE transacoes.ID=(SELECT cliente.ID FROM cliente WHERE cliente.EMAIL='$email_cliente') AND transacoes.ID_EMP=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa') AND transacoes.CODIGO='$codigo';";
        $query_transacao = $this->db->query($sql_transacao);
    
        $carimbos_atuais=$query_transacao->num_rows();
    
        $sql_update="UPDATE associacao_cartoes
        SET associacao_cartoes.CARIMBOS='$carimbos_atuais'
        WHERE associacao_cartoes.ID_CARTAO='$id_cartao' AND associacao_cartoes.ID='$id_cliente';";
    
    $query_update = $this->db->query($sql_update);

    return $carimbos_atuais;
    


  }

public function updateCartao_app($email_empresa, $email_cliente, $codigo){

  $sql_cartao="SELECT cartoes.ID_CARTAO FROM cartoes WHERE cartoes.EMP_ID=(SELECT empresa.ID FROM empresa WHERE empresa.EMAIL='$email_empresa');";

  $query_cartao= $this->db->query($sql_cartao);
  
  $result=$query_cartao->row();
      $id_cartao=$result->ID_CARTAO;
  
  
      $sql_cliente="SELECT cliente.ID 
      FROM cliente 
      WHERE cliente.EMAIL='$email_cliente';";
  
  $query_cliente = $this->db->query($sql_cliente);
  
  $result=$query_cliente->row();
      $id_cliente=$result->ID;

     
  
      $sql_update="UPDATE associacao_cartoes
      SET associacao_cartoes.CODIGO_CARTAO='$codigo'
      WHERE associacao_cartoes.ID_CARTAO='$id_cartao' AND associacao_cartoes.ID='$id_cliente';";
  
  $query_update = $this->db->query($sql_update);

  return $query_update;



}







    
    
}
?>