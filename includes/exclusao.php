<main>

  <h2 class="mt-3">Exclusão do Cliente</h2>
  
  <form method="post">
    
    <div class="form-group">
      <p>Você deseja excluir o cliente <strong><?=$clienteSelecionado[0]['nome'];?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="clientes.php"><button type="button" class="btn btn-success">Cancelar</button></a>
      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>
 
  </fomr> 

</main>