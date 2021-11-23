<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green classes-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-green-dark ">
      <div class="container mt-5">
        <div class="row mb-3">
          <div class="row resume ml-5">
            <div class="col-md-12 bg-white resume">
              <p class="header-aside mb-0">Salas</p>
              <hr>
              <?php if ($_SESSION['user_sala_nome']) { ?>
                <div class="bg-red row pt-4 pb-4 ml-1 mr-1 mt-4">
                  <div class="col-md-8">
                    <p class="ml-4 contents-start"><?php echo $_SESSION['user_disciplina_name']; ?> - <?php echo $_SESSION['user_sala_nome']; ?></p>
                  </div>
                  <a href="<?php echo URLROOT; ?>/pages/schedule/<?php echo $_SESSION['user_disciplina_id']; ?>" class="col-md-3 btn-start bg-blue pt-3 pb-3"> Start! <i class="bi bi-play-fill"></i></a>
                </div>
              <?php } else { ?>
                <p>Você não possui salas no momento</p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <?php require APPROOT . '/views/inc/footer.php'; ?>