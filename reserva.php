<?php
session_start();
include "conexao_banco_de_dados.php";

$titulo_site   = 'AUTO UNI';
$subtitulo     = 'ALUGUEL DE VEÍCULOS PARA ESTUDANTES UNIPÊ';

$mensagem = '';
$erros = [];

ini_set('display_errors', 1);
error_reporting(E_ALL);

$id_veiculo = 0;
if (isset($_POST['id_veiculo'])) {
    $id_veiculo = (int) $_POST['id_veiculo'];
} elseif (isset($_GET['id_veiculo'])) {
    $id_veiculo = (int) $_GET['id_veiculo'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nome        = trim($_POST['nome']       ?? '');
  $telefone    = trim($_POST['telefone']   ?? '');
  $email       = trim($_POST['email']      ?? '');
  $data_inicio = trim($_POST['data_inicio']?? '');
  $data_fim    = trim($_POST['data_fim']   ?? '');

  $id_usuario = $_SESSION['usuario_id'] ?? null;

  if ($nome === '')      { $erros[] = 'Informe seu nome.'; }
  if ($telefone === '')  { $erros[] = 'Informe seu telefone.'; }
  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'Informe um e-mail válido.'; }
  if ($data_inicio === '') { $erros[] = 'Informe a data de início da reserva.'; }
  if ($data_fim === '')    { $erros[] = 'Informe a data de término da reserva.'; }
  if ($id_veiculo <= 0)    { $erros[] = 'Veículo não informado.'; }

  if (empty($erros)) {

    $modeloVeiculo = null;
    $sqlModelo = "SELECT modelo FROM veiculos WHERE id = ? LIMIT 1";
    $stmtModelo = mysqli_prepare($conn, $sqlModelo);

    if ($stmtModelo) {
        mysqli_stmt_bind_param($stmtModelo, "i", $id_veiculo);
        mysqli_stmt_execute($stmtModelo);
        mysqli_stmt_bind_result($stmtModelo, $modeloVeiculo);
        mysqli_stmt_fetch($stmtModelo);
        mysqli_stmt_close($stmtModelo);
    }

    if ($modeloVeiculo === null) {
        $modeloVeiculo = 'Veículo desconhecido';
    }

    $sql = "INSERT INTO reservas
              (id_usuario, id_veiculo, modelo_veiculo, nome, telefone, email, data_inicio, data_fim, data_reserva)
            VALUES
              (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
      mysqli_stmt_bind_param(
        $stmt,
        "iissssss",
        $id_usuario,
        $id_veiculo,
        $modeloVeiculo,
        $nome,
        $telefone,
        $email,
        $data_inicio,
        $data_fim
      );

      if (mysqli_stmt_execute($stmt)) {

        $_SESSION['reserva_nome']  = $nome;
        $_SESSION['reserva_email'] = $email;

        mysqli_stmt_close($stmt);
        header('Location: reservado.php');
        exit;

      } else {
        $erros[] = 'Erro ao salvar reserva no banco de dados: ' . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
      }
    } else {
      $erros[] = 'Erro ao preparar consulta: ' . mysqli_error($conn);
    }
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

    <?php if (!empty($mensagem)): ?>
      <div class="mensagem"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="post" action="reserva.php?id_veiculo=<?= (int)$id_veiculo ?>">

      <input type="hidden" name="id_veiculo" value="<?= (int)$id_veiculo ?>">

      <div class="form-group">
        <label class="required">Nome</label>
        <input type="text" name="nome"
               value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Telefone</label>
        <input type="tel" name="telefone" placeholder="(xx) xxxxx-xxxx"
               value="<?= isset($telefone) ? htmlspecialchars($telefone) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">E-mail</label>
        <input type="email" name="email"
               value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Data de início</label>
        <input type="date" name="data_inicio"
               value="<?= isset($data_inicio) ? htmlspecialchars($data_inicio) : '' ?>" required>
      </div>

      <div class="form-group">
        <label class="required">Data de término</label>
        <input type="date" name="data_fim"
               value="<?= isset($data_fim) ? htmlspecialchars($data_fim) : '' ?>" required>
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
