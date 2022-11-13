<?php

session_start();
include("../banco/conecta.php");


if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {

	$_SESSION = array();

	session_destroy();

	header("Location: ../login/login.php");

}