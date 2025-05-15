<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Biblioteca Virtual</title>
</head>
<body>
  <h1>Login do Bibliotecário</h1>
  <form method="post">
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required><br><br>

    <button type="submit">Entrar</button>
  </form>
<?php 
 session_start();
 $usuarios = 
 [
  [
   "nome" => "Miguel", 
   "email" => "miguel@gmail.com",
   "senha" => "Miguel"
  ],
  [
    "nome" => "Marques", 
   "email" => "marques@gmail.com",
   "senha" => "Marques"
  ]
  ];

 if(isset($_POST["email"]) && isset($_POST["senha"]))
 {
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  
  for($i=0; $i < count ($usuarios) ; $i++)
  {
    if($email == $usuarios[$i]["email"] && $senha == $usuarios[$i]["senha"]){
      $_SESSION["login"] =[

        "email" =>$usuarios[$i]["email"],
        "nome" =>$usuarios[$i]["nome"],
        
      ];
      header("Location: cadastroc.php");
      break;
    }
  }
 }
?>
</body>


</html>
