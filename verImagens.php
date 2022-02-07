<?php
include_once("conexao.php");

  $codbar = isset($_POST['codbarra'])?$_POST['codbarra']:"";
 
  if (empty($_POST['codbarra'])){
       $sql = "select * from arquivos ";  
       $buscar = mysqli_query($conexao, $sql);
       $linhas = mysqli_affected_rows($conexao);
  }else{
       $sql = "select * from arquivos where barras = '$codbar' ";
       $buscar = mysqli_query($conexao, $sql);
       $linhas = mysqli_affected_rows($conexao);
       print $linhas;
  }
  
  
  
?>
<!DOCTYPE html>
<html lang="pt br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Buscar Imagens</title>
</head>
<body>
  <div id="main">
<a href="index.php">Voltar</a><br>

    <form method="POST" action="">
      <fieldset>
          <input type="text" name="codbarra" id="" placeholder="Código" autofocus>
          <input type="submit" value="Procurar">
      </fieldset>
    </form>

      <?php
          if ($linhas == -1){
            print "<h1>Banco de dados vazio</h1>";
          }else if ($linhas == 0){
              print"<h2>Nenhum arquivo associado com o código $codbar</h2><br>";
          }else {          
          
            while($exibir = mysqli_fetch_array($buscar)){

              $codigo = $exibir[0];
              $barra = $exibir[1];
              $arquivo = $exibir[2];
              $data = $exibir[3]; 
              
              print '
              <div class="fotos">
                 ID:'. $codigo .'<br>
                 
                 <a href="upload/'.$arquivo.'" target="blank"><img src="upload/'.$arquivo.'" alt=""></a>
                 Data'. $data.' <br>
              </div>';
            
                          
            }
          }         
      ?>
  <a href="index.php">Voltar</a>
  </div>
</body>
</html>