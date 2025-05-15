<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Livro</title>
</head>
<body>
  <h1>Cadastro de Livro</h1>

  <p>Usuário logado: <?php session_start();
  
  echo $_SESSION["login"]["nome"]  . " " . $_SESSION["login"]["email"]?></p>

  <form  method="post">
    <label for="titulo">Título do Livro:</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="autor">Autor:</label><br>
    <input type="text" id="autor" name="autor" required><br><br>

    <label for="genero">Gênero:</label><br>
    <select id="genero" name="genero">
      <option>Romance</option>
      <option>Ficção Científica</option>
      <option>Biografia</option>
      <option>Fantasia</option>
      <option>Terror</option>
      <option>Técnico</option>
      <option>Outros</option>
    </select><br><br>

    <label for="ano">Ano de Publicação:</label><br>
    <input type="number" id="ano" name="ano" required><br><br>

    <label for="paginas">Número de Páginas:</label><br>
    <input type="number" id="paginas" name="paginas" required><br><br>

    <label for="idioma">Idioma:</label><br>
    <select id="idioma" name="idioma">
      <option>Português</option>
      <option>Inglês</option>
      <option>Espanhol</option>
      <option>Francês</option>
      <option>Outros</option>
    </select><br><br>

    <label for="preco">Preço de Venda Sugerido (R$):</label><br>
    <input type="number" step="0.01" id="preco" name="preco" required><br><br>

    <button type="submit">Cadastrar Livro</button>
  </form>

  <br>
  <a href="listagem.html">Ir para a Listagem de Livros</a>
  <?php 
    if(isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["genero"]) && isset($_POST["ano"]) && isset($_POST["paginas"]) && isset($_POST["idioma"]) && isset($_POST["preco"]))
    {
      $livros = 
      [
        "Titulo" => $_POST["titulo"],
        "Autor"  => $_POST["autor"],
        "Genero" => $_POST["genero"],
        "Ano" => $_POST["ano"],
        "Paginas" => $_POST["paginas"],
        "Idiomas" => $_POST["idioma"],
        "Preco" => $_POST["preco"],
      ];
    $_SESSION["login"]["cadastro"][] = $livros;
      header("Location: listagemm.php");
      exit;
    }
  
  
  ?>
</body>
</html>
