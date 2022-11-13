<?php 
	$contador=0;
	$strFotos="";
	for ($i=0; $i <5 ; $i++) { 
		if (isset($_POST['arquivo'.$i])) {
			$strFotos.=$_POST['arquivo'.$i].";";
			$contador++;
		}
	}
	
	$id=$_GET['id'];



	if ($_POST['titulo']) {

		foreach ($_POST as $key => $value) {
			$$key=$value;

		}
	
		if (isset($_POST['cat1']) && $_POST['cat1']!="Selecione") { if ($_POST['cat1'] !="Nova") {$cat1=$_POST['cat1'];}else{$cat1=$_POST['ncat1'];} }else{$cat1="NULL";}
		if (isset($_POST['cat2']) && $_POST['cat2']!="Selecione") { if ($_POST['cat2'] !="Nova") {$cat2=$_POST['cat2'];}else{$cat2=$_POST['ncat2'];} }else{$cat2="NULL";}
		if (isset($_POST['cat3']) && $_POST['cat3']!="Selecione") { if ($_POST['cat3'] !="Nova") {$cat3=$_POST['cat3'];}else{$cat3=$_POST['ncat3'];} }else{$cat3="NULL";}
		if (isset($_POST['titulo'])) { $nome=$_POST['titulo'];}else{}
		if (isset($_POST['subTitulo'])) { $marca=$_POST['subTitulo'];}else{}
		if (isset($_POST['noticia'])) { $descricao=nl2br($_POST['noticia']);}else{}

		$esparry=array();
		$resparray=array();
		$ref="0";
		for ($i=1; $i < 7 ; $i++) { 
			$string="esp$i";
			if (isset($_POST[$string])) {
				$esparry[]=$_POST[$string];
			}
		}
		for ($i=1; $i < 7 ; $i++) { 
			$string="resp$i";
			if (isset($_POST[$string])) {
				$resparray[]=$_POST[$string];
			}
		}

		if (isset($_POST['titulo'])) { $nome=$_POST['titulo'];}else{}
/*
		$fotos="";
		for ($i=0; $i < 4; $i++) { 

			$arquivo="arquivo$i";
			if (isset($_FILES[$arquivo]) && $_FILES[$arquivo]!="") {
			$dir = "../Imagens/produtos";
			$arq =$_FILES[$arquivo] ['name'];
			$arq_temp = $_FILES[$arquivo]['tmp_name'];
			if ($arq.";"!=";") {
				$fotos.=$arq.";";
			}else{

			}
			
			move_uploaded_file($arq_temp, "$dir/$arq");

		}else {
			}
		}
		$strFotos.=$fotos;
		
		$size = strlen($strFotos);
		if (strlen($fotos)>0) {

			if ($strFotos{ strlen( $strFotos ) - 1 } ==";") {
				//echo "1";
				$strFotos = substr($strFotos,0, $size-1);
			}

			
		}else{
			if ($contador==4) {
				
			}else{
				if ( $strFotos{ strlen( $strFotos ) - 1 } ==";"){

					$pdc=$strFotos{ strlen( $strFotos ) - 2 }.$strFotos{ strlen( $strFotos ) - 1 };
					//echo $pdc;
					if ($pdc != ";;") {
						$strFotos = substr($strFotos,0, $size-1);
					}else{

						$strFotos = substr($strFotos,0, $size-2);
					}
					
				}
			}
		}
		
		$strFotos=str_replace("semimg.png;", "", $strFotos);
		//echo $strFotos;
		$especificacoes="";
		for ($i=0; $i < 6; $i++) { 
			if ($i==0) {
				$especificacoes.=$esparry[$i].";".$resparray[$i];
			}else{
				$especificacoes.=";".$esparry[$i].";".$resparray[$i];
			}
			
		}*/

		if ($cat3 == "NULL") {
			$strCat="NULL";
		}else{

			$strCat="'".$cat3."'";
		}
		if ($cat1 == "NULL") {
			$strCat1="NULL";
		}else{

			$strCat1="'".$cat1."'";
		}
		if ($cat2 == "NULL") {
			$strCat2="NULL";
		}else{

			$strCat2="'".$cat2."'";
		}


		if (isset($_POST['status']) && $_POST['status']=="on") {
			$newStatus=0;
		}else{
			$newStatus=1;
		}
		/*
		if (isset($_POST['chkPreco']) && $_POST['chkPreco']=="on") {
			$preco=str_replace(",",".",$_POST['preco']);
		}else{
			$preco=999999;
		}*/

		//echo $_POST['status'];
		/*for ($i=0; $i <5 ; $i++) { 
			
		
		if ( $especificacoes{ strlen( $especificacoes ) - 1 } ==";"){

					$pdc=$especificacoes{ strlen( $especificacoes ) - 2 };
					//echo $pdc;
					if ($pdc == "::") {
						
							$especificacoes = substr($especificacoes,0, $size-2);
						
					}else{

						$especificacoes = substr($especificacoes,0, $size-1);
					}
					
			}
			}*/

		$sql="UPDATE noticias SET  cat1='".$cat1."', cat2='".$cat2."', cat3 = ".$cat3.", titulo = '$titulo',subtitulo = '$subtitulo' ,noticia = '$noticia', status='$newStatus', fonte='$fonte' WHERE id = ".$id.";";


		
		
		
		include("../banco/conecta.php");


		mysqli_query($link,$sql)
			or die('Erro ao execultar o insert, Erro:'.mysqli_error().mysqli_error());
		mysqli_close($link);
		
			
			header('Location:adcionarProdutos.php?id='.$id.'&alt');
		
		}else{
			header('Location:adcionarProdutos.php?id='.$id.'&no');
		}
	

?>