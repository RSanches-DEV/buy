
<a href='http://26.243.0.64/form.php'><button>Página - Pesquisar ATA</button></a><br><br>





<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "estoque";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	

	

	$pesquisar = $_POST['ata'];
	$result_cursos = "SELECT * FROM produtos WHERE ata LIKE '%$pesquisar%' LIMIT 300000";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "<p hidden> ID: ".$rows_cursos['id']."<br></p>";
		echo "Item: ".$rows_cursos['item']."<br>";
		echo "Descrição: ".$rows_cursos['descricao']."<br>";
		echo "Pregão: ".$rows_cursos['pregao']."<br>";
		echo "Ata: ".$rows_cursos['ata']."<br>";
		echo "Unidade: ".$rows_cursos['unidade']."<br>";
		echo "Quantidade: ".$rows_cursos['quantidade']."<br>";
			}
?>