<?php
	include("C:\\xampp\\htdocs\\tecnologiawebiv\\banco\\conecta.php");



$sql="SELECT * from dadosempresa;";

$result = mysqli_query($link, $sql);

while($TS = mysqli_fetch_assoc($result)) {

 $id   = $TS['idEmpresa'];
 $name = $TS['nomeEmpresa'];
 $tel  = $TS['telefoneEmpresa'];
 $email =  $TS['emailEmpresa'];
 $slogan =  $TS['slogan'];
 $rua =  $TS['rua'];
 $bairro = $TS['bairro'];
 $cidade =  $TS['cidadeUF'];
 $dado8 =  $TS['dado8'];
 $dado9 = $TS['dado9'];
	
 }



        
	$creditos			=  $name;
	$statusSite			= 'index,follow';
	$siteCreditos		= 'damillabrownies.com';
	$nomeSite			=  $name;
	$slogan				=  $slogan;
	$url				= 'C:/xampp/htdocs/tecnologiawebiv/';
	$ddd				= '(11)';
	$fone				= $tel;
	$emailContato		= $email;
	$emailRemetente		= 'contato@noticias.com';
	$senhaEmail			= 'teste';
	$classificacao		= 'Internet, marketing, seo, sites, otimização de sites, marketing digital';
	$rua				= $rua;
	$bairro				= $bairro;
	$cidadeUF			= $cidade;
	$cep				= 'CEP: 07144-160';
	$pagina             = explode("/", $_SERVER['PHP_SELF']);
	$urlPagina 			= end($pagina);
	$dado8=$dado8;
	$dado9=$dado9;
    $pasta 				= 'imagens/';




	if($urlPagina == 'index.php' || ''){
			$urlPagina = '';
			$urlCanonical = $url;
		}
		else{
			$urlCanonical = $url.$urlPagina;
		}
	$idFacebook			= 'facebook.com';

	
	
	


?>