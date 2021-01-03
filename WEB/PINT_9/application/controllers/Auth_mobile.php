<?php
class Auth_mobile extends CI_Controller
{     

  public function __construct(){
    $this->email_login='';
    parent::__construct();
}
  
    


public function login(){
    
  $email= $this->input->post('post_email');
  $password= $this->input->post('post_password');

  $this->email_login=$email;
  
  $this->load->model('Auth_model');
                  $query=$this->Auth_model->login_app($email, $password);
                  $user = $query->row();
  
      if ($query->num_rows() > 0) {
        $name = $user->NOME;
     
  
      $array= array("LOGIN"=>"OK", "USER"=>$name);
      echo json_encode($array);
  
  }else {
  
      $array= array("LOGIN"=>"FAILED", "USER"=>"-");
      echo json_encode($array);
  }
 

}

	public function register(){
    $nome= $this->input->post('post_nome');
    $telefone=$this->input->post('post_telefone');
    $datanasc=$this->input->post('post_email');
    $password=$this->input->post('post_datanasc');
    $email=$this->input->post('post_email');
    $morada=$this->input->post('post_morada');
    $estadocivil=$this->input->post('post_ec');
    $genero=$this->input->post('post_genero');
    $animais=$this->input->post('post_animais');
    $cc=$this->input->post('post_cc');
    $nif=$this->input->post('post_nif');
    $foto=$this->input->post('post_foto');
    $upload_path = "uploads/$email.png";
    
    $this->load->model('Auth_model');
    $array=$this->Auth_model->register_app($nome, $telefone, $datanasc, $password, $email, $morada, $estadocivil, $genero, $animais, $cc, $nif, $foto, $upload_path);
    echo json_encode($array);
		
		
	}

     public function forgot_email(){

      $email= $this->input->post('post_email');
      $telefone= $this->input->post('post_telefone');

      $this->load->model('Auth_model');

      $query=$this->Auth_model->forgot_email_app($email, $telefone);

      
      if ($query->num_rows() > 0) {
        //$name = $row["EMAIL"];
       // echo "".$name;
       
    
        $array= array("ENVIA"=>"OK", "EMAIL"=>$email);
        echo json_encode($array);
    
    }else {
    
        $array= array("ENVIA"=>"FAILED", "EMAIL"=>"-");
        echo json_encode($array);
    }
      

     }

     public function updatePass(){

      $novaPass= $this->input->post('post_pass');
      $email= $this->input->post('post_email');


      $this->load->model('Auth_model');

      $query=$this->Auth_model->update_pass_app($email,$novaPass);

      $array= array("NOVAPASS"=>"OK", "PASS"=>$novaPass);
      echo json_encode($array);

      
     }

  

     public function empresasRecentes(){

      $email= $this->input->post('post_email');
      $this->load->model('Auth_model');

      $query=$this->Auth_model->mostraEmpresasRecentes_app($email);
   

      if( $query->num_rows() > 0) {
        $result = $query->result(); //or $query->result_array() to get an array
        foreach( $result as $row )
        {
          $flag[]=$row;  //access columns as $row->column_name
        }
       
        echo(json_encode($flag));
    }
      

  }


      public function campanhasRecentes(){ 

        $email= $this->input->post('post_email');
      $this->load->model('Auth_model');

      $query=$this->Auth_model->mostraCampanhasRecentes_app($email);
   

      if( $query->num_rows() > 0) {
        $result = $query->result(); //or $query->result_array() to get an array
        $rowcount=$query->num_rows();
        foreach( $result as $row )
        {
          $flag[]=$row;  //access columns as $row->column_name
        }
       
        echo(json_encode($flag));
    }
      }

     public function empresasFidelizadas(){

       $email= $this->input->post('post_email');
      $this->load->model('Auth_model');

      $query=$this->Auth_model->mostraEmpresasF_app($email);
   $rowcount=$query->num_rows();

      if( $query->num_rows() > 0) {
        $result = $query->result(); //or $query->result_array() to get an array
        foreach( $result as $row )
        {
          $flag[]=$row;  //access columns as $row->column_name
        }
       
       echo json_encode($flag);
    }
     }

