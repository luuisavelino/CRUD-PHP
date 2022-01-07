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

?>


<main>
  <?=$mensagem?>
  <section>
      <a href="cadastrar-produtos.php">
        <button class="btn btn-success">Novo cliente</button>
      </a>
  </section>

  <section>
    
    <table class="table bg-light mt-4">
      <thead>
        <tr>
          <th>ID</th>
          <th>Codigo</th>
          <th>Nome</th>
          <th>Preco</th>
          <th>Descricao</th>
        </tr> 
      </thead>
      <tbody>
        <?php foreach($produtos as $produto): ?>
          <tr>
            <td><?=$produto['id']?></td>
            <td><?=$produto['codigo']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['preco']?></td>
            <td><?=$produto['descricao']?></td>
            <td> 
              <a href="editar-produtos.php?id=<?=$produto['id']?>"><button type="button" class="btn btn-primary btn-sm">EDITAR</button></button></a>
              <a href="excluir-produtos.php?id=<?=$produto['id']?>"><button type="button" class="btn btn-danger btn-sm">EXCLUIR</button></button></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </section>
      
</main>




