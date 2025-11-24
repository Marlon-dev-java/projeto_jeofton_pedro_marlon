<?php
session_start();
include "conexao_banco_de_dados.php";

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['password'] ?? '');

    if ($email !== '' && $senha !== '') {
        $mensagem = 'Login realizado com sucesso! <br> Clique <a href="index.php">Aqui</a> para continuar.';
    } else {
        $mensagem = 'Preencha todos os campos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel de Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<section class="hero">
  <h2>AUTO UNI</h2>
  <p>SITE SIMPLES E PRÁTICO PARA ALUGUEL DE VEÍCULOS</p>
  <div class="nav-buttons">
    <div class="left-buttons">
      <a class="btn" href="index.php">Página Inicial</a>
      <a class="btn" href="quemsomos.php">Quem somos</a>
    </div>
    <div class="right-buttons">
      <a class="btn" href="painel_login.php">Login</a>
      <a class="btn" href="painel_criar_conta.php">Cadastre-se</a>
    </div>
  </div>
</section>

<section class="login-section">
  <div class="card">
    <h2>Entrar</h2>

    <?php if (!empty($mensagem)): ?>
      <div class="mensagem"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="post" action="painel_login.php">
      <div class="form-group">
        <label for="email" class="required">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password" class="required">Senha</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="btn-login">Entrar</button>
      <p class="register-text">Não tem conta? <a href="painel_criar_conta.php">Criar conta</a></p>
    </form>
  </div>
</section>
<footer class="footer">
  <div class="footer-content">
    <h2>Informações Adicionais</h2>
    <p>
      Agradecemos por visitar nosso site.<br>
      Se precisar ajuda em qualquer coisa, basta procurar a nossa equipe.<br>
      Entre em contato pelo WhatsApp ou envie um e-mail para agilizar seu atendimento, acesse abaixo
    </p>

    <div class="footer-buttons">
      <a href="https://mail.google.com/mail/u/0/?hl=pt-BR" class="btn">E-mail</a>
      <a href="https://wa.me/seunumerodetelefone" class="btn">WhatsApp</a>
    </div>

    <p class="footer-copy">© <?php echo date("Y"); ?> AUTO UNI</p>
  </div>
</footer>
</body>
</html>
