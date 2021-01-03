<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>     Bizz Bizz </title>
<link rel="stylesheet" href=" <?php  echo base_url('assets/css/test1.css')  ?>">
<link rel="stylesheet" href=" <?php  echo base_url('assets/css/card.css')  ?>">
<link rel="stylesheet" href=" <?php  echo base_url('assets/CSS/botoes.css');?>">
<link rel="stylesheet" href=" <?php  echo base_url('assets/CSS/defs.css');?>">
<link rel="stylesheet" href=" <?php  echo base_url('assets/css/perfil.css')  ?>">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<link rel="icon" href="<?=base_url('assets/Imagens/icon.png');?>">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 


<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!--
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>

 <script type="text/javascript" src="<?php  //echo base_url('assets/js/datatable.js')  ?> "></script>-->


</head>

<style type="text/css">

.dropdown-menu{
    background-color: #E25622;
}
.dropdownthings{
color: white;
}
.dropdownthings:hover{
color: #283352 ;
text-decoration: none;

}
.border-right-2{
border-right: 2px solid #E25622;
}

.card-container {
perspective: 700px;
}
.card-flip {
position: relative;
width: 100%;
transform-style: preserve-3d;
height: auto;
transition: all 0.5s ease-out;
/*background: white;*/
border: 2px solid #E25622;
}

.card-flip div {
backface-visibility: hidden;
transform-style: preserve-3d;
height: 100%;
width: 100%;
border: none;
}

.card-flip .front {
position: relative;
z-index: 1;
}

.card-flip .back {
position: relative;
z-index: 0;
transform: rotateY(-180deg);
}

.card-container:hover .card-flip {
transform: rotateY(180deg);
}

</style>








<body>

