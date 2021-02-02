<?php
	session_start();
	include_once("connections/basedados.h");
	$idPrato = $_GET['id'];
	if(!empty($idPrato)){
		$result_prato = "DELETE FROM prato WHERE idPrato='$idPrato'";
		$resultado_prato = mysqli_query($conn, $result_prato);
			if(mysqli_affected_rows($resultado_prato)){
			$_SESSION['msg'] = "<p style='color:red;'>Erro</p>";
			header("Location: gerirprato.php");
			}else  {
		
			$_SESSION['msg'] = "<p style='color:green;'>Restaurante apagado com sucesso</p>";
			header("Location: gerirprato.php");
			}
	}
	?>