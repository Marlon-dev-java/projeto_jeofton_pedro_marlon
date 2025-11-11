<?php
$baseUrl = ''; 

$menu = [
  ['href' => 'index.php',     'label' => 'Página Inicial'],
  ['href' => 'quemsomos.php', 'label' => 'Quem Somos'],
];

$auth = [
  ['href' => 'registrese.php', 'label' => 'Registrar-se'],
  ['href' => 'painellogin.php','label' => 'Login'],
];

$veiculos = [
  [
    'imagem'    => 'assets/polotrack.png',
    'titulo'    => 'Volkswagen Polo Track 1.0 MPI',
    'descricao' => 'Veículo COMPACTO, Confortável e Econômico',
    'href'      => 'hatch.php'
  ],
  [
    'imagem'    => 'assets/sedan.png',
    'titulo'    => 'Honda CG 2000',
    'descricao' => 'Veículo COMPACTO, Confortável e Econômico',
    'href'      => 'sedan.php'
  ],
];

function is_active($href) {
  $atual = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  return $atual === $href ? 'aria-current="page"' : '';
}
?>