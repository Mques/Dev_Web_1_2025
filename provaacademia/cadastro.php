<?php
// cadastro.php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_usuario = $_SESSION['usuario']['email'];

    $aluno = [
        'nome' => $_POST['nome'],
        'genero' => $_POST['genero'],
        'idade' => $_POST['idade'],
        'objetivo' => $_POST['objetivo'],
        'frequencia' => $_POST['frequencia'],
        'plano' => $_POST['plano'],
        'mensalidade' => floatval($_POST['mensalidade'])
    ];

    $_SESSION['alunos'][$email_usuario][] = $aluno;
    echo "<p>Aluno cadastrado com sucesso!</p>";
}
?>

<h2>Cadastro de Aluno</h2>
<p>Usuário logado: <?php echo $_SESSION['usuario']['email']; ?> | Idade: <?php echo $_SESSION['usuario']['idade']; ?></p>

<form method="POST">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Gênero:
        <select name="genero" required>
            <option>Masculino</option>
            <option>Feminino</option>
            <option>Outro</option>
        </select>
    </label><br>
    <label>Idade: <input type="number" name="idade" required></label><br>
    <label>Objetivo:
        <select name="objetivo" required>
            <option>Emagrecimento</option>
            <option>Hipertrofia</option>
            <option>Condicionamento</option>
            <option>Reabilitação</option>
            <option>Outros</option>
        </select>
    </label><br>
    <label>Frequência Semanal: <input type="number" name="frequencia" required></label><br>
    <label>Plano:
        <select name="plano" required>
            <option>Mensal</option>
            <option>Trimestral</option>
            <option>Semestral</option>
            <option>Anual</option>
        </select>
    </label><br>
    <label>Mensalidade: <input type="number" name="mensalidade" step="0.01" required></label><br>
    <button type="submit">Cadastrar</button>
</form>

<hr>
<a href="listagem.php">Ir para listagem de alunos</a>
