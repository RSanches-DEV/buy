<?php
session_start();
include_once("conexao.php");
?>

<link rel="stylesheet" href="style.css">

<h1>Pesquisar Licitação</h1>
<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
?>
<form method="POST" action="pesquisar-sec.php">
	Pesquisar itens por n° ATA: <input type="text" name="ata" placeholder="Inserir N° ATA">
	<input type="submit" value="Pesquisar">
</form>