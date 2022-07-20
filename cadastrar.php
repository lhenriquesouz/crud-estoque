<?php

require __DIR__.'/vendor/autoload.php';

define ('TITLE','Cadastrar Produto');

use \App\Entity\Vaga;
$obVaga = new Vaga;

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'], $_POST['quantidade'], $_POST['preco'], $_POST['tamanho'])){

  $obVaga->titulo = $_POST['titulo'];
  $obVaga->quantidade = $_POST['quantidade'];
  $obVaga->tamanho = $_POST['tamanho'];
  $obVaga->preco = $_POST['preco'];
  $obVaga->cadastrar();

  header('location: index.php?status=success');
  exit;

//  echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
}  

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

