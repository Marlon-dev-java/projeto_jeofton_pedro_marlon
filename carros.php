<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AUTO UNI</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="hero">
  <h2>AUTO UNI</h2>
  <p>SITE DE ALUGUEL DE VEICULOS PARA ESTUDANTES DA UNIPÊ</p>
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
<div class="catalogo">
    <div class="car-card">
        <img src="assets/polotrack.png" alt="Carro 1">
        <h3>Volkswagen Polo Track 1.0</h3>
        <p>ECONÔMICO, CONFORTÁVEL E SEGURO!</p>
        <h3>R$ 102,83 - POR DIA</h3>
        <br>
        <a href="reserva.php" class="btn car-btn">Alugar</a>
    </div>
        <div class="car-card">
        <img src="assets/onixlt.png" alt="Carro 2">
        <h3>Chevrolet Ônix 1.0</h3>
        <p>ECONÔMICO, COMPACTO E ESPAÇOSO!</p>
        <h3>R$ 122,33 - POR DIA</h3>
        <br>
        <a href="reserva.php" class="btn car-btn">Alugar</a>
    </div>
        <div class="car-card">
        <img src="assets/onixplus.png" alt="Carro 2">
        <h3>Chevrolet Ônix 1.0</h3>
        <p>ECONÔMICO, COMPACTO E ESPAÇOSO!</p>
        <h3>R$ 158,90 - POR DIA</h3>
        <br>
        <a href="reserva.php" class="btn car-btn">Alugar</a>
    </div>
    <div class="car-card">
        <img src="assets/hb20s.png" alt="Carro 2">
        <h3>Hyundai HB20S</h3>
        <p>ECONÔMICO, COMPACTO E ESPAÇOSO!</p>
        <h3>R$ 145,55 - POR DIA</h3>
        <br>
        <a href="reserva.php" class="btn car-btn">Alugar</a>
    </div>
</div>
<footer class="footer">
  <div class="footer-content">
    <h2>Informações Adicionais</h2>
    <p>
      Agradecemos por visitar nosso site.<br>
      Se precisar ajuda em qualquer coisa, basta procurar a nossa equipe.<br>
      Entre em contato pelo WhatsApp ou envie um e-mail para agilizar seu atendimento.
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
