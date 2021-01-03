<?php
class Auth extends CI_Controller
{     
      public function login(){
        /*definição das regras de validação*/
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            if($this->form_validation->run() == TRUE) {
              /*se a validação não der erro*/
                  $username = $_POST['email'];
                  $password = $_POST['password'];
                  /*guardo a informação escrita pelo utilizador em duas variáveis */
                  $this->load->model('Auth_model');
                  /*executo a função do model */
                  $query=$this->Auth_model->login($username, $password);
                  $user = $query->row();
                  //if user exists

            if ($query->num_rows() > 0) {
                $this->session->set_flashdata("success", "You are now logged in");
                /*user logged serve para verificar se o utilizador já está logado*/
                /*armazenamento de algumas informações da conta logada através de variáveis $_SESSION */
                $_SESSION['user_logged'] = TRUE;
                $_SESSION['username'] = $user ->NOME;
                $_SESSION['tipo'] = $user->TIPOUTILIZADOR;
                $_SESSION['id'] = $user->ID;
                $_SESSION['telefone'] = $user->TELEFONE;
                $_SESSION['email'] = $user->EMAIL;

                /*vou buscar o nome da empresa para depois apresentar na navbar quando o utilizador entrar no site*/
                $nome = $this->Auth_model->getNomeEmp($user->ID);
                $nomeemp = $nome->row();
               

                if ($_SESSION['tipo'] == 2) {
                  $_SESSION['nomeemp'] = $nomeemp->NOMEEMPRESA;
                  redirect("User/profile", "refresh");
                } else if($_SESSION['tipo'] == 1) {
                  redirect("Admin_ctl/admin", "refresh");
                } else if($_SESSION['tipo'] == 3) {
                  redirect("User/clierror", "refresh");
                }


                //redirect para a pagina de perfil
                //redirect("user/profile", "refresh");
            } else {
                $this->session->set_flashdata("error", "User não registado.");
                redirect("Auth/login", "refresh");
            }

        }
           
            $this->load->view('Login');
}


