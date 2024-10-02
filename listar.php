<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estoque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id, pregao, ata, unidade, item, descricao, quantidade FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["pregao"]. "</td><td>" . $row["ata"]. "</td><td>" . $row["unidade"]. "</td><td>" . $row["item"]. "</td><td>" . $row["descricao"]. "</td><td>" . $row["quantidade"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum produto encontrado</td></tr>";
}

$conn->close();
?>
