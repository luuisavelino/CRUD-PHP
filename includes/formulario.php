<main>

  <section>
    <a href="clientes.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>
  
  <form method="post">
    <div class="form-group">
      <label>nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo isset($clienteSelecionado[0]['nome']) ? $clienteSelecionado[0]['nome'] : null; ?>">
    </div>

    <div class="form-group">
      <label>empresa</label>
      <input type="text" class="form-control" name="empresa" value="<?php echo isset($clienteSelecionado[0]['empresa']) ? $clienteSelecionado[0]['empresa'] : null; ?>">
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>