     public function empresasNFidelizadas(){

         $email= $this->input->post('post_email');
      $this->load->model('Auth_model');

      $query=$this->Auth_model->mostraEmpresasNF_app($email);
      $rowcount = $query->num_rows();
    

      if( $query->num_rows() > 0) {
        $result = $query->result(); //or $query->result_array() to get an array
        foreach( $result as $row )
        {
          $flag[]=$row;  //access columns as $row->column_name
        }

       // $array= array("linhas"=>$rowcount, "array"=>$flag);
        echo json_encode($flag);
  
    }

     }


     public function updateEmail(){

      $email_atual= $this->input->post('post_email_atual');
      $email_novo= $this->input->post('post_email_novo');

      $this->load->model('Auth_model');

      $query=$this->Auth_model->emailExiste_app($email_novo);


      if( $query->num_rows()>0) {

        $array= array("NOVOEMAIL"=>"FALSE", "EMAIL"=>"EXISTENTE");
        echo json_encode($array);       
       }
        
      
     $query2=$this->Auth_model->updateEmail_app($email_atual,$email_novo);

     $array= array("NOVOEMAIL"=>"TRUE", "EMAIL"=>"ALTERADO");
     echo json_encode($array); 

    }


    public function updatePassDefinicoes(){

      $pass_atual= $this->input->post('post_pass_atual');
      $pass_nova= $this->input->post('post_pass_nova');
      $email= $this->input->post('post_email');

      $this->load->model('Auth_model');
      
     $query=$this->Auth_model->updatePass_app($pass_atual,$pass_nova,$email);

     $array= array("NOVAPASS"=>"TRUE", "PASS"=>"ALTERADA");
     echo json_encode($array); 

    }


   public function apagaConta(){

    $email= $this->input->post('post_email');
      $pass= $this->input->post('post_pass');
    

      $this->load->model('Auth_model');
      
     $query=$this->Auth_model->emailExisteApagar_app($email,$pass);

     if( $query->num_rows()>0) {

      $query2=$query=$this->Auth_model->apagarConta_app($email);

      $array= array("CONTA"=>"APAGADA");
      echo json_encode($array); 

     }
     else {

      $array= array("CONTA"=>"NAOENCONTRADA");
      echo json_encode($array); 
       
     }


    }

    public function perfil(){

      $email= $this->input->post('post_email');

      $this->load->model('Auth_model');
      
      $query=$this->Auth_model->getPerfil_app($email);

      if( $query->num_rows()>0) {
        $result=$query->row();

        
        $foto=$result->FOTO_PERFIL;
        $nome=$result->NOME;
        $telefone=$result->TELEFONE;
        $datanasc=$result->DATANASC;
        $morada=$result->MORADA;
        $estadocivil=$result->ESTADOCIVIL;
        $genero=$result->GENERO;
        $animais=$result->ANIMAIS;
        $nif=$result->NIF;
        $cc=$result->CARTAOCIDADAO;
        $registo=$result->DATA_REGISTO;
        
    
       
        $array= array("MSG"=>"OK", "FOTO"=>$foto, "NOME"=>$nome, "TELEFONE"=>$telefone, "DATA"=>$datanasc, "MORADA"=>$morada, "EC"=>$estadocivil, "GENERO"=>$genero, "ANIMAIS"=>$animais, "CC"=>$cc, "NIF"=>$nif, "REGISTO"=>$registo);
        echo json_encode($array); 
        

        
      }

        else{

          $array= array("CONTA"=>"NAOENCONTRADA");
      echo json_encode($array); 

        }

    }

    
    public function Campanhas(){


      $email= $this->input->post('post_email');

      
    $this->load->model('Auth_model');

    $query=$this->Auth_model->mostraCampanhas_app($email);
 

    if( $query->num_rows() > 0) {
      $result = $query->result(); //or $query->result_array() to get an array
      $rowcount=$query->num_rows();
      foreach( $result as $row )
      {
        $flag[]=$row;  //access columns as $row->column_name
      }
     
      echo(json_encode($flag));
  }
    }


