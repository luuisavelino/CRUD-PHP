<main>

  <section>
    <a href="clientes.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>
  
  <form method="post">

    <div class="form-group">  
      <label>Codigo</label>
      <input type="text" class="form-control" name="codigo" value="<?php echo isset($produtoSelecionado[0]['codigo']) ? $produtoSelecionado[0]['codigo'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo isset($produtoSelecionado[0]['nome']) ? $produtoSelecionado[0]['nome'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Preco</label>
      <input type="text" class="form-control" name="preco" value="<?php echo isset($produtoSelecionado[0]['preco']) ? $produtoSelecionado[0]['preco'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Descricao</label>
      <input type="text" class="form-control" name="descricao" value="<?php echo isset($produtoSelecionado[0]['descricao']) ? $produtoSelecionado[0]['descricao'] : null; ?>">
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>