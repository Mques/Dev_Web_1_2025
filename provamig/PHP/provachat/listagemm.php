<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Livros</title>
</head>
<body>
  <h1>Livros Cadastrados</h1>

  <p>Usuário logado: <?php session_start();
  
  echo $_SESSION["login"]["nome"]  . " " . $_SESSION["login"]["email"]?></p>

  <table border="1">
    <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Gênero</th>
        <th>Preço (R$)</th>
        <th>Taxa (R$)</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      

      for($i=0; $i< count($_SESSION["login"]["cadastro"]);$i++){
        $taxa;
      $preco = $_SESSION["login"]["cadastro"][$i]["Preco"];
      if($preco<50){
        $taxa= $preco + $preco* 0.10;
      }
      if($preco>50 && $preco<150 ){
        $taxa= $preco + $preco* 0.25;
      }
        if($preco>150 ){
        $taxa= $preco + $preco* 0.15;
      }
      echo "<tr>";
      echo '<td>' .  $_SESSION["login"]["cadastro"][$i]["Titulo"] . '</td>';
      echo '<td>' .  $_SESSION["login"]["cadastro"][$i]["Autor"] . '</td>';
      echo '<td>' .  $_SESSION["login"]["cadastro"][$i]["Genero"] . '</td>';
      echo '<td>' .  $_SESSION["login"]["cadastro"][$i]["Preco"] . '</td>';
      echo '<td>' . $taxa . '</td>';
      echo "<tr>";
      
    }
     
      ?>
    </tbody>
  </table>

  <br>
  <a href="cadastroc.php">Cadastrar Novo Livro</a>
</body>

</html>
