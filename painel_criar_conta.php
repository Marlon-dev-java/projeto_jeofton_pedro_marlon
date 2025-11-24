<?php
session_start();
include "conexao_banco_de_dados.php";

<<<<<<< HEAD
/* DEBUG (se quiser, pode remover depois) */
ini_set('display_errors', 1);
error_reporting(E_ALL);
=======
>>>>>>> 8cb72a7cf2b44ca560ab6919d24e7239fb1b9e59

$titulo_site   = 'AUTO UNI';
$subtitulo     = 'SITE DE ALUGUEL DE VEÍCULOS PARA ESTUDANTES DA UNIPÊ';
$min_senha     = 6;

$mensagem = '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome      = trim($_POST['nome']      ?? '');
  $sobrenome = trim($_POST['sobrenome'] ?? '');
  $idade     = trim($_POST['idade']     ?? '');
  $numero    = trim($_POST['numero']    ?? '');
  $email     = trim($_POST['email']     ?? '');
  $senha     = trim($_POST['senha']     ?? '');
  $senha2    = trim($_POST['senha2']    ?? '');

  if ($nome === '')        { $erros[] = 'Informe seu nome.'; }
  if ($sobrenome === '')   { $erros[] = 'Informe seu sobrenome.'; }
  if ($idade === '' || !is_numeric($idade)) {
    $erros[] = 'Informe uma idade válida.';
  }
  if ($numero === '')      { $erros[] = 'Informe seu número de contato.'; }
  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'Informe um e-mail válido.';
  }
  if (strlen($senha) < $min_senha) {
    $erros[] = "A senha deve ter pelo menos {$min_senha} caracteres.";
  }
  if ($senha !== $senha2) {
    $erros[] = 'As senhas não conferem.';
  }

  if (empty($erros)) {
<<<<<<< HEAD
    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Converte idade para inteiro
    $idade_int = (int)$idade;

    // Usando prepared statement (mais seguro e evita erro com aspas)
    $sql = "INSERT INTO usuarios (nome, sobrenome, idade, numero, email, senha)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssisss",
            $nome,
            $sobrenome,
            $idade_int,
            $numero,
            $email,
            $senha_hash
        );

        if (mysqli_stmt_execute($stmt)) {
            $mensagem = 'Conta criada com sucesso! Você já pode fazer login.
                         <br>Ir para <a href="painel_login.php">Login</a>.';
            // Limpa os campos após sucesso
            $nome = $sobrenome = $idade = $numero = $email = '';
        } else {
            $erros[] = 'Erro ao salvar no banco de dados: ' . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $erros[] = 'Erro ao preparar a consulta: ' . mysqli_error($conn);
    }
=======

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara INSERT
    $sql = "INSERT INTO usuarios (nome, sobrenome, idade, numero, email, senha)
        VALUES ('$nome', '$sobrenome', '$idade', '$numero', '$email', '$senha_hash')";

    if (mysqli_query($conn, $sql)) {
        $mensagem = 'Conta criada com sucesso! Você já pode fazer login.
                     <br>Ir para <a href="painel_login.php">Login</a>.';
    } else {
    $erros[] = 'Erro ao salvar no banco de dados: ' . mysqli_error($conn);
    }

>>>>>>> 8cb72a7cf2b44ca560ab6919d24e7239fb1b9e59
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Criar conta - <?= htmlspecialchars($titulo_site) ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<section class="hero">
  <h2><?= htmlspecialchars($titulo_site) ?></h2>
  <p><?= htmlspecialchars($subtitulo) ?></p>
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
  <div class="card" style="width: 360px;">
    <h2>Criar conta</h2>

    <?php if (!empty($erros)): ?>
      <div class="mensagem" style="color:#b00020;">
        <ul style="margin:0; padding-left:18px; text-align:left;">
          <?php foreach ($erros as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (!empty($mensagem)): ?>
      <div class="mensagem"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="post" action="painel_criar_conta.php">
      <div class="form-group">
        <label for="nome" class="required">Nome</label>
        <input type="text" id="nome" name="nome" 
               value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>" required>
      </div>

      <div class="form-group">
        <label for="sobrenome" class="required">Sobrenome</label>
        <input type="text" id="sobrenome" name="sobrenome"
               value="<?= isset($sobrenome) ? htmlspecialchars($sobrenome) : '' ?>" required>
      </div>

      <div class="form-group">
        <label for="idade" class="required">Idade</label>
        <input type="number" id="idade" name="idade" min="1" max="120"
               value="<?= isset($idade) ? htmlspecialchars($idade) : '' ?>" required>
      </div>

      <div class="form-group">
        <label for="numero" class="required">Número</label>
        <input type="tel" id="numero" name="numero" placeholder="(xx) xxxxx-xxxx"
               value="<?= isset($numero) ? htmlspecialchars($numero) : '' ?>" required>
      </div>

      <div class="form-group">
        <label for="email" class="required">E-mail</label>
        <input type="email" id="email" name="email"
               value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
      </div>

      <div class="form-group">
        <label for="senha" class="required">Senha</label>
        <input type="password" id="senha" name="senha" minlength="<?= (int)$min_senha ?>" required>
      </div>

      <div class="form-group">
        <label for="senha2" class="required">Confirmar senha</label>
        <input type="password" id="senha2" name="senha2" minlength="<?= (int)$min_senha ?>" required>
      </div>

      <button type="submit" class="btn-login">Criar conta</button>
      <p class="register-text">Já tem conta? <a href="painel_login.php">Entrar</a></p>
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
