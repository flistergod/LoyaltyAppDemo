<?php
require "conn.php";

////aqui são aceites os dados do utilizador que são validados, se forem inválidos não é feito o registo
//caso contrário, é feito o registo na base de dados
$nome= $_POST["post_nome"];
$telefone=$_POST["post_telefone"];
$datanasc=$_POST["post_datanasc"];
$password=$_POST["post_password"];
$email=$_POST["post_email"];
$morada=$_POST["post_morada"];
$estadocivil=$_POST["post_ec"];
$genero=$_POST["post_genero"];
$animais=$_POST["post_animais"];
$cc=$_POST["post_cc"];
$nif=$_POST["post_nif"];




$mysql_qry="SELECT * FROM cliente WHERE EMAIL = '$email'";
$confirm_email = mysqli_query($conn, $mysql_qry);

$mysql_qry="SELECT * FROM cliente WHERE TELEFONE = '$telefone'";
$confirm_tlf = mysqli_query($conn, $mysql_qry);

$mysql_qry="SELECT * FROM cliente WHERE CARTAOCIDADAO = '$cc'";
$confirm_cc = mysqli_query($conn, $mysql_qry);

$mysql_qry="SELECT * FROM cliente WHERE NIF = '$nif'";
$confirm_nif = mysqli_query($conn, $mysql_qry);

if(mysqli_num_rows($confirm_email)>0){

    $array= array("REGISTER"=>"FAILED", "MSG"=>"Email utilizado por uma conta já existente");
    echo json_encode($array);

   


}else if(mysqli_num_rows($confirm_tlf)>0){

    $array= array("REGISTER"=>"FAILED", "MSG"=>"Telefone utilizado por uma conta já existente");
    echo json_encode($array);

    

}else if(mysqli_num_rows($confirm_cc)>0){

    $array= array("REGISTER"=>"FAILED", "MSG"=>"Cartão de cidadão utilizado por uma conta já existente");
    echo json_encode($array);

    

}else if(mysqli_num_rows($confirm_nif)>0){

    $array= array("REGISTER"=>"FAILED", "MSG"=>"NIF utilizado por uma conta já existente");
    echo json_encode($array);

    

}else  {

    mysqli_query($conn, "INSERT INTO utilizador (NOME,TELEFONE,DATANASC,PASSWORD,EMAIL,MORADA,TIPOUTILIZADOR) VALUES ('$nome','$telefone','$datanasc','$password','$email','$morada','3')");
  
 
$id_pai=$conn->insert_id;

  
 mysqli_query($conn, "INSERT INTO cliente (ID,NOME,TELEFONE,DATANASC,EMAIL,MORADA,ESTADOCIVIL,GENERO,ANIMAIS,CARTAOCIDADAO,NIF) VALUES ('$id_pai','$nome','$telefone','$datanasc','$email','$morada','$estadocivil','$genero','$animais','$cc','$nif')");



    $array= array("REGISTER"=>"OK", "MSG"=>"Registo feito!");
    echo json_encode($array);
}



?>



