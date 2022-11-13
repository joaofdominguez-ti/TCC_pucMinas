<?php

include ("construct.php");
include("banco/conecta.php");

//var_dump(($_POST['senha'] ));
//var_dump(($_POST['login'] ));exit();

if(isset($_POST['login']) && isset($_POST['senha'])) {

$sql="SELECT senha from usuarios WHERE  login='".$_POST['login']."';";
var_dump($sql);

//$categorias1 = array();
$TS  = mysqli_query($link,$sql);

   // for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 
    $i = 0;
	while($i < $RS = mysqli_fetch_assoc($TS)) {

        $i++;
		$senha = $RS['senha'];
		
		
    }


	if(md5($_POST['senha']) == $senha) {

		
		session_start();

		$_SESSION['login'] = $_POST['login'];

		$_SESSION['senha'] = $_POST['senha'];

		header("Location: ../admin/alterar.php");

	}
	
	else {

		header("Location: login.php?erro");

	}
	
} else {

	header("Location: login.php?erro");

}