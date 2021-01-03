<?php
class Campanha_ctl extends CI_Controller
{
	public function Camp(){

		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}

		if (isset($_POST['submit'])) {

			$this->form_validation->set_rules('desconto', 'Desconto', 'required');
			$this->form_validation->set_rules('titulo', 'Titulo', 'required');
			$this->form_validation->set_rules('produtos' , 'Produto Alvo', 'required');
			$this->form_validation->set_rules('inicio', 'Data de Inicio' , 'required');
			$this->form_validation->set_rules('fim', 'Data do Fim', 'required');

			if (($this->form_validation->run() == TRUE)) {
				/*guardo a informação escrita pelo utilizador para a criação da campanha*/
			$data=array(
				'DESCONTO' => $_POST['desconto'],
				'TITULO' => $_POST['titulo'],
				'PRODUTO_ALVO' => $_POST['produtos'],
				'DATA_INICIO' => $_POST['inicio'],
				'DATA_FIM' => $_POST['fim'],
				'LOCALIZACAO' => $_POST['localidade'],
				'IDADE' => $_POST['idade'],
				'ESTADOCIVIL' => $_POST['estado_civil'],
				'GENERO' => $_POST['genero'],
				'ANIMAIS' => $_POST['animais'],
				'ID' => $_SESSION['id'],
				'CODIGO' => rand()
				);
			$this->load->model('Campanha_model');
			$this->Campanha_model->create_camp($data);
		}
	}
		$this->load->view('Campanha');
}    

	public function my_camp(){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
			/*guardo na variável $id o valor da $_SESSION['id']*/
		$id = $_SESSION['id'];
		$this->load->model('Campanha_model');
		/*executo a função getCamp com o $id em cima mostrado como parametro de entrada*/
		$data['campanhas'] = $this->Campanha_model->getCamp($id);
		/*carrego a view Minhas_campanhas com os dados recebidos da função do model */
		$this->load->view('Minhas_campanhas', $data);
	} 
	
	public function delete_Camp($id){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$this->load->model('Campanha_model');
		/*elimino a campanha com acesso à função deleteCamp($id) do model*/
		/*depois de eliminada a campanha volto a carregar a view que mostra as campanhas da empresa*/
		$this->Campanha_model->delete_Camp($id);

		$this->my_camp();
	}

	public function editar_Camp($id = 0){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("auth/login");
			}
		$this->load->model('Campanha_model');

		if($_SERVER['REQUEST_METHOD'] != 'POST'){

			// carrega os dados do contacto			
			$data['campanha'] = $this->Campanha_model->procurarCampanha($id);

			//apresenta a view para editar o contacto
			
			$this->load->view('Editar_camp', $data);
		} else {
			$this->Campanha_model->editar();

			$this->my_camp();
		}
	}
}