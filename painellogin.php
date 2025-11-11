<?php $title = "AutoUni - Login"; include __DIR__ . "/includes/header.php"; ?>
<div class="login-container">
  <h2>Login</h2>
  <form class="login-form" method="post" action="autenticar.php">
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Senha</label>
    <input type="password" name="senha" required>
    <button type="submit">Entrar</button>
  </form>
  <p class="register-text">Não tem conta? <a href="/registrese.php">Registre-se</a></p>
</div>
<?php include __DIR__ . "/includes/footer.php"; ?>
