<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Locadora</title>
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

    main {
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 300px;
    }

    form input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 10px;
      background-color: #4285f4;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    form button:hover {
      background-color: #357ae8;
    }
  </style>
</head>
<body>
  <header>
    <h2>Locadora</h2>
  </header>

  <main>
    <form>
      <h2>Login</h2>
      <input type="email" placeholder="E-mail" required>
      <input type="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
  </main>

	<?php
session_start();


            $usuarios = [
    [
        'nome' => 'Marques',
        'email' => 'bemagarao@gmail.com',
        'senha' => 'bemagarao09'
    ],
    [
        'nome' => 'Pietro',
        'email' => 'pipi@yahoo.com',
        'senha' => 'pietrinho'
    ],
    [
        'nome' => 'Guilherme',
        'email' => 'gaylherme@hotmail.com',
        'senha' => 'guigui'
    ]
];

            if (isset($post["usuario"]) && !empty ($post ["usuario"]) && isset($post["senha"]) && !empty ($post ["senha"]))
{
	foreach($usuarios as $usuario)
		   $_SESSION["login"] == $_POST["email"] ) {
}
}



?>

</body>
</html>