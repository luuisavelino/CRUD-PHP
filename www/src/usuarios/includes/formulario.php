<main>

  <section>
    <a href="usuarios.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="text-light mt-3"><?=TITLE?></h2>
  
  <form method="post" class="text-light">
    <div class="form-group">
      <label>Usuario</label>
      <input type="text" class="form-control" name="usuario" value="<?php echo isset($usuarioSelecionado[0]['usuario']) ? $usuarioSelecionado[0]['usuario'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="password" class="form-control" name="senha" value="<?php echo $usuarioSelecionado[0]['senha'] ? "********"  : null; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" name="email" value="<?php echo isset($usuarioSelecionado[0]['email']) ? $usuarioSelecionado[0]['email'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Empresa</label>
      <input type="text" class="form-control" name="empresa" value="<?php echo isset($usuarioSelecionado[0]['empresa']) ? $usuarioSelecionado[0]['empresa'] : null; ?>">
    </div>

    <div class="mt-5 form-group container d-flex justify-content-center align-items-center">
      <select name="permissao" id="permissao">
        <option value="">Selecione</option>
        <option value="superadmin">Superadmin</option>
        <option value="admin">Admin</option>
        <option value="usuario">Usuario</option>
      </select>
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>