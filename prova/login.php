<?php
session_start();

$usuarios = [
  ['nome' => 'Marques', 'email' => 'bemagarao@gmail.com', 'senha' => 'bemagarao09'],
  ['nome' => 'Pietro', 'email' => 'pipi@yahoo.com', 'senha' => 'pietrinho'],
  ['nome' => 'Guilherme', 'email' => 'gaylherme@hotmail.com', 'senha' => 'guigui']
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $_POST['email'] && $usuario['senha'] === $_POST['senha']) {
      $_SESSION['nome'] = $usuario['nome'];
      $_SESSION['email'] = $usuario['email'];
      header("Location: cadastro.php");
      exit;
    }
  }
  $erro = "E-mail ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Locadora</title>
</head>
<body>
  <h2>Login</h2>
  <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
  <form method="post" action="">
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
  </form>
</body>
</html>
