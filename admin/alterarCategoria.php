<?php 
	$contador=0;
	$strFotos="";

		if (isset($_GET['newcat'])) {
			$novaCat=$_GET['newcat'];
		
		

		if (isset($_GET['cat1']) AND $_GET['cat1'] !="Escolher") {
			$categoria='cat1';
			$oldCat=$_GET['cat1'];
		}
		if(isset($_GET['cat2']) AND $_GET['cat2'] !="Escolher") {
			$categoria='cat2';
			$oldCat=$_GET['cat2'];
		}
		if(isset($_GET['cat3']) AND $_GET['cat3'] !="Escolher") {
			$categoria='cat3';
			$oldCat=$_GET['cat3'];
		}


	
	
		$sql="UPDATE noticias SET ".$categoria." = '".$novaCat."' WHERE ".$categoria." = '".$oldCat."';";

		//echo $sql;
		
		
		
		include("../banco/conecta.php");


		mysqli_query($link,$sql)
			or die('Erro ao execultar o insert, Erro:'.mysqli_error().mysqli_error());
		mysqli_close($link);
		
			
			header('Location:editarCategoria.php?nova='.$novaCat);
		
		}else{
			header('Location:editarCategoria.php?no');
		}
	

?>