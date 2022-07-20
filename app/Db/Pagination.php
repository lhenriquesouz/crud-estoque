<?php

namespace App\Db;

class Pagination{

  //numero máximo de registros por pagina
  private $limit;

  //Quantidade total de resultados do banco
  private $results;

  //Quantidade de paginas
  private $pages;

  //pagina atual
  private $currentPage;
  
  /**
   * Construtor da classe
   * @param integer $results
   * @param integer $currentPage
   * @param integer $limit
   */
  public function __construct($results,$currentPage = 1, $limit = 10)
  {
    $this->results = $results;
    $this->limit = $limit;
    $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
    $this->calculate();
  }

  /**
   * Método responsável por calcular a páginação
   * @return void
   */
  private function calculate(){
    //Calcula o total de paginas
    $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

    //verifica se a pagina atual não excede o numero de paginas
    $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
  }

  /**
   * Método responsável por retornar a clásula limit da SQL
   * @return string
   */
  public function getLimit(){
    $offset = ($this->limit * ($this->currentPage - 1));
    return $offset.','.$this->limit;
  }

  /**
   * Método responsavel por retornar as opções de páginas disponbveis
   * @return array
   */
  public function getPages(){
    //Não retorna paginas
    if($this->pages == 1) return [];

    //Paginas
    $paginas = [];
    for($i = 1; $i <= $this->pages; $i++){ 
      $paginas[] = [
        'pagina' => $i,
        'atual' => $i == $this->currentPage
      ];
    }
    return $paginas;
  }
  
}