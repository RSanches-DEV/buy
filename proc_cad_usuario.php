<?php
session_start();
include_once("conexao.php");

$pregao = filter_input(INPUT_POST, 'ata', FILTER_SANITIZE_STRING);
$ata = filter_input(INPUT_POST, 'ata', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO produtos (pregao, ata, created) VALUES ('$pregao', '$ata', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Alterado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Item não Alterado - ERRO</p>";
	header("Location: cad_usuario.php");
}
