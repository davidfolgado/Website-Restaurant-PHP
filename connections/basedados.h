<?php
$hostname_conn = "localhost";
$database_conn = "20170991";
$username_conn = "root";
$password_conn = "";

// Conectamos ao nosso servidor MySQL
if(!($conn = mysqli_connect($hostname_conn,$username_conn,$password_conn,$database_conn))) 
{
   echo "Erro ao conectar ao MySQL.";
   exit;
}
