<?php
require "conn.php";
//é aqui que são validados os dados que vão ser "updated" no registo do utilizador
//se forem válidos, o update acontece
$nome= $_POST["post_nome"];
$telefone=$_POST["post_telefone"];
$datanasc=$_POST["post_datanasc"];
$email=$_POST["post_email"];
$morada=$_POST["post_morada"];
$estadocivil=$_POST["post_ec"];
$genero=$_POST["post_genero"];
$animais=$_POST["post_animais"];
$cc=$_POST["post_cc"];
$nif=$_POST["post_nif"];






$mysql_qry="SELECT * FROM cliente WHERE EMAIL = '$email'";
$confirm_email = mysqli_query($conn, $mysql_qry);

if(mysqli_num_rows($confirm_email)>0){

$sql="UPDATE cliente
SET cliente.NOME='$nome', cliente.TELEFONE ='$telefone', cliente.DATANASC ='$datanasc', cliente.MORADA ='$morada', cliente.ESTADOCIVIL='$estadocivil', cliente.GENERO='$genero', cliente.ANIMAIS='$animais', cliente.CARTAOCIDADAO='$cc', cliente.NIF='$nif', cliente.FOTO_PERFIL='$upload_file'
WHERE cliente.EMAIL='$email';";


$sql2="UPDATE utilizador
SET utilizador.NOME='$nome', utilizador.TELEFONE ='$telefone', utilizador.DATANASC ='$datanasc', utilizador.MORADA ='$morada', utilizador.FOTO_PERFIL='$upload_file'
WHERE utilizador.EMAIL='$email';";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);

  
 
    
    
        $array= array("ALTERA"=>"OK", "MSG"=>"Alterações feitas");
        echo json_encode($array);

    

}else  {

    $array= array("ALTERA"=>"FAILED", "MSG"=>"Email nao encontrado");
    echo json_encode($array);

  
}



?>
