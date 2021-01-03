<?php
class Dashboard_model extends CI_Model{

	public function __construct(){
        parent::__construct();
    }

    public function getDados($id){
        /*vou buscar a quantidade das campanhas ativas, verifico se há cartão ativo ou não e vejo a quantidade de clientes fidelizados*/
    	$sql = "SELECT count(cliente.ID) as 'Num' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id";
        $sql2 = "SELECT count(campanhas.ID_CAMPANHA) as 'CAM' from campanhas where campanhas.ID = $id";
        $sql3 = "SELECT count(cartoes.ID_CARTAO) AS 'card' FROM cartoes WHERE cartoes.EMP_ID = $id";
    	$query['cli'] = $this->db->query($sql)->result();
        $query['camp'] = $this->db->query($sql2)->result();
        $query['card'] = $this->db->query($sql3)->result();
        return $query;
        //return array('cli' => $query, 'camp' => $query2);
    	/*$this->db->select('*');
        $this->db->from('campanhas');
        $this->db->join('utilizador', 'campanhas.id = utilizador.id');
        $this->db->where('utilizador.id', $id);
		$query = $this->db->get();
		return $query;*/
    } 

    public function getGeneroCli($id) {
        /*organiza-se os clientes fidelizados por género contando a quantidade de clientes de cada género */
        $sql = "SELECT count(cliente.ID) as 'homem' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.GENERO = 'Masculino'";
        $sql2 = "SELECT count(cliente.ID) as 'mulher' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.GENERO = 'Feminino'";
        $sql3 = "SELECT count(cliente.ID) as 'outro' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.GENERO = 'Outro'";
        $query['homem'] = $this->db->query($sql)->result();
        $query['mulher'] = $this->db->query($sql2)->result();
        $query['outro'] = $this->db->query($sql3)->result();
        return $query;
    }

    public function getIdadeCli($id) {
        /*organiza-se os clientes fidelizados por idade */
        $sql = "SELECT COUNT(cliente.ID) as 'eighteen' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=18 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<30);";
        $sql2 = "SELECT COUNT(cliente.ID) as 'thirty' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=30 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<40);";
        $sql3 = "SELECT COUNT(cliente.ID) as 'forty' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=40 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<50);";
        $sql4 = "SELECT COUNT(cliente.ID) as 'fifty' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=50 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<60);";
        $sql5 = "SELECT COUNT(cliente.ID) as 'sixty' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=60 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<70);";
        $sql6 = "SELECT COUNT(cliente.ID) as 'seventy' FROM cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=70);";
        $query['18+'] = $this->db->query($sql)->result();
        $query['30+'] = $this->db->query($sql2)->result();
        $query['40+'] = $this->db->query($sql3)->result();
        $query['50+'] = $this->db->query($sql4)->result();
        $query['60+'] = $this->db->query($sql5)->result();
        $query['70+'] = $this->db->query($sql6)->result();
        return $query;
    }

    public function getEstadoCli($id) {
        /*organiza-se os clientes fidelizados por estado civil*/
         $sql = "SELECT count(cliente.ID) as 'solteiro' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Solteiro(a)'";
         $sql2 = "SELECT count(cliente.ID) as 'casado' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Casado(a)'";
         $sql3 = "SELECT count(cliente.ID) as 'divorciado' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Divorciado(a)'";
         $sql4 = "SELECT count(cliente.ID) as 'viuvo' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Viúvo(a)'";
         $sql5 = "SELECT count(cliente.ID) as 'separado' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Separado(a)'";
         $sql6 = "SELECT count(cliente.ID) as 'comprometido' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID where associacao.EMP_ID = $id AND cliente.ESTADOCIVIL = 'Comprometido(a)'";
         $query['solteiro'] = $this->db->query($sql)->result();
         $query['casado'] = $this->db->query($sql2)->result();
         $query['divorciado'] = $this->db->query($sql3)->result();
         $query['viuvo'] = $this->db->query($sql4)->result();
         $query['separado'] = $this->db->query($sql5)->result();
         $query['comprometido'] = $this->db->query($sql6)->result();
         return $query;
    }

    public function getUltimosFidelizados($id) {
        /*vou buscar o número de clientes que se fidelizaram à empresa na última semana, último mês e último ano*/
        $sql = "SELECT COUNT(cliente.ID) as 'lastweek' from cliente  INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND associacao.Data_fidelização >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);";
        $sql2 = "SELECT COUNT(cliente.ID) as 'lastmonth' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND associacao.Data_fidelização >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);";
        $sql3 = "SELECT COUNT(cliente.ID) as 'lastyear' from cliente INNER JOIN associacao ON cliente.ID = associacao.ID WHERE associacao.EMP_ID = $id AND associacao.Data_fidelização >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR);";
        $query['semana'] = $this->db->query($sql)->result();
        $query['mes'] = $this->db->query($sql2)->result();
        $query['ano'] = $this->db->query($sql3)->result();
        return $query;
    }
/*

    public function getnumerocampanhas($id) {
    	$sql = "SELECT count(campanhas.ID_CAMPANHA) as 'CAM' from campanhas where campanhas.ID = $id";
    	$query = $this->db->query($sql);
    	return $query->result();
    }*/


}