<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }
  
  

  $resultados = '';
  foreach($vagas as $vaga){
    $resultados .= '<tr>  
                      <td>'.$vaga->titulo.'</td>
                      <td>'.$vaga->quantidade.'</td>
                      <td>'.$vaga->tamanho.'</td>
                      <td>'.$vaga->preco.'</td>
                      <td>'.date('d/m/Y',strtotime($vaga->data)).'</td>
                      <td>
                        <a href="editar.php?id='.$vaga->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$vaga->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum produto encontrado
                                                       </td>
                                                    </tr>';

  //GETS
  unset($_GET['status']);
  unset($_GET['pagina']);
  $gets = http_build_query($_GET);

  //PAGINAÇÂO                                                  
  $paginacao = '';
  $paginas = $obPagination->getPages();
  foreach($paginas as $key=>$pagina){
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    $paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
                  <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
                  </a>';
  }
  
?>
<main>

  <?=$mensagem?>

  <section>
  <form class="form-inline my-2 my-lg-0" method="get">
    <input type="text" class="form-control" placeholder="Pesquisar produto..." name="busca" value="<?=$busca?>">
    <label for="" class="ml-3">Data inicio</label>
    <input class="ml-2 form-control" type="date" name="data_inicio">
    <label for="" class="ml-3">Data Fim</label>
    <input class="ml-2 form-control" type="date" name="data_final">

    <button class="btn btn-primary ml-1" value="pesquisar" type="submit">Pesquisar</button>
  </form>
  
  </section>


  <section class="mt-3">
    <a href="./cadastrar.php">
      <button class="btn btn-primary">Cadastrar novo produto</button>
    </a>
  </section>

  <section>
  <div class="table-responsive">
    <table class="table table-sm bg-light mt-3 table-bordered">
        <thead class="table">
          <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Tamanho</th>
            <th>Preço</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>
    </div>
  </section>

  <section>
    <?=$paginacao?>
  </section>

  
</main>