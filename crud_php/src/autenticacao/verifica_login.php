<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: ../autenticacao/login.php');
	exit();
}