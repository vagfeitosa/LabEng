<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green register-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <div class="card card-body bg-white mt-5">
          <h2>Crie uma conta</h2>
          <hr>
          <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="form-group">
              <select class="form-control form-control-lg" id="role" name="role">
                <option value="Aluno">Aluno</option>
                <option value="Professor">Professor</option>
              </select>
            </div>
            <div class="form-group">
              <input placeholder="Nome*" type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
              <input placeholder="Nome de usuário*" type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
              <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
            </div>
            <div class="form-group">
              <input placeholder="Senha*" type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
              <input placeholder="Confirme a senha*" type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
              <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            </div>
            <div class="form-row">
              <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-block" value="Registrar">
              </div>
              <div class="col-md-12 display-center mt-4">
                <a href="<?php echo URLROOT; ?>/users/login">Já tem uma conta? Entre aqui</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php require APPROOT . '/views/inc/footer.php'; ?>