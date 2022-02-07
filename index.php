
<?php

    include_once("conexao.php");
    $barras = isset($_POST['barcod'])?$_POST['barcod']:"";
    $msg = false;
    $linha = -1;
    if(isset($_FILES['arquivo'])){
      $extensao = strtolower( substr($_FILES['arquivo']['name'], -4));//pega a extensao do arquivo
      $novo_nome = md5(time()).$extensao;//define o nome do arquivo
      $diretorio = "upload/";//define o diretorio para onde enviaremos o arquivo

      move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$novo_nome);//efetua o upload
      $sql = "insert into arquivos (codigo,barras,arquivo,data)values (null,'$barras','$novo_nome', now())";
      $salvar = mysqli_query($conexao, $sql);
      $linha = mysqli_affected_rows($conexao);
      print $linha;
    }

?>
<!DOCTYPE html>
<html lang="pt br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Subir imagens</title>
  </head>
  <body>
    <div id="main">
      <form action="index.php" method="POST" enctype="multipart/form-data">
          <p>  Arquivo : <input type="file" name="arquivo" required></p><br>
          <p>Código: <input type="text" name="barcod" required placeholder="Obrigatório"></p><br>
          <p> <input type="submit" value="Salvar"></p><br>
      </form>    
      <?php
          if ($linha >= 1){       
            print'<script>window.alert("Upload feito com sucesso!")</script>';
          }else if ($linha == -1){
            print"";
          }
          print "<hr>";              
      ?>     
      <a href="verImagens.php">Consultar</a>
    </div>
  </body>
</html>