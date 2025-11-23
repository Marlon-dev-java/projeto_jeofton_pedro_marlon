<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem Somos - AUTO UNI</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="hero">
  <h2>AUTO UNI</h2>
  <p>SITE DE ALUGUEL DE VEÍCULOS PARA ESTUDANTES DA UNIPÊ</p>

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
  <div class="card" style="max-width: 600px;">
    <h2>Reserva Realizada</h2>
    <p>
      <strong>ESTE VEÍCULO FOI RESERVADO COM SUCESSO! AGUARDE MAIS INFORMAÇÕES NO SEU EMAIL, COMO LOCAL DE RETIRADA E PAGAMENTO DAS DIÁRIAS! VOLTE SEMPRE!</strong>
    </p>
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
