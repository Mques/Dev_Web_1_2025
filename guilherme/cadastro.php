<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Veículo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #4285f4;
      font-weight: bold;
    }

    nav a:hover {
      color: #357ae8;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 32px;
      height: 32px;
      background-color: #4285f4;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    main {
      padding: 20px;
    }

    form input, form select {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 300px;
    }

    button {
      padding: 10px 20px;
      background-color: #4285f4;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>  
<header>
    <nav>
      <a href="login.php">Cadastro</a>
      <a href="listagem.php">Listagem</a>
    </nav>
    <h2>Locadora</h2>
    <div class="user-info">
      <span><?php print_r($_SESSION["login"]["nome"]."(".$_SESSION["login"]["email"].")"); ?></span>
      <div class="user-avatar">U</div>
    </div>
  </header>

  <main>
    <h2>Cadastro de Veículo</h2>
    <form method="post">
      <input name="modelo"placeholder="Modelo do veículo" required>
      <select name="montadora"required>
        <option disabled selected>Montadora</option>
        <option>Honda</option><option>Chevrolet</option><option>Peugeot</option>
        <option>Volkswagen</option><option>Fiat</option><option>Toyota</option>
        <option>BYD</option><option>Outros</option>
      </select>
      <select name="motor"required>
        <option disabled selected>Tipo de motor</option>
        <option>1.0</option><option>1.4</option><option>1.6</option>
        <option>2.0</option><option>Elétrico</option><option>Outros</option>
      </select>
      <select name="combustivel" required>
        <option disabled selected>Tipo de combustível</option>
        <option>Flex</option><option>Gasolina</option><option>Álcool</option>
        <option>Diesel</option><option>Elétrico</option>
      </select>
      <input name="lugares"type="number" placeholder="Número de lugares" required>
      <input name="litragem" type="number" placeholder="Litragem do bagageiro" required>
      <input name="preço" type="number" placeholder="Preço do veículo" required>
      <button type="submit">Cadastrar</button>
    </form>
  </main>
    <?php
if (!(isset($_SESSION["veiculos"]))) {
    $_SESSION["veiculos"] = [];
}
$email=$_SESSION["login"]["email"];
if (!isset($_SESSION["veiculos"][$email])) {
    $_SESSION["veiculos"][$email] = [];
}

if (isset($_POST["modelo"]) && !empty($_POST["modelo"])) {
    $mv = $_POST["modelo"];
    $mon = $_POST["montadora"];
    $tipoM = $_POST["motor"];
    $tipoC = $_POST["combustivel"];
    $numl = $_POST["lugares"]; 
    $litragem = $_POST["litragem"];
    $preço = $_POST["preço"];

    $veiculo = [
        "modelo" => $mv,
        "montadora" => $mon,
        "motor" => $tipoM,
        "combustivel" => $tipoC,
        "lugares" => $numl,
        "litragem" => $litragem,
        "preço" => $preço
    ];
    $_SESSION["veiculos"][$email][]=$veiculo;
    print_r( $_SESSION["veiculos"][$email]);

}

?>

  
</body>
</html>
