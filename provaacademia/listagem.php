<?php
// listagem.php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$email_usuario = $_SESSION['usuario']['email'];
$alunos = $_SESSION['alunos'][$email_usuario] ?? [];

function calcularDesconto($plano, $mensalidade) {
    switch ($plano) {
        case 'Trimestral': return $mensalidade * 0.05;
        case 'Semestral': return $mensalidade * 0.10;
        case 'Anual': return $mensalidade * 0.20;
        default: return 0;
    }
}
?>

<h2>Lista de Alunos Cadastrados</h2>
<p>Usuário logado: <?php echo $_SESSION['usuario']['email']; ?> | Idade: <?php echo $_SESSION['usuario']['idade']; ?></p>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Objetivo</th>
        <th>Plano</th>
        <th>Mensalidade</th>
        <th>Desconto</th>
    </tr>
    <?php foreach ($alunos as $aluno):
        $desconto = calcularDesconto($aluno['plano'], $aluno['mensalidade']);
    ?>
    <tr>
        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
        <td><?php echo htmlspecialchars($aluno['objetivo']); ?></td>
        <td><?php echo $aluno['plano']; ?></td>
        <td>R$ <?php echo number_format($aluno['mensalidade'], 2, ',', '.'); ?></td>
        <td>R$ <?php echo number_format($desconto, 2, ',', '.'); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>
<a href="cadastro.php">Cadastrar novo aluno</a>
