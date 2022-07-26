<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga{

  /**
   * Identificador único da vaga
   * @var integer
   */
  public $id;

  /**
   * Título da vaga
   * @var string
   */
  public $titulo;

  /**
   * Quantidade produto
   * @var string
   */
  public $quantidade;

  /**
   * Preço do produto
   * @var string
   */
  public $preco;

  /**
   * Tamanho do produto
   * @var string
   */
  public $tamanho;

  /**
   * Data de publicação da vaga
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar uma nova vaga no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A VAGA NO BANCO
    $obDatabase = new Database('vagas');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'quantidade'    => $this->quantidade,
                                      'preco' => $this->preco,
                                      'tamanho' => $this->tamanho,
                                      'data'      => $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a vaga no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('vagas'))->update('id = '.$this->id,[
                                                                'titulo'    => $this->titulo,
                                                                'quantidade'    => $this->quantidade,
                                                                'preco' => $this->preco,
                                                                'tamanho' => $this->tamanho,
                                                                'data'      => $this->data
                                                              ]);
  }

  /**
   * Método responsável por excluir a vaga do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('vagas'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as vagas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getVagas($where = null, $order = null, $limit = null){
    return (new Database('vagas'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

 /**
   * Método responsável por obter as vagas do banco de dados
   * @param string $where
   * @return integer
   */
 public static function getQuantidadeVagas($where = null){
   return (new Database('vagas'))->select($where,null,null,'COUNT(*) as qtd')
                                 ->fetchObject()
                                 ->qtd;
 }

  /**
   * Método responsável por buscar uma vaga com base em seu ID
   * @param  integer $id
   * @return Vaga
   */
  public static function getVaga($id){
    return (new Database('vagas'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}