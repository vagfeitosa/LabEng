<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green login-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row mr-5 ml-5">
    <div class="col-md-7 mt-5">
      <img class="w-100" src="../public/img/login.png" alt="Circulo">
    </div>
    <div class="col-md-4 mx-auto">
      <div class="card card-body bg-white mt-5">
        <?php flash('register_success'); ?>
        <h2>Entrar</h2>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <input placeholder="Nome de usuário*" type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <input placeholder="Senha*" type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <input type="submit" class="btn btn-success btn-block" value="Start!">
            </div>
            <div class="col-md-12 mt-4 display-center">
              <a href="<?php echo URLROOT; ?>/users/register">Não tem uma conta?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>