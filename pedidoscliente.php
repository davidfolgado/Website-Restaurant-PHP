<?php
	session_start();
	include_once("connections/basedados.h");
	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit; }

		if(isset($_POST["add"])) {
		  if (isset($_SESSION["cart"])) {
		    $item_array_id = array_column($_SESSION["cart"], "idPrato");
		    if (!in_array($_GET["id"], $item_array_id)) {
		      $count = count($_SESSION["cart"]);
		      $item_array = array(
		        'product_id' => $_GET["id"],
		        'item_name' => $_POST["hidden_name"],
		        'product_price' => $_POST["hidden_price"],
		        'item_quantity' => $_POST["quantidade"],
		      );
		      $_SESSION["cart"][$count] = $item_array;
		      echo '<script>window.location="pedidoscliente.php"</script>';
		    }
		    else {
		      echo '<script>window.location="pedidoscliente.php"</script>';
		    }
		  } else{
		    $item_array = array(
		      'product_id' => $_GET["id"],
		      'item_name' => $_POST["hidden_name"],
		      'product_price' => $_POST["hidden_price"],
		      'item_quantity' => $_POST["quantidade"],
		    );
		    $_SESSION["cart"][0] = $item_array;
		  }
		}
		if (isset($_GET["action"])){
		  if ($_GET["action"] == "delete") {
		    foreach ($_SESSION["cart"] as $keys => $value) {
		      if($value["product_id"] == $_GET["id"]) {
		        unset($_SESSION["cart"][$keys]);
		        echo '<script>window.location="pedidoscliente.php"</script>';
		      }
		    }
		  }
		}
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faça o seu pedido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/mystylegaleria.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/galeriaa.js"></script>
    <link rel="stylesheet" href="css/icon.css"> <!-- css que acrescenta o botao de fechar na galeria-->
    <link rel="stylesheet" href="css/quicksand.css">

</head>
<body>
<div class="wrapper">

    <nav>
        <div class="logo">
            Kitchen4All
        </div>
        <div class="menu">
            <ul>
                <li><a href="indexcliente.php">Home</a></li>
                <li><a class="active" href="pedidoscliente.php">Pedidos</a></li>
				<li><a href="perfilcliente.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
	<br>
	<br>
	<div class="container" style="width: 80%">
    <h1>Pedidos cliente</h1>
    <?php
    $query = "SELECT * FROM `prato`";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_array($result)){
        ?>
        <div class="col-md-4">
          <form method="post" action="pedidoscliente.php?action=add&id=<?php echo $row["idPrato"] ?>">
            <div class="prato">
              <h5 class="text-info"><?php echo $row["nomePrato"]; ?></h5>
              <h5 class="text-danger"><?php echo $row["valorPrato"]; echo "€" ?></h5>
              <input type="text" name="quantidade" class="form-control" value="1">
              <input type="hidden" name="hidden_name" value="<?php echo $row["nomePrato"]; ?>">
              <input type="hidden" name="hidden_price" value="<?php echo $row["valorPrato"]; ?>">
              <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-sucess" value="Adicionar">
            </div>
          </form>
        </div>
        <?php
      }
    }
    ?>
    <div style="clear: both"></div>
    <h3 class="title2">Detalhes de Encomenda</h3>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th width="30%">Nome Prato</th>
          <th width="10%">Quantidade</th>
          <th width="13%">Valor</th>
          <th width="10%">Total</th>
          <th width="17%">Remover Prato</th>
        </tr>
        <?php
        if(!empty($_SESSION["cart"])){
          $total = 0 ;
          foreach ($_SESSION["cart"] as $key => $value){
            ?>
            <tr>
              <td><?php echo $value["item_name"]; ?></td>
              <td><?php echo $value["item_quantity"]; ?></td>
              <td>€ <?php echo $value["product_price"]; ?></td>
              <td>€ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
              <td><a href="pedidoscliente.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger"><img border='0' alt='Apagar' src='img/delete.png' width='25' height='25'></span></a></td>
            </tr>
            <?php
            $total = $total + ($value["item_quantity"] * $value["product_price"]);
          }
          ?>
          <tr>
            <form action="encomenda.php" method="POST">
              <td colspan="3" align="right">Total</td>
              <th align="right">€ <?php echo number_format($total, 2); ?></th>
              <td><button type="submit" name="encomenda-submit" class="btn btn-success">Finalizar Encomenda</button></td>
            </form>
          </tr>
          <?php
          if (isset($_POST['add'])) {
            $_SESSION["nomePrato"] = $_SESSION["nomePrato"] . " | " . $value["item_name"] . " - " .$value["item_quantity"];
          }
          $_SESSION["valorTotalPrato"] = $total;
          // $_SESSION["quantidade"] = $value["item_quantity"];
        }
        ?>
      </table>
    </div>
  </div>
    <div class="footer">
        &copy; David Folgado e Tiago Manteigas
    </div>
</footer>
</body>
</html>
