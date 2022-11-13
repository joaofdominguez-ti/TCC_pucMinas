<?php 
	if ($_POST['titulo']) {
	
		if (isset($_POST['cat1']) && $_POST['cat1']!="Selecione") { if ($_POST['cat1'] !="Nova") {$cat1=$_POST['cat1'];}else{$cat1=$_POST['ncat1'];} }else{$cat1='NULL';}
		if (isset($_POST['cat2']) && $_POST['cat2']!="Selecione") { if ($_POST['cat2'] !="Nova") {$cat2=$_POST['cat2'];}else{$cat2=$_POST['ncat2'];} }else{$cat2='NULL';}
		if (isset($_POST['cat3']) && $_POST['cat3']!="Selecione") { if ($_POST['cat3'] !="Nova") {$cat3=$_POST['cat3'];}else{$cat3=$_POST['ncat3'];} }else{$cat3='NULL';}
		if (isset($_POST['titulo'])) { $titulo=$_POST['titulo'];}else{}
		if (isset($_POST['subtitulo'])) { $subtitulo=$_POST['subtitulo'];}else{}
		if (isset($_POST['noticia'])) { $noticia=nl2br($_POST['noticia']);}else{}
		if (isset($_POST['fonte'])) { $fonte=nl2br($_POST['fonte']);}else{}
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
/*
		if (isset($_POST['titulo'])) { $nome=$_POST['titulo'];}else{}

		$fotos="";
		for ($i=0; $i < 4; $i++) { 
			$arquivo="arquivo$i";
			if (isset($_FILES[$arquivo]) && $_FILES[$arquivo]!="") {
			$dir = "../Imagens/produtos";
			$arq =$_FILES[$arquivo] ['name'];
			$arq_temp = $_FILES[$arquivo]['tmp_name'];
			$temp=$arq.";";
			if ($temp != ";" && $fotos!="") {
				
				$fotos.=$arq.";";				

			}else{$fotos.=$arq.";";}
			
			move_uploaded_file($arq_temp, "$dir/$arq");
		}else {
			}
		}
		$especificacoes="";
		for ($i=0; $i < 6; $i++) { 
			if ($i==0) {
				$especificacoes.=$esparry[$i].";".$resparray[$i];
			}else{
				$especificacoes.=";".$esparry[$i].";".$resparray[$i];
			}
			
		}

		if (isset($_POST['status']) && $_POST['status']== false) {
			$newStatus=1;
		}else{
			$newStatus=0;
		}
		if (isset($_POST['chkPreco']) && $_POST['chkPreco']=="on") {
			$preco=str_replace(",",".",$_POST['preco']);
		}else{
			$preco=999999;
		}
		$fotos=str_replace("semimg.png;", "", $fotos);
		for ($i=0; $i <10 ; $i++) { 
			
		
		if ( $especificacoes{ strlen( $especificacoes ) - 1 } ==":"){

					$pdc=$especificacoes{ strlen( $especificacoes ) - 2 };
					//echo $pdc;
					if ($pdc != "::") {
						
							$especificacoes = substr($especificacoes,0, $size-2);
						
					}else{

						$especificacoes = substr($especificacoes,0, $size-1);
					}
					
			}
			}*/

			if (isset($_POST['status']) && $_POST['status']== false) {
			$newStatus=1;
		}else{
			$newStatus=0;
		}
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
			//$especificacoes= str_replace("/", replace, subject)
		$sql="INSERT INTO `noticias` (`id`, `cat1`, `cat2`, `cat3`, `cat4`, `titulo`, `subtitulo`, `noticia`, `status`,`fonte`) VALUES (NULL, ".$strCat1.", ".$strCat2.", ".$strCat.", NULL, '$titulo', '$subtitulo', '$noticia', $newStatus, '$fonte');";
		echo $sql;
		
		include("../banco/conecta.php");


		mysqli_query($link,$sql)
			or die('Erro ao execultar o insert, Erro:'.mysql_errno().mysql_error());
		mysqli_close();
		
			header('Location:adcionarProdutos.php?id=0');
		
		}else{
			header('Location:adcionarProdutos.php?no');
		}
		
?>