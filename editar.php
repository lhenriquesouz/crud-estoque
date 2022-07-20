<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar vaga');

use \App\Entity\Vaga;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['quantidade'],$_POST['preco'],$_POST['tamanho'])){

  $obVaga->titulo    = $_POST['titulo'];
  $obVaga->quantidade    = $_POST['quantidade'];
  $obVaga->tamanho    = $_POST['tamanho'];
  $obVaga->preco = $_POST['preco'];
  $obVaga->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
