<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_SESSION["veiculos"])) {
  $_SESSION["veiculos"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $veiculo = [
    'modelo' => $_POST['modelo'],
    'montadora' => $_POST['montadora'],
    'motor' => $_POST['motor'],
    'combustivel' => $_POST['combustivel'],
    'lugares' => $_POST['lugares'],
    'bagageiro' => $_POST['bagageiro'],
    'preco' => $_POST['preco']
  ];

  $_SESSION["veiculos"][$_SESSION["email"]][] = $veiculo;
  $mensagem = "Veículo cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Veículo</title>
</head>
<body>
  <h2>Cadastro de Veículo</h2>
  <p>Usuário: <?= $_SESSION["email"] ?></p>
  <?php if (!empty($mensagem)) echo "<p style='color:green;'>$mensagem</p>"; ?>
  <form method="post" action="">
    <input name="modelo" placeholder="Modelo" required><br>
    <select name="montadora" required>
      <option value="">Montadora</option>
      <option>Honda</option><option>Chevrolet</option><option>Peugeot</option>
      <option>Volkswagen</option><option>Fiat</option><option>Toyota</option>
      <option>BYD</option><option>Outros</option>
    </select><br>
    <select name="motor" required>
      <option value="">Tipo de motor</option>
      <option>1.0</option><option>1.4</option><option>1.6</option>
      <option>2.0</option><option>Elétrico</option><option>Outros</option>
    </select><br>
    <select name="combustivel" required>
      <option value="">Tipo de combustível</option>
      <option>Flex</option><option>Gasolina</option><option>Álcool</option>
      <option>Diesel</option><option>Elétrico</option>
    </select><br>
    <input type="number" name="lugares" placeholder="Número de lugares" required><br>
    <input type="number" name="bagageiro" placeholder="Litragem do bagageiro" required><br>
    <input type="number" name="preco" placeholder="Preço do veículo" required><br>
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