    public function campanha_especifica(){
      $id_campanha=$this->input->post('post_id_campanha');
      $this->load->model('Auth_model');
      $query=$this->Auth_model->campanha_especifica_app($id_campanha);

      if( $query->num_rows()>0) {
        $result=$query->row();

        
        $data_inicio=$result->DATA_INICIO;
        $data_fim=$result->DATA_FIM;
        $desconto=$result->DESCONTO;
        $titulo=$result->TITULO;
        $empresa=$result->NOMEEMPRESA;
        $produto=$result->PRODUTO_ALVO;
        $local=$result->LOCALIZACAO;
        $genero=$result->GENERO;
        $estadocivil=$result->ESTADOCIVIL;
        $idade=$result->IDADE;
        $animais=$result->ANIMAIS;
        $codigo=$result->CODIGO;
        
    
       
        $array= array("MSG"=>"OK", "DATA_INICIO"=>$data_inicio, "DATA_FIM"=>$data_fim, "DESCONTO"=>$desconto, "TITULO"=>$titulo, "EMPRESA"=>$empresa, "PRODUTO_ALVO"=>$produto, "LOCALIZACAO"=>$local, "GENERO"=>$genero, "ESTADOCIVIL"=>$estadocivil, "IDADE"=>$idade, "ANIMAIS"=>$animais, "CODIGO"=>$codigo);
        echo json_encode($array); 
        

        
      }

        else{

          $array= array("CONTA"=>"NAOENCONTRADA");
      echo json_encode($array); 

        }

    }

    public function  getIDcampanha(){
      $titulo=$this->input->post('post_titulo');
      $nome_empresa=$this->input->post('post_empresa');

      $this->load->model('Auth_model');
      $query=$this->Auth_model->getIDcampanha_app($titulo, $nome_empresa);
      

      if( $query->num_rows()>0) {

        $result=$query->row();
        $ID=$result->ID_CAMPANHA;

        $array= array("MSG"=>"OK", "ID"=>$ID);
        echo json_encode($array); 

      }


    }

    public function getTelefoneEmpresa(){
      $email= $this->input->post('post_email');

      $this->load->model('Auth_model');
      $query=$this->Auth_model->getTelefoneEmpresa_app($email);

      if( $query->num_rows()>0) {

        $result=$query->row();
        $telefone=$result->TELEFONE;

        $array= array("MSG"=>"OK", "TELEFONE"=>$telefone);
        echo json_encode($array); 

      }
      else{
        $array= array("MSG"=>"NOTOK");
        echo json_encode($array);

      }


    }

    public function getMoradaEmpresa(){

      $email= $this->input->post('post_email');

      $this->load->model('Auth_model');
      $query=$this->Auth_model->getMoradaEmpresa_app($email);

      if( $query->num_rows()>0) {

        $result=$query->row();
        $morada=$result->MORADA;

        $array= array("MSG"=>"OK", "MORADA"=>$morada);
        echo json_encode($array); 

      }
      else{
        $array= array("MSG"=>"NOTOK");
        echo json_encode($array);

      }


    }

    public function desfidelizar(){

      $email_empresa= $this->input->post('post_email_empresa');
      $email_cliente= $this->input->post('post_email');

      $this->load->model('Auth_model');
      $query=$this->Auth_model->desfidelizar_app($email_empresa, $email_cliente);


        $array= array("MSG"=>"OK");
        echo json_encode($array); 
  

      }


      public function perfil_empresa(){

        $email= $this->input->post('post_email');

      $this->load->model('Auth_model');
      
      $query=$this->Auth_model->perfil_empresa_app($email);

      if( $query->num_rows()>0) {
        $result=$query->row();

        
        $foto=$result->FOTO_PERFIL;
        $nome=$result->NOMEEMPRESA;
        $telefone=$result->TELEFONE;
        $email=$result->EMAIL;
        $morada=$result->MORADA;
   $descricao=$result->DESCRICAO;
        
    
       
        $array= array("MSG"=>"OK", "FOTO"=>$foto, "NOME"=>$nome, "TELEFONE"=>$telefone, "MORADA"=>$morada, "EMAIL"=>$email, "DESCRICAO"=>$descricao);
        echo json_encode($array); 
        

        
      }

        else{

          $array= array("CONTA"=>"NAOENCONTRADA");
      echo json_encode($array); 

        }

        

      }


      public function fideliza(){

        $email_empresa= $this->input->post('post_email_empresa');
        $email_cliente= $this->input->post('post_email');

        $this->load->model('Auth_model');
      
        $query=$this->Auth_model->fideliza_app($email_empresa, $email_cliente);

        $array= array("MSG"=>"OK");
      echo json_encode($array); 


      }

