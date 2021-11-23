<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand logo ml-5" href="<?php echo URLROOT; ?>/users/login"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php if (!isset($_SESSION['user_id'])) : ?>
          <li class="nav-item js-register">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Cadastre-se</a>
          </li>
          <li class="nav-item js-login">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Entrar</a>
          </li>
        <?php else : ?>
          <li class="js-user-avatar 
            <?php if ($_SESSION['user_role'] == 'Professor') : ?> bg-red 
            <?php else : ?>bg-orange<?php endif; ?> mr-3">
          </li>
          <div class="menu-append bg-white rounded border d-none">
            <p class="user-name mt-3"><?php echo $_SESSION['user_name']; ?></p>
            <p class="etapa-escolar"><?php echo $_SESSION['user_sala']; ?> - <?php echo $_SESSION['user_ano']; ?>° Ano</p>
            <p><?php echo $_SESSION['user_role']; ?></p>
            <a class="etapa-escolar" href="<?php echo URLROOT; ?>/users/logout"> Sair</a>
          </div>
          <li class="nav-item hello pt-2 mr-5"><?php echo $_SESSION['user_name']; ?></li>

      </ul>
    <?php endif; ?>

    </div>
  </div>
</nav>