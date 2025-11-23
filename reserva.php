<?php
session_start();

$titulo_site   = 'AUTO UNI';
$subtitulo     = 'RESERVA DE VEÍCULOS PARA ESTUDANTES DA UNIPÊ';

$mensagem = '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nome_completo = trim($_POST['nome_completo'] ?? '');
  $numero        = trim($_POST['numero']        ?? '');
  $email         = trim($_POST['email']         ?? '');

  $cidade        = trim($_POST['cidade']        ?? '');
  $estado        = trim($_POST['estado']        ?? '');
  $bairro        = trim($_POST['bairro']        ?? '');
  $cep           = trim($_POST['cep']           ?? '');

  // Validações
  if ($nome_completo === '') { $erros[] = 'Informe seu nome completo.'; }
  if ($numero === '')        { $erros[] = 'Informe seu número para contato.'; }
  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'Informe um e-mail válido.';
  }

  if ($cidade === '')  { $erros[] = 'Informe sua cidade.'; }
  if ($estado === '')  { $erros[] = 'Informe seu estado.'; }
  if ($bairro === '')  { $erros[] = 'Informe seu bairro.'; }
  if ($cep === '')     { $erros[] = 'Informe seu CEP.'; }

  // Se não houver erros, redireciona para reservado.php
  if (empty($erros)) {
    // Se quiser, pode guardar os dados em sessão para usar em reservado.php
    // $_SESSION['reserva'] = $_POST;

    header('Location: reservado.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reserva de Veículo - <?= htmlspecialchars($titulo_site) ?></title>
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
  <div class="card" style="width: 380px;">
    <h2>Reserva de veículo</h2>

    <?php if (!empty($erros)): ?>
      <div class="mensagem" style="color:#b00020;">
        <ul style="margin:0; padding-left:18px; text-align:left;">
          <?php foreach ($erros as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="post" action="reserva.php">

      <div class="form-group">
        <label class="required">Nome completo</label>
        <input type="text" name="nome_completo"
               value="<?= isset($nome_completo) ? htmlspecialchars($nome_completo) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Número para contato</label>
        <input type="tel" name="numero" placeholder="(xx) xxxxx-xxxx"
               value="<?= isset($numero) ? htmlspecialchars($numero) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">E-mail</label>
        <input type="email" name="email"
               value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Cidade</label>
        <input type="text" name="cidade"
               value="<?= isset($cidade) ? htmlspecialchars($cidade) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Estado</label>
        <input type="text" name="estado"
               value="<?= isset($estado) ? htmlspecialchars($estado) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Bairro</label>
        <input type="text" name="bairro"
               value="<?= isset($bairro) ? htmlspecialchars($bairro) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">CEP</label>
        <input type="text" name="cep" placeholder="xxxxx-xxx"
               value="<?= isset($cep) ? htmlspecialchars($cep) : '' ?>" required>
      </div>

      <button type="submit" class="btn-login">Confirmar reserva</button>

    </form>
  </div>
</section>

<footer class="footer">
  <div class="footer-content">
    <h2>Informações Adicionais</h2>
    <p>
      Agradecemos por reservar com a AUTO UNI.<br>
      Em caso de dúvidas, fale com nossa equipe.<br>
    </p>

    <div class="footer-buttons">
      <a href="https://mail.google.com/mail/u/0/?hl=pt-BR" class="btn">E-mail</a>
      <a href="https://wa.me/seunumerodetelefone" class="btn">WhatsApp</a>
    </div>

    <p class="footer-copy">© <?= date("Y"); ?> AUTO UNI</p>
  </div>
</footer>
</body>
</html>
