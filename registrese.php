<?php $title = "AutoUni - Registrar-se"; include __DIR__ . "/includes/header.php"; ?>
<div class="login-container">
  <h2>Crie sua Conta</h2>
  <form class="login-form" method="post" action="salvar_usuario.php">
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Senha</label>
    <input type="password" name="senha" required>
    <label>CPF</label>
    <input type="text" name="cpf" required>
    <label>Telefone</label>
    <input type="tel" name="telefone" required>
    <label>CEP</label>
    <input type="text" name="cep">
    <label>Endereço</label>
    <input type="text" name="endereco" required>
    <label>Idade</label>
    <input type="number" name="idade" min="18" required>
    <label>Categoria CNH</label>
    <select name="cnh" required>
      <option value="">Selecione</option>
      <option value="A">A (Moto)</option>
      <option value="B">B (Carro)</option>
      <option value="AB">AB (Carro e Moto)</option>
      <option value="C">C (Caminhão)</option>
    </select>
    <br>
    <label style="display:flex;align-items:center;gap:8px;">
      <input type="checkbox" name="termo" required> Confirmo que preenchi os dados corretamente e desejo prosseguir.
    </label>
    <button type="submit">Criar Conta</button>
  </form>
  <p class="register-text">Já tem conta? <a href="/painellogin.php">Logue-se</a></p>
</div>
<?php include __DIR__ . "/includes/footer.php"; ?>
