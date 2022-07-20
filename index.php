<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;


//Busca
$busca =  filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//Busca pelo status
$filtroStatus =  filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';

$filtroData = filter_input_array(INPUT_GET, 'filtroData', );


//Condições SQL
$condicoes = [
  strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%',$busca).'%"' : null,
  strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null,
];

//Remove posições vazias
$condicoes = array_filter($condicoes);

//Clausula Where
$where = implode(' AND ', $condicoes);

//Quantidade total de vagas
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//PAGINAÇÂO
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 5);

// echo "<pre>"; print_r($vagas); echo "</pre>"; 

$vagas = Vaga::getVagas($where,null, $obPagination->getLimit());
//  echo "<pre>"; print_r($vagas); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';



?>