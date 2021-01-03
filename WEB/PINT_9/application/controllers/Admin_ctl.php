<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ctl extends CI_Controller {
     function __construct(){
		  parent::__construct(); 
		  $this->load->model("Emp_model");
	
	 }
   public function admin() {
		if($_SESSION['user_logged'] == FALSE){
			$this->session->set_flashdata("error","Please login first");
			redirect("auth/login");
		}
		
		$this->load->model('Dash_model');
	/*$data['clientes']*/ $results = $this->Dash_model->getDados();
	$dados = $this->Dash_model->getGeneroCli();
	$idade = $this->Dash_model->getIdadeCli();
	$estado = $this->Dash_model->getEstadoCli();
	$fidelização = $this->Dash_model->getUltimosRegistados();
	$data=array('results'=>$results, 'dados' =>$dados, 'idade'=>$idade, 'estado'=>$estado, 'fidelização'=>$fidelização );
	//$data['campanhas'] = $this->Dashboard_model->getnumerocampanhas($id);
     $this->load->view('layout/admin/_head_admin');
    $this->load->view('layout/admin/_nav_admin');

     $this->load->view('layout/admin/_dashboard_admin',$data);

		 $this->load->view('layout/_footer'); 
  }




	public function load_empresas() {

          
          $books['dados']= $this->Emp_model->get_emp();

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');

		$this->load->view('layout/admin/_emp_admin',$books);

		$this->load->view('layout/_footer'); 
	}



    public function load_clientes() {
        
			$books['dados']= $this->Emp_model->get_cli();

    $this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');

		$this->load->view('layout/admin/_cli_admin',$books);

		$this->load->view('layout/_footer'); 

	}

	public function load_campanhas() {

		$books['dados']= $this->Emp_model->get_camp();

    $this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');

		$this->load->view('layout/admin/_camp_admin',$books);

		$this->load->view('layout/_footer'); 

	}



	public function load_cartoes() {

		$books['dados']= $this->Emp_model->get_cartao();

    $this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');

		$this->load->view('layout/admin/_cartao_admin',$books);

		$this->load->view('layout/_footer'); 


	}



	public function	definicoes() {
		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');

		$this->load->view('layout/admin/_def_admin');

		
		$this->load->view('layout/index/_footer_index'); 
		
	}



	public function delete_emp($id) {

          $this->Emp_model->eliminar_emp($id);
          $this->load_empresas();
          
	 }


	 public function delete_cli($id) {
	
		$this->Emp_model->eliminar_cli($id);
		$this->load_clientes();
		
}

public function delete_fidel($id,$id_emp) {

	$this->Emp_model->eliminar_fidel($id,$id_emp);
	$this->List_FIDEL_CLI($id);
	
}


public function delete_admin(){
	$id =  $_SESSION['id'];
	$this->Emp_model->eliminar_admin($id);
	redirect(base_url() . "index.php/auth/login");
	
}

	 
public function send_mail(){



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
	$result = $this->Auth_model->emailexists($email);
if (count($result)>0) 
{
			$this->load->library('email', $config);
		//	$this->email->initialize($config);
			//$this->email->set_newline("\r\n");
			// $tokan = rand(1000, 9999);
			

				//$this->Auth_model->reset($tokan, $email);
				
				$message = $this->input->post('message');
				$subject= $this->input->post('assunto');
				$this->email->from('nelson.andrade98@gmail.com', 'Bizz Bizz');
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				if ($this->email->send()) {
				//$this->session->set_flashdata("enviado", "O email foi Enviado.");
				//echo "boas";
				redirect(base_url()."index.php/Admin.ctl/load_empresas/","refresh");
				} else {
				//$this->session->set_flashdata("nãoenviado", "Ocorreu um erro no envio do Email. Por favor tente novamente");
		//echo"boas2";
			//	redirect("Admin_ctl/load_empresas", "refresh");
			show_error($this->email->print_debugger());
				}
}
		else {
		$this->session->set_flashdata('error_message', 'Email não registado');
		echo "boas3";
		//redirect(base_url()."index.php/Admin.ctl/perfil_empresas/".$id);
		}


}




	 public function perfil_empresas($id) {

	
	 
		$row['dados']=$this->Emp_model->GetEmpDisplayble($id);


		$this->load->view('layout/admin/_head_admin');
	  $this->load->view('layout/admin/_nav_admin');
 
		$this->load->view('layout/admin/_perfilemp_admin',$row);
	
		$this->load->view('layout/index/_footer_index'); 
	
	}


	public function perfil_clientes($id) {

		$row['dados']=$this->Emp_model->GetCLIDisplayble($id);


		$this->load->view('layout/admin/_head_admin');
	  $this->load->view('layout/admin/_nav_admin');
 
		$this->load->view('layout/admin/_perfilcli_admin',$row);
	
		$this->load->view('layout/index/_footer_index'); 


	}

	
	public function List_CLI_EMP($id) {
	
		$books['dados']=$this->Emp_model->GETCLIENTEBYID($id);

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_cli_admin',$books);

		$this->load->view('layout/_footer'); 

	}


	public function List_CAMP_EMP($id) {
	
		$books['dados']=$this->Emp_model->GETCAMPANHABYID($id);

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_camp_admin',$books);

		$this->load->view('layout/_footer'); 
	
	
	
	}


	public function List_CARTAO_EMP($id) {
	
		$books['dados']=$this->Emp_model->GETCARTAOBYID($id);

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_cartao_admin',$books);

		$this->load->view('layout/_footer'); 
	
	
	
	}

	public function List_FIDEL_CLI($id) {

		$books['dados']=$this->Emp_model->GETFIDELBYID($id);

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_fidel_admin',$books);

		$this->load->view('layout/_footer'); 


	}



	public function List_TRANS_CLI($id) {

		$books['dados']=$this->Emp_model->GETTRANSBYID($id);

		$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_trans_admin',$books);

		$this->load->view('layout/_footer'); 

	}



public function AdAdmin(){

	if (isset($_POST['registo'])) {

		$this->form_validation->set_rules('name', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('morada', 'Morada', 'required');
		$this->form_validation->set_rules('nascimento', 'NASCIMENTO', 'required');
		$this->form_validation->set_rules('telefone', 'Phone', 'required|max_length[9]');

		if($this->form_validation->run() == TRUE) {
			/*echo 'form validated';*/

			$data = array(
				'ID'=>'',
				'NOME' => $_POST['name'],
				'EMAIL' => $_POST['email'],
				'PASSWORD' => $_POST['password'],
				'MORADA' => $_POST['morada'],
				//'DATA_REGISTO' =>  date('y-m-d'),
				//'NIF' => $_POST['nif'],
				'TELEFONE' => $_POST['telefone']



			);

			$dataAdmin = array(

				'NOME' => $_POST['name'],
				'EMAIL' => $_POST['email'],
				'MORADA' => $_POST['morada'],
				'DATANASC' => $_POST['nascimento'],
				//'DATA_REGISTO' =>  date('y-m-d'),
				//'NIF' => $_POST['nif'],
				'TELEFONE' => $_POST['telefone']
				



			);
			$this->Emp_model->registarAdmin($data, $dataAdmin);

			$this->session->set_flashdata("success", "You are now Registered, you can Login now.");
				redirect("Admin_ctl/AdAdmin", "refresh");

		}


}
$this->load->view('layout/_head');
$this->load->view('layout/admin/_nav_admin');
$this->load->view('layout/admin/_new_admin');
$this->load->view('layout/_footer'); 




}


 public function notification_emp($id){


	if (isset($_POST['send'])) {
	
		$this->form_validation->set_rules('assunto', 'ASSUNTO', 'required|min_length[5]');
		
		$this->form_validation->set_rules('message', 'MESSAGE', 'required|min_length[9]');

		if($this->form_validation->run() == TRUE) {
			/*echo 'form validated';*/


				



			
		

			$this->session->set_flashdata("success", "Email Sent");
				redirect("Admin_ctl/", "refresh");

		}


}

	$books['dados']=$this->Emp_model->GETMAILBYID($id);

  	$this->load->view('layout/admin/_head_admin');
		$this->load->view('layout/admin/_nav_admin');
		
		$this->load->view('layout/admin/_notification_admin',$books);

		$this->load->view('layout/index/_footer_index'); 
	



 }











public function profile() {
	if($_SESSION['user_logged'] == FALSE){
		$this->session->set_flashdata("error","Please login first");
		redirect("auth/login");
	}
	
	$this->load->model('Dash_model');
	/*$data['clientes']*/ $results = $this->Dash_model->getDados();
	$dados = $this->Dash_model->getGeneroCli();
	$idade = $this->Dash_model->getIdadeCli();
	$estado = $this->Dash_model->getEstadoCli();
	$fidelização = $this->Dash_model->getUltimosRegistados();
	$data=array('results'=>$results, 'dados' =>$dados, 'idade'=>$idade, 'estado'=>$estado, 'fidelização'=>$fidelização );
	//$data['campanhas'] = $this->Dashboard_model->getnumerocampanhas($id);
	 $this->load->view('nav_emp');
	$this->load->view('profile', $data);
}






}
?>