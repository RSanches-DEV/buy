<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM produtos WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Saldo</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar</a><br>
		
		<h1>Editar Saldo</h1>

		<a href="gerar_planilha.php"><button type='button' class='btn btn-sm btn-success'>Gerar Excel</button></a>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editbaixar.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Pregão: </label>
			<input type="text" name="pregao" placeholder="PREGÃO" value="<?php echo $row_produtos['pregao']; ?>"><br><br>
			
			<label>Ata: </label>
			<input type="number" name="ata" placeholder="N° ATA" value="<?php echo $row_produtos['ata']; ?>"><br><br>

            <label>Item: </label>
			<input type="number" name="item" placeholder="N° ITEM" value="<?php echo $row_produtos['item']; ?>"><br><br>

            <label>Descrição: </label>
			<input type="text" name="descricao" placeholder="DESCRIÇÃO" value="<?php echo $row_produtos['descricao']; ?>"><br><br>

            <label>Quantidade: </label>
			<input type="number" name="quantidade" placeholder="QUANTIDADE" value="<?php echo $row_produtos['quantidade']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>