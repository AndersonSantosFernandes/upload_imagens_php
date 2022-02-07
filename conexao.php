<?php
  /*mysql_connect("localhost", "root", "");
  mysql_select_db("carrinho");
  */
  $hostname = "localhost";
  $user = "root";
  $password = "";
  $database = "upload_img";

  $conexao = mysqli_connect($hostname, $user, $password, $database);
  if(! $conexao){
    print "Ce é cavalo, é? Não conectou";
  }
?>

