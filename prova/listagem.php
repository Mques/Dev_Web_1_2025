<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login.php");
  exit;
}

$veiculos = $_SESSION["veiculos"][$_SESSION["email"]] ?? [];

function calcularImposto($preco, $combustivel) {
  if ($preco <= 100000) {
    if ($combustivel == 'Diesel') return $preco * 0.20;
    if ($combustivel == 'Elétrico') return $preco * 0.25;
    return $preco * 0.30;
  } elseif ($preco <= 200000) {
    if ($combustivel == 'Diesel') return $preco * 0.25;
    if ($combustivel == 'Elétrico') return $preco * 0.30;
    return $preco * 0.35;
  }
  return $preco * 0.40;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Veículos</title>
</head>
<body>
  <h2>Veículos Cadastrados</h2>
  <p>Usuário: <?= $_SESSION["email"] ?></p>
  <table border="1">
    <tr>
      <th>Modelo</th><th>Montadora</th><th>Combustível</th><th>Preço</th><th>Imposto</th>
    </tr>
    <?php foreach ($veiculos as $v): ?>
      <tr>
        <td><?= $v['modelo'] ?></td>
        <td><?= $v['montadora'] ?></td>
        <td><?= $v['combustivel'] ?></td>
        <td><?= number_format($v['preco'], 2, ',', '.') ?></td>
        <td><?= number_format(calcularImposto($v['preco'], $v['combustivel']), 2, ',', '.') ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
