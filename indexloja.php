<?php $title = "AutoUni - Loja"; include __DIR__ . "/includes/header.php"; ?>
<div class="card-container">
<?php
$veiculos = [
  ['img' => 'mobi.jpeg', 'nome' => 'Mobi', 'preco' => 237.00],
  ['img' => 'byd.jpeg', 'nome' => 'BYD Dolphin', 'preco' => 480.00],
  ['img' => 'hb.jpeg', 'nome' => 'HB20', 'preco' => 390.00],
  ['img' => 'onix.jpeg', 'nome' => 'Onix', 'preco' => 240.00],
  ['img' => 'virtus.jpeg', 'nome' => 'Virtus', 'preco' => 350.00],
  ['img' => 'download.jpeg', 'nome' => 'Chevette', 'preco' => 178.90],
];
foreach ($veiculos as $v):
?>
  <div class="card">
    <img src="/assets/<?php echo htmlspecialchars($v['img']); ?>" alt="<?php echo htmlspecialchars($v['nome']); ?>" />
    <div class="info">
      <h3><?php echo htmlspecialchars($v['nome']); ?></h3>
      <p>Veículo alugado para estudantes, no valor de R$ <?php echo number_format($v['preco'], 2, ',', '.'); ?> por dia.</p>
      <button>Alugar</button>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php include __DIR__ . "/includes/footer.php"; ?>
