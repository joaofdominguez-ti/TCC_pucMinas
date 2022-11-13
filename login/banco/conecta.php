<?php

$servidor ='localhost';
$banco = 'bd_sistema';
$usuario='root';
//$senhaDb='1234';
$senhaDb='I!yLLqjTvjkuDVJ/';
$link =mysqli_connect($servidor,$usuario,$senhaDb);
$db = mysqli_select_db($link,$banco);

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}
mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,'SET character_set_connection=utf8');
mysqli_query($link,'SET character_set_client=utf8');
mysqli_query($link,'SET character_set_results=utf8');


?>