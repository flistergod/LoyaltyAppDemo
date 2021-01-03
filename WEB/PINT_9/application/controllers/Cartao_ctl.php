<?php
class Cartao_ctl extends CI_Controller
{
	public function card(){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}

		if (isset($_POST['card_creation'])) {

			$this->form_validation->set_rules('titulo', 'Titulo', 'required');
			$this->form_validation->set_rules('carimbos', 'Número de Carimbos', 'required');
			$this->form_validation->set_rules('inicio' , 'Data de Inicio', 'required');
			$this->form_validation->set_rules('fim', 'Data de Fim' , 'required');
			$this->form_validation->set_rules('desconto', 'Desconto', 'required');
			$this->form_validation->set_rules('descricao', 'Descrição', 'required');
			$this->form_validation->set_rules('produto', 'Produto-Alvo', 'required');

			if (($this->form_validation->run() == TRUE)) {
				
			$data=array(
				'EMP_ID' => $_SESSION['id'],
				'TITULO' => $_POST['titulo'],
				'CARIMBOS' => $_POST['carimbos'],
				'DATA_INICIO' => $_POST['inicio'],
				'DATA_FIM' => $_POST['fim'],
				'DESCONTO' => $_POST['desconto'],
				'DESIGNACAO' => $_POST['descricao'],
				'PRODUTO_ALVO' => $_POST['produto'],
				'CODIGO' => rand(0, 1000000000)
				);
			$this->load->model('Transacao_model');
			$this->Transacao_model->create_card($data);
		}
	}
		$this->load->view('Cartao');
	}

	public function my_card(){
		/*usa-se a mesma linha de pensamento usada na função my_Camp() do Campanha_ctl*/
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$id = $_SESSION['id'];
		$this->load->model('Fetch_model');
		$data['card'] = $this->Fetch_model->getCard($id);
		
		$this->load->view('Meu_cartão', $data);
	}

	public function delete_Card($id){
		/*usa-se a mesma linha de pensamento usada na função delete_camp() do Campanha_ctl*/
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$this->load->model('Fetch_model');
		$this->Fetch_model->delete_Card($id);

		$this->my_card();
	}

	public function editar_Card($id = 0){
		if($_SESSION['user_logged'] == FALSE){
				$this->session->set_flashdata("error","Please login first");
				redirect("Auth/login");
			}
		$this->load->model('Fetch_model');

		if($_SERVER['REQUEST_METHOD'] != 'POST'){

			// carrega os dados do contacto			
			$data['cartao'] = $this->Fetch_model->procurarCartao($id);

			//apresenta a view para editar o contacto
			
			$this->load->view('Editar_card', $data);
		} else {
			$this->Fetch_model->editar();

			$this->my_card();
		}
	}
}