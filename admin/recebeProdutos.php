<?php 
	//if ($_GET['nome']) {

		if (isset($_GET['cat1'])) { $cat1=$_GET['cat1'];}else{}
		if (isset($_GET['cat2'])) { $cat2=$_GET['cat2'];}else{}
		if (isset($_GET['cat3'])) { $cat3=$_GET['cat3'];}else{}
		if (isset($_GET['nomePdt'])) { $nome=$_GET['nomePdt'];}else{}
		if (isset($_GET['marcaPdt'])) { $marca=$_GET['marcaPdt'];}else{}
		if (isset($_GET['descricaoPdt'])) { $descricao=$_GET['descricaoPdt'];}else{}

		if (isset($_GET['esp1'])) { $esp1=$_GET['esp1'];}else{$esp1 = 'NULL';}
		if (isset($_GET['esp2'])) { $esp2=$_GET['esp2'];}else{$esp2 = 'NULL';}
		if (isset($_GET['esp3'])) { $esp3=$_GET['esp3'];}else{$esp3 = 'NULL';}
		if (isset($_GET['esp4'])) { $esp4=$_GET['esp4'];}else{$esp4 = 'NULL';}
		if (isset($_GET['esp5'])) { $esp5=$_GET['esp5'];}else{$esp5 = 'NULL';}

		if (isset($_GET['resp1'])) { $resp1=$_GET['resp1'];}else{$resp1 = 'NULL';}
		if (isset($_GET['resp2'])) { $resp2=$_GET['resp2'];}else{$resp2 = 'NULL';}
		if (isset($_GET['resp3'])) { $resp3=$_GET['resp3'];}else{$resp3 = 'NULL';}
		if (isset($_GET['resp4'])) { $resp4=$_GET['resp4'];}else{$resp4 = 'NULL';}
		if (isset($_GET['resp5'])) { $resp5=$_GET['resp5'];}else{$resp5 = 'NULL';}

		if (isset($_GET['nomePdt'])) { $nome=$_GET['nomePdt'];}else{}

		echo $nome;
		$dir = "../Imagens/produtos";
		$arq = $_FILES['arquivo'] ['name'];
		$arq_temp = $_FILES['arquivo']['tmp_name'];
		move_uploaded_file($arq_temp, "$dir/$arq");

		

	//}else{
	//	header("Location:adcionarProdutos.php");
	//}
?>