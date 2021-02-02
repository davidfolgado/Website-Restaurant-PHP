<?php
session_start();
require 'connections/basedados.h';

$nomeEncomenda = $_SESSION["nomePrato"];
$total = $_SESSION["valorTotalPrato"];
$idUtilizador = $_SESSION["idUtilizador"] ;
$idRestaurante = 1;


$sql = "INSERT INTO encomenda (valorEncomenda, idUtilizador, idRestaurante) VALUES ($total,  $idUtilizador, $idRestaurante)";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Encomenda realizada com sucesso!")</script>';
	header("Location: perfilcliente.php");
//	session_unset();
unset($_SESSION['cart']);
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
