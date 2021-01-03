<?php
	
	class User extends CI_Controller{

		
		public function profile() {
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			$id = $_SESSION['id'];
			$this->load->model('Dashboard_model');
			/*vou buscar a informação para as estatisticas apresentadas no Dashboard*/
			/*$data['clientes']*/ $results = $this->Dashboard_model->getDados($id);
			$dados = $this->Dashboard_model->getGeneroCli($id);
			$idade = $this->Dashboard_model->getIdadeCli($id);
			$estado = $this->Dashboard_model->getEstadoCli($id);
			$fidelização = $this->Dashboard_model->getUltimosFidelizados($id);
			$data=array('results'=>$results, 'dados' =>$dados, 'idade'=>$idade, 'estado'=>$estado, 'fidelização'=>$fidelização );
			//$data['campanhas'] = $this->Dashboard_model->getnumerocampanhas($id);
 			
			$this->load->view('Profile', $data);
		}

		public function clierror(){
			$this->load->view('Cliente_erro');
		}

		public function load_clientes() {
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			$emp_id = $_SESSION['id'];
			$this->load->model("Fetch_model");
			/*carrego na view clientes o resultado da query da função do model fetch_data_clientes onde vou buscar os clientes fidelizados à minha empresa*/
        	$data['fetch_data'] = $this->Fetch_model->fetch_data_clientes($emp_id);
        	
			$this->load->view('Clientes', $data);
		}


		public function definicoes(){
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			
			$this->load->view('Definições');
		}

		public function delete(){
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			/*função para apagar a própria conta */
			$id =  $_SESSION['id'];
			$this->load->model('Fetch_model');
			$this->Fetch_model->delete($id);
			redirect(base_url() . "index.php/Auth/login");
			
		}

		public function updatepw(){
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			$this->form_validation->set_rules('oldpass', 'current Password', 'required|min_length[5]');
			$this->form_validation->set_rules('newpass', 'New Password', 'required|min_length[5]');
			$this->form_validation->set_rules('newpass2', 'Confirm Password', 'required|min_length[5]');

			if ($this->form_validation->run() == TRUE) {
				//echo 'form validation succed';
				$curr_pass = $this->input->post('oldpass');
				$new_pass = $this->input->post('newpass');
				$conf_pass = $this->input->post('newpass2');
				$this->load->model('Fetch_model');
				$userid = $_SESSION['id'];
				/*vou buscar a informação que o utilizador tem registada na base de dados */
				$passwd = $this->Fetch_model->getcurrentinfo($userid);
				//print_r($passwd);
				//exit();
				/*comparar a password registada com a que o utilizador escreveu no formulário*/
				if ($passwd->PASSWORD == $curr_pass) {
					/*verificar se a nova pass e a confirmação são iguais */
					if ($new_pass == $conf_pass) {
						/*atualiza-se a password usando a função updatepassword*/
						if ($this->Fetch_model->updatepassword($new_pass, $userid)) {
							$this->session->set_flashdata("bem2", "Password Atualizada com Sucesso.");
							redirect("User/definicoes", "refresh");
						}else{
							$this->session->set_flashdata("erro3", "Erro a atualizar Password. Tente novamente.");
							redirect("User/definicoes", "refresh");
						}
					}else{
						$this->session->set_flashdata("erro4", "Nova Password e Confirmação não são iguais.");
						redirect("User/definicoes", "refresh");
					}
				}else {
					$this->session->set_flashdata("erro5", "Password escrita diferente da registada para esta conta.");
						redirect("User/definicoes", "refresh");
				}
			} else {
				$this->session->set_flashdata("erro6", "Preencha os dados corretamente.");
						redirect("User/definicoes", "refresh");
			}
		}

		public function updateemail(){
			/*usa-se a mesma linha de pensamento que o updatepassword acima*/
			if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			$this->form_validation->set_rules('oldemail', 'Current email', 'required');
			$this->form_validation->set_rules('newemail', 'New email', 'required');
			$this->form_validation->set_rules('newemail2', 'Confirm email', 'required');

			if ($this->form_validation->run() == TRUE) {
				//echo 'form validation succed';
				$curr_email = $this->input->post('oldemail');
				$new_email = $this->input->post('newemail');
				$conf_email = $this->input->post('newemail2');
				$this->load->model('Fetch_model');
				$userid = $_SESSION['id'];
				$email = $this->Fetch_model->getcurrentinfo($userid);
				//print_r($passwd);
				//exit();
				if ($email->EMAIL == $curr_email) {
					if ($new_email == $conf_email) {
						$this->fetch_model->update_email($new_email, $userid);
						$this->session->set_flashdata("bem", "O seu Email foi atualizado.");
						redirect("User/definicoes", "refresh");
					}else{
						$this->session->set_flashdata("erro", "Email e Confirmação não são iguais.");
						redirect("User/definicoes", "refresh");
					}
				}else {
					$this->session->set_flashdata("erro2", "Email registado nesta conta diferente do disponibilizado.");
					redirect("User/definicoes", "refresh");
				}

		} else {
				$this->session->set_flashdata("erro7", "Preencha os dados corretamente.");
						redirect("User/definicoes", "refresh");
		}
			
	}

	public function loademp_profile(){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$this->load->model('Fetch_model');
		$id = $_SESSION['id'];
		/*vai-se buscar a informação da empresa para se carregar no perfil */
		$data['infoemp'] = $this->Fetch_model->getemp($id);

        /*carrega-se a view do perfil da empresa com esses dados*/
		$this->load->view('Emp_profile', $data);
	}

	public function loadcli_profile($id = 0) {
		/*mesma ideologia da função acima*/
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$this->load->model('Fetch_model');
		$data['info'] = $this->Fetch_model->getcli($id);
		
		$this->load->view('Cli_profile', $data);
	}

	public function transacao1($id = 0) {
		$this->load->model('Fetch_model');
		/*vou buscar a informação do cliente para apresentar o nome no ecrã do inserir transação*/
		$data['cli'] = $this->Fetch_model->getcli2($id);
		$this->load->view('Transacoes', $data);
	}

	public function insert($id = 0) {
		$this->load->model('Fetch_model');
		$data['cli'] = $this->Fetch_model->getcli2($id);
		$this->form_validation->set_rules('descricaotransação', 'Descrição da Transação', 'required');
		$this->form_validation->set_rules('codigo', 'Código', 'required');

			if (($this->form_validation->run() == TRUE)) {
				
			$data=array(
				'ID' => $id,
				'ID_EMP' => $_SESSION['id'],
				'DESCRICAO_TRANSACAO' => $_POST['descricaotransação'],
				'CODIGO' => $_POST['codigo']
				
				);
			$this->load->model('Transacao_model');
			$this->Transacao_model->insert_tran($data);

			
			}
			//$this->session->set_flashdata("transacaoboa", "Transação Inserida com sucesso.");
			$this->transacao1($id);
	}

	public function get_tran($id = 0) {
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$idemp = $_SESSION['id'];
		$this->load->model('Fetch_model');
		$data['transacoes'] = $this->Fetch_model->gettran($id, $idemp);
		
		$this->load->view('Transacoescli', $data);

	}

	


}
?>