<?php
class Dash_model extends CI_Model{

	public function __construct(){
        parent::__construct();
    }

    public function getDados(){
    	$sql = "SELECT count(*) as 'Num' from cliente ";
        $sql2 = "SELECT count(*) as 'CAM' from campanhas ";
        $sql3 = "SELECT count(*) AS 'empresas' FROM empresa ";
    	$query['cli'] = $this->db->query($sql)->result();
        $query['camp'] = $this->db->query($sql2)->result();
        $query['empresas'] = $this->db->query($sql3)->result();
        return $query;
        //return array('cli' => $query, 'camp' => $query2);
    	/*$this->db->select('*');
        $this->db->from('campanhas');
        $this->db->join('utilizador', 'campanhas.id = utilizador.id');
        $this->db->where('utilizador.id', $id);
		$query = $this->db->get();
		return $query;*/
    } 

    public function getGeneroCli() {
        $sql = "SELECT count(*) as 'homem' from cliente  where   cliente.GENERO = 'Masculino'";
        $sql2 = "SELECT count(*) as 'mulher' from cliente where  cliente.GENERO = 'Feminino'";
        $sql3 = "SELECT count(*) as 'outro' from cliente  where  cliente.GENERO = 'Outro'";
        $query['homem'] = $this->db->query($sql)->result();
        $query['mulher'] = $this->db->query($sql2)->result();
        $query['outro'] = $this->db->query($sql3)->result();
        return $query;
    }

    public function getIdadeCli() {
        $sql = "SELECT COUNT(*) as 'eighteen' FROM cliente WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=18 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<30);";
        $sql2 = "SELECT COUNT(*) as 'thirty' FROM cliente  WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=30 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<40);";
        $sql3 = "SELECT COUNT(*) as 'forty' FROM cliente  WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=40 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<50);";
        $sql4 = "SELECT COUNT(*) as 'fifty' FROM cliente  WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=50 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<60);";
        $sql5 = "SELECT COUNT(*) as 'sixty' FROM cliente  WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=60 AND TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())<70);";
        $sql6 = "SELECT COUNT(*) as 'seventy' FROM cliente  WHERE  (TIMESTAMPDIFF(YEAR,str_to_date(cliente.DATANASC, '%d/%m/%Y'),CURDATE())>=70);";
        $query['18+'] = $this->db->query($sql)->result();
        $query['30+'] = $this->db->query($sql2)->result();
        $query['40+'] = $this->db->query($sql3)->result();
        $query['50+'] = $this->db->query($sql4)->result();
        $query['60+'] = $this->db->query($sql5)->result();
        $query['70+'] = $this->db->query($sql6)->result();
        return $query;
    }

    public function getEstadoCli() {
         $sql = "SELECT count(*) as 'solteiro' from cliente  where   cliente.ESTADOCIVIL = 'Solteiro(a)'";
         $sql2 = "SELECT count(*) as 'casado' from cliente  where   cliente.ESTADOCIVIL = 'Casado(a)'";
         $sql3 = "SELECT count(*) as 'divorciado' from cliente  where cliente.ESTADOCIVIL = 'Divorciado(a)'";
         $sql4 = "SELECT count(*) as 'viuvo' from cliente  where  cliente.ESTADOCIVIL = 'Viúvo(a)'";
         $sql5 = "SELECT count(*) as 'separado' from cliente  where  cliente.ESTADOCIVIL = 'Separado(a)'";
         $sql6 = "SELECT count(*) as 'comprometido' from cliente  where  cliente.ESTADOCIVIL = 'Comprometido(a)'";
         $query['solteiro'] = $this->db->query($sql)->result();
         $query['casado'] = $this->db->query($sql2)->result();
         $query['divorciado'] = $this->db->query($sql3)->result();
         $query['viuvo'] = $this->db->query($sql4)->result();
         $query['separado'] = $this->db->query($sql5)->result();
         $query['comprometido'] = $this->db->query($sql6)->result();
         return $query;
    }

    public function getUltimosRegistados() {
        $sql = "SELECT COUNT(*) as 'lastweek' from utilizador  WHERE utilizador.TIPOUTILIZADOR!=1 AND utilizador.DATA_REGISTO >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);";
        $sql2 = "SELECT COUNT(*) as 'lastmonth' from utilizador  WHERE utilizador.TIPOUTILIZADOR!=1 AND utilizador.DATA_REGISTO >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);";
        $sql3 = "SELECT COUNT(*) as 'lastyear' from utilizador  WHERE utilizador.TIPOUTILIZADOR!=1 AND utilizador.DATA_REGISTO >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR);";
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