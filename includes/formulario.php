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
      <input type="text" class="form-control" name="nome" value="<?php echo isset($clienteSelecionado['nome']) ? $clienteSelecionado['nome'] : null; ?>">
    </div>

    <div class="form-group">
      <label>empresa</label>
      <input type="text" class="form-control" name="empresa" value="<?php echo isset($clienteSelecionado['empresa']) ? $clienteSelecionado['empresa'] : null; ?>">
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>