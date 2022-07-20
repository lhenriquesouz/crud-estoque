

<main>

  <section>
    <a href="index.php">
      <button class="btn btn-primary">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Produto</label>
      <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo?>">
    </div>

    <div class="form-group">
      <label>Quantidade</label>
      <input type="text" class="form-control" name="quantidade" value="<?=$obVaga->quantidade?>">
    </div>

    <div class="form-group">
      <label>Tamanho</label>
      <input type="text" class="form-control" name="tamanho" value="<?=$obVaga->tamanho?>">
    </div>

    <div class="form-group">
      <label>Preço</label>
      <input type="text" class="form-control" name="preco" value="R$<?=$obVaga->preco?>">
    </div>
<!-- 
    <div class="form-group">
      <label>Status</label>

      <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="ativo" value="s" checked> Ativo
            </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="ativo" value="n" <?=$obVaga->ativo == 'n' ? 'checked' : ''?>> Inativo
            </label>
          </div>
      </div>

    </div> -->

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

  </form>

</main>

