<?php
// login.php
session_start();

$usuarios = [
    [
        'email' => 'teste@academia.com',
        'nome' => 'João',
        'senha' => '1234',
        'data_nascimento' => '1990-06-04'
    ],
    [
        'email' => 'ana@academia.com',
        'nome' => 'Ana',
        'senha' => 'abcd',
        'data_nascimento' => '1985-12-20'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
            $nascimento = new DateTime($usuario['data_nascimento']);
            $hoje = new DateTime();
            $idade = $nascimento->diff($hoje)->y;

            $_SESSION['usuario'] = [
                'nome' => $usuario['nome'],
                'email' => $usuario['email'],
                'idade' => $idade
            ];

            header('Location: listagem.php');
            exit;
        }
    }

    echo "<p>Login inválido!</p>";
}
?>

<h2>Login</h2>
<form method="POST">
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <button type="submit">Entrar</button>
</form>

<hr>
<a href="cadastro.php">Ir para cadastro de aluno</a>