	public function register(){
		
		if (isset($_POST['registo'])) {

		        $this->form_validation->set_rules('name', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('morada', 'Morada', 'required');
            $this->form_validation->set_rules('fundação', 'Data de Fundação', 'required');
           	$this->form_validation->set_rules('nif', 'Nif', 'required|max_length[9]');
            $this->form_validation->set_rules('telefone', 'Telefone', 'required|max_length[9]');
            $this->form_validation->set_rules('loja', 'Nome da Loja', 'required');
            $this->form_validation->set_rules('descricao', 'Descrição da Loja', 'required|max_length[1000]');

            if($this->form_validation->run() == TRUE) {
            	/*echo 'form validated';*/
              /*guardo as informações escritas pelo utilizador nestes dois arrays que vão ser carregados para a função do model que faz o registo*/
              /*array da informação que se vai colocar na tabela utilizador */
            	$data = array(

            		'NOME' => $_POST['name'],
            		'EMAIL' => $_POST['email'],
            		'PASSWORD' => md5($_POST['password'])/*uso o md5 para encriptar a password escrita pelo utilizador*/,
            		'MORADA' => $_POST['morada'],
                'DATANASC' => $_POST['fundação'],
                //'DATA_REGISTO' =>  date('y-m-d'),
            		//'NIF' => $_POST['nif'],
            		'TELEFONE' => $_POST['telefone']



            	);
              /*array da informação que se vai colocar na tabela empresa*/
              $dataEmp = array(
                'ID' => '',
                'NOME' => $_POST['name'],
                'EMAIL' => $_POST['email'],
                'MORADA' => $_POST['morada'],
                'DESCRICAO' => $_POST['descricao'],
                'DATANASC' => $_POST['fundação'],
                //'DATA_REGISTO' =>  date('y-m-d'),
                //'NIF' => $_POST['nif'],
                'TELEFONE' => $_POST['telefone'],
                'NOMEEMPRESA' => $_POST['loja'],
                'NIF' => $_POST['nif']



              );
            	$this->load->model('Auth_model');
              /*função que verifica se o mail, o telefone e o NIF já existem na base de dados */ 
              $checkemail = $this->Auth_model->checkifexists($dataEmp['EMAIL'], $dataEmp['TELEFONE'], $dataEmp['NIF']);
              if ($checkemail == true) {
                /*executo a função para o registo da empresa*/
              $this->Auth_model->registarEmpresa($data, $dataEmp);

              $this->session->set_flashdata("success", "You are now Registered, you can Login now.");
                redirect("auth/register", "refresh");
              } else {
              $this->session->set_flashdata("error", "O Email ou o Telefone ou o NIF introduzidos já estão registados.");
                redirect("auth/register", "refresh");
              }
             /* $this->Auth_model->registarEmpresa($data, $dataEmp);

            	$this->session->set_flashdata("success", "You are now Registered, you can Login now.");
              	redirect("auth/register", "refresh");*/

            }


		}
		$this->load->view('Registo');
	}

  public function ForgotPass(){
    
    $this->load->view('Reset_pass');
  }

  public function reset_link(){
    /*configuração para se enviar um mail */
    $config = array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'nelson.andrade98@gmail.com',
      'smtp_pass' => 'Leitinho1.',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE

    );

    $email = $this->input->post('email');
    $this->load->model('Auth_model');
    /*verifico se o email existe na base de dados*/
    $result = $this->Auth_model->emailexists($email);
   if (count($result)>0) 
   {
    /*se existir envia-se o mail */
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    // $tokan = rand(1000, 9999);
    $_SESSION['email'] = $email;

     //$this->Auth_model->reset($tokan, $email);
     $message = "Please click on password reset link <br> <a href='".base_url('index.php/auth/reset')."'>Reset Password</a>";
     $this->email->from('nelson.andrade98@gmail.com', 'Bizz Bizz');
     $this->email->to($email);
     $this->email->subject('Reset Password Link');
     $this->email->message($message);
     if ($this->email->send()) {
      $this->session->set_flashdata("enviado", "O email foi Enviado.");
      redirect("Auth/ForgotPass", "refresh");
     } else {
      $this->session->set_flashdata("nãoenviado", "Ocorreu um erro no envio do Email. Por favor tente novamente");
      redirect("Auth/ForgotPass", "refresh");
      //show_error($this->email->print_debugger());
     }
   }
    else {
      $this->session->set_flashdata('error_message', 'Email não registado');
      redirect("Auth/ForgotPass");
   }
  }

  public function reset(){
    //$data['tokan'] = $this->input->get('tokan');
    //$_SESSION['email'];
   
    $this->load->view('Reset');
  }

  public function updatepass(){

      $email = $_SESSION['email'];
      
      $this->form_validation->set_rules('newpassword','Password','required|min_length[5]');
      $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[newpassword]');
      
      if ($this->form_validation->run()==FALSE) {
       /* echo validation_errors();        
        redirect(base_url('index.php/auth/reset'));*/
        $this->load->view('reset');
       
      } else {
        /*atualiza-se a pass usando a função updatepass do model */
        $pass = $this->input->post('newpassword');
        $this->load->model('Auth_model');
        $this->Auth_model->updatepass($pass, $email);

       /* $this->session->set_flashdata('forgotpassword', 'Password alterada com sucesso');*/
        redirect("Auth/login");
      }
      /*$data = $this->input->post();
      if ($data['password'] == $data['cpassword']) {
        $this->load->model('Auth_model');
        $this->Auth_model->updatepass($data, $_SESSION['tokan']);
      }*/
  }

  public function get_app() {
    /*função que se usa para fazer o download da app através do site*/
    $this->load->helper('download');
    $data = file_get_contents(base_url('/App.zip'));
    $name = "app.zip";

    force_download($name, $data);
  }
      
  public function logout() {
    /*função onde se faz o logout da app*/
        unset($_SESSION);
        session_destroy();
        redirect("Auth/login", "refresh");
    }

}
