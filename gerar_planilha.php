
 <?php
	session_start();
	include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>dB Geral</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'SaldoAtualizado.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Planilha de Saldo</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Item</b></td>';
		$html .= '<td><b>Descricao</b></td>';
		$html .= '<td><b>Pregao</b></td>';
		$html .= '<td><b>Ata</b></td>';
		$html .= '<td><b>Unidade</b></td>';
		$html .= '<td><b>Quantidade</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_usuarios = "SELECT * FROM produtos";
		$resultado_usuarios = mysqli_query($conn , $result_usuarios);
		$resultado_usuarios = mysqli_query($conn , $result_usuarios);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_usuarios)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["id"].'</td>';
			$html .= '<td>'.$row_msg_contatos["item"].'</td>';
			$html .= '<td>'.$row_msg_contatos["descricao"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pregao"].'</td>';
			$html .= '<td>'.$row_msg_contatos["ata"].'</td>';
			$html .= '<td>'.$row_msg_contatos["unidade"].'</td>';
			$html .= '<td>'.$row_msg_contatos["quantidade"].'</td>';
						
			//$data = date('d/m/Y H:i:s',strtotime($row_msg_contatos["created"]));
			//$html .= '<td>'.$data.'</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>