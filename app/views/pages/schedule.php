<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green schedule-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-transparent">
      <div class="container mt-4">
        <div class="row mb-3">
          <div class="row resume ml-5">
            <h2 class="col-md-12 display-center">Plano de estudos</h2>
            
            <section class="text-dark text-center">
              <h5>Progresso dos Flashcards</h5>
            </section>
            <section class="progress p-0 mb-5">
              <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </section>

            <span class="text-dark js-posts-point d-none"><?php echo $data['posts_points']-> posts_points;?></span>
            <span class="text-dark js-posts-count d-none"><?php echo $data['posts_count']-> posts_count;?></span>

            <div class="col-md-12">
              <button class="btn btn-dark float-right mb-3">
                <a href="<?php echo URLROOT; ?>/posts/cards"> Visualizar Flashcards <i class="bi bi-card-text"></i></a>
              </button>
            </div>
            <div class="col-md-12 mt-1">
              <?php foreach ($data['schedule'] as $schedule) : ?>
                <p class="assunto mb-3 pl-3 pt-2">
                  <a href="<?php echo URLROOT; ?>/pages/resumo<?php echo $schedule->semana; ?>">Week <?php echo $schedule->semana; ?> - <?php echo $schedule->title; ?> <i class="bi bi-link-45deg"></i></a></p>           
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>