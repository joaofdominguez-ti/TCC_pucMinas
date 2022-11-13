<?php 
	
	$id=$_GET['id'];

include("../banco/conecta.php");
$sql="SELECT fotos from noticias WHERE  id='".$_GET['id']."'";
$fotosEd = array();
$TS  = mysqli_query($link,$sql);
   // for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 
	$i = 0;
	While ($i < $RS = mysqli_fetch_assoc($TS)) { 
		$i++;
        $fotos = $RS['fotos'];
        $fotosEd[]= $fotos;
		var_dump($fotos);
		var_dump($fotosEd);
	}
   // }
//mysqli_close($link,$sql);



$strFotos=explode(";", $fotosEd[0]);

var_dump($strFotos);

	if ($_POST) {


		//if (isset($_GET['id'])) { $nome=$_GET['id'];}else{}
		echo $_POST['cout'];
		$fotos="";
		for ($i=0; $i < $_POST['cout']; $i++) { 

			$arquivo="arquivo$i";
			if (isset($_FILES[$arquivo]) && $_FILES[$arquivo]!="") {
			$dir = "../Imagens/noticias";
			$arq =$_FILES[$arquivo] ['name'];
			$strFotos[]=$arq;
			$arq_temp = $_FILES[$arquivo]['tmp_name'];
			
			
			move_uploaded_file($arq_temp, "$dir/$arq");

		}else {
			}
		}
	
			
		
		$temp=implode(";", $strFotos);

		$sql="UPDATE noticias SET  fotos='".$temp."' WHERE id = ".$id."";


		
		
		include("../banco/conecta.php");


		mysqli_query($link,$sql)
			or die('Erro ao execultar o insert, Erro:'.mysql_errno().mysql_error());
		mysqli_close();
		
			
			header('Location:fotos.php?id='.$id.'&alt');
		
		}else{
			header('Location:adcionarProdutos.php?id='.$id.'&no');
		}
	

?>