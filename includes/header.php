<?
  require __DIR__.'/vendor/autoload.php';
  include './listagem.php';

  require_once '../index.php';

?>

<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../CSS/dev.ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php ('./CSS/styled.css'); ?>">

  <title>Controle de estoque</title>
</head>

<body class="d-flex flex-column bg-dark text-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
    <!-- <img src="./img/logo.svg" width="150" height="40" class="d-inline-block align-top" alt=""> -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse border-bottom" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="sobre.php">Sobre</a> -->
        </li>
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="text" name="busca" placeholder="Pesquisar vaga..." value="<?=$busca?>">
        <select class="custom-select mr-sm-2" name="status" id="">
          <option selected value="">Status da vaga</option>
          <option value="">Todas</option>
          <option value="s">Ativo</option>
          <option value="n">Inativo</option>
        </select>
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Pesquisar</button>
      </form> -->
    </div> 
  </nav>           

  <div class="container mb-3">
    <div class="jumbotron bg-primary">
      <h2>Sistema de controle de produtos</h2>
    </div>
  </div>

  <div class="container">