      public function Transacoes(){

        $email_empresa= $this->input->post('post_email_empresa');
        $email_cliente= $this->input->post('post_email');

        $this->load->model('Auth_model');
      
        $query=$this->Auth_model->getTransacoes_app($email_empresa, $email_cliente);

        if( $query->num_rows() > 0) {
          $result = $query->result(); //or $query->result_array() to get an array
          $rowcount=$query->num_rows();
          foreach( $result as $row )
          {
            $flag[]=$row;  //access columns as $row->column_name
          }
         
          echo(json_encode($flag));
      }
        

          else{

          $array= array("MSG"=>"NOTOK");
          echo json_encode($array);
          
          }
        }

        public function transacao(){

          $id_transacao=$this->input->post('post_id_transacao');
      
          $this->load->model('Auth_model');
      
          $query=$this->Auth_model->transacao_app($id_transacao);

          
      if( $query->num_rows()>0) {
        $result=$query->row();

        
        $descricao=$result->DESCRICAO_TRANSACAO;
        $data=$result->DATA_REGISTO;
        $codigo=$result->CODIGO;
     
    
        
    
       
        $array= array("MSG"=>"OK", "DATA_REGISTO"=>$data, "DESCRICAO_TRANSACAO"=>$descricao, "CODIGO"=>$codigo);
        echo json_encode($array); 
        

        
      }

        else{

          $array= array("MSG"=>"NOTOK");
      echo json_encode($array); 

        }


        }

        public function cartao(){
          $email_empresa= $this->input->post('post_email_empresa');
        $email_cliente= $this->input->post('post_email');

          $this->load->model('Auth_model');

          
      
          $query=$this->Auth_model->getNomeEmpresa_app($email_empresa);

          if( $query->num_rows()>0) {
            $result=$query->row();
    

            $empresa=$result->NOMEEMPRESA;

        }
        else{
          $array= array("MSG"=>"NOTOK");
          echo json_encode($array); 
        }


        $query2=$this->Auth_model->getcartao_app($email_empresa);

        if( $query2->num_rows()>0) {
          $result=$query2->row();
  

          $data_inicio=$result->DATA_INICIO;
          $data_fim=$result->DATA_FIM;
          $carimbos=$result->CARIMBOS;
          $desconto=$result->DESCONTO;
          $designacao=$result->DESIGNACAO;
          $codigo=$result->CODIGO;
          $produto=$result->PRODUTO_ALVO;

      }
      else{
        $array= array("MSG"=>"NOTOK");
        echo json_encode($array); 
      }


  $query3=$this->Auth_model->getcartao_associacao_app($email_empresa, $email_cliente);

        if( $query3->num_rows()>0) {

          $carimbos_atuais=$this->Auth_model->atualizaCarimbos_app($email_empresa, $email_cliente, $codigo);
        
      }
      else{


        
        $carimbos_atuais=$this->Auth_model->cria_associacao_cartao_app($email_empresa, $email_cliente,$codigo);
      }
      

     
      $array= array("MSG"=>"OK", "EMPRESA"=>$empresa, "DATA_INICIO"=>$data_inicio, "DATA_FIM"=>$data_fim, "CARIMBOS"=>$carimbos, "DESCONTO"=>$desconto, "DESIGNACAO"=>$designacao, "CODIGO"=>$codigo, "CARIMBOS_ATUAIS"=>$carimbos_atuais, "PRODUTO"=>$produto);
      echo json_encode($array); 
    }

    public function verificaCartao(){


      $email_empresa= $this->input->post('post_email_empresa');
      $email_cliente= $this->input->post('post_email');

        $this->load->model('Auth_model');

        $query=$this->Auth_model->getcartao_associacao_app($email_empresa, $email_cliente);

        if( $query->num_rows()>0) {

          $result=$query->row();
         
          $codigo=$result->CODIGO_CARTAO;

          $array= array("MSG"=>"OK", "CODIGO_CARTAO"=>$codigo);
      echo json_encode($array); 

        }

          else{
            $array= array("MSG"=>"NOTOK");
            echo json_encode($array); 

          }
    }


    public function updateCartao(){

      $email_empresa= $this->input->post('post_email_empresa');
      $email_cliente= $this->input->post('post_email');
      $codigo=$this->input->post('post_codigo');

        $this->load->model('Auth_model');

        $query=$this->Auth_model->updateCartao_app($email_empresa, $email_cliente, $codigo);

       
          $array= array("MSG"=>"OK");
          echo json_encode($array); 

    }
  }

    
  


