<?php
include("../banco/conecta.php");

	if ($_POST) {
		$sql="SELECT destaque FROM destaques WHERE id_destaque=".$_POST['id'].";";
		$rsTemp=mysql_query($sql);
		$tempFt= explode(";", mysql_result($rsTemp, 0));
				
	}
for ($i=0; $i <6 ; $i++) { 
	if (isset($_POST['pdtNome'.($i+1).""])) {
		



	$sql="SELECT * FROM produtos WHERE idPdt=".$_POST['pdtNome'.($i+1).""].".;";
	$RS  = mysql_query($sql);
	$dadosPdt= mysql_fetch_array($RS,MYSQL_ASSOC);

	foreach ($dadosPdt as $key => $value) {
	  $$key=$value;
			//echo " $key :  $value<br />";
	}

	$vtFotos = explode(";",$fotosPdt);

	mysql_close();
	if ($_POST['pdtNome'.($i+1)] != "Comunicado") {
		$remover=explode(" ", substr($descricaoPdt, 0,80));

		$temp=substr($descricaoPdt, 0,80);
		$temp=str_replace(" ".$remover[(count($remover)-1)], "...", $temp);
		if ($tempFt!="aviso.jpeg") {
			unlink("../Imagens/produtos/".$tempFt[3]);
		}
		
		$sql = "UPDATE destaques SET destaque= '".$idPdt.";".$nomePdt.";".$temp.";".$vtFotos[0].";0' WHERE id_destaque = ".$_POST['id'].";";

	}else {

		if(isset($_POST['Comunicado'])){
			$comu=$_POST['Comunicado'];
		}else{$comu="Digite aqui o Comunicado!";}

		if(isset($_POST['descricaoPdt'])){
			$desc=nl2br($_POST['descricaoPdt']);
		}else{$desc="";}

		if (isset($_FILES['fotoComu']) && $_FILES['fotoComu']!="") {
			$dir = "../Imagens/produtos";
			$arq =/*o nome vai aqui*/$_FILES['fotoComu'] ['name'];
			$arq_temp = $_FILES['fotoComu'] ['tmp_name'];
			$fotos=$arq;
			move_uploaded_file($arq_temp, "$dir/$arq");

			if ($fotos=="") {
				$fotos="aviso.jpeg";
		}
			
		}else{
			$fotos="aviso.jpeg";
		}
		
		if ($_POST['alterarFoto']=="on") {
				$parteFoto=$tempFt[3];
			}else{
				$parteFoto=$fotos;

			}	

		$sql="UPDATE destaques SET destaque = '0;".$desc.";".$comu.";".$parteFoto.";1' WHERE id_destaque = ".$_POST['id'].";";
	}	
	

		
	include("../banco/conecta.php");
	mysql_query($sql)
			or die('Erro ao execultar o insert, Erro:'.mysql_errno().mysql_error());
		mysql_close();
		
			header('location:alterarDestaques.php?yes');
	}else{
		
}
}

?>
