<?php
// motos.php
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
  <p>ALUGUEL DE VEÍCULOS PARA ESTUDANTES UNIPÊ</p>
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
        <img src="assets/cg160.png" alt="Honda CG 160">
        <h3>Honda CG 160</h3>
        <p>ECONÔMICA, COMPACTA E CONFORTÁVEL</p>
        <a href="reserva.php?id_veiculo=5" class="btn car-btn">Alugar</a>
    </div>
    <div class="car-card">
        <img src="assets/xre300.png" alt="Honda XRE 300">
        <h3>Honda XRE 300</h3>
        <p>ECONÔMICA, COMPACTA E CONFORTÁVEL</p>
        <a href="reserva.php?id_veiculo=6" class="btn car-btn">Alugar</a>
    </div>
    <div class="car-card">
        <img src="assets/lander.png" alt="Yamaha Lander 250">
        <h3>Yamaha LANDER 250</h3>
        <p>ECONÔMICA, COMPACTA E CONFORTÁVEL</p>
        <a href="reserva.php?id_veiculo=7" class="btn car-btn">Alugar</a>
    </div>
    <div class="car-card">
        <img src="assets/gs.png" alt="BMW GS 310">
        <h3>BMW GS 310</h3>
        <p>ECONÔMICA, VELOZ E CONFORTÁVEL</p>
        <a href="reserva.php?id_veiculo=8" class="btn car-btn">Alugar</a>
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
