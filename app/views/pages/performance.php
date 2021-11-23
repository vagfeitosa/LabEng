<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green performance-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-green-dark ">
      <div class="container mt-5">
        <div class="row mb-3">
          <div class="row resume ml-5">
          <?php if ($_SESSION['user_role'] == 'Aluno') { ?>
            <section class="row mb-5">
              <div class="card text-dark col-md-4 mx-auto">
                <div class="card-body">
                  <p class="header-aside mb-0 display-center">XP</p>
                  <h2 class="display-center js-points-user"><?php echo $data['user_points']->points; ?></h2>
                </div>
              </div>
              <div class="card text-dark col-md-4 mx-auto">
              <div class="card-body">
                  <p class="header-aside mb-0 display-center">LEVEL</p>
                  <h2 class="display-center js-level-up"></h2>
              </div>
              </div>
            </section>
          <?php } ?>
            <div class="col-md-12 bg-white resume">
              <?php if ($_SESSION['user_role'] == 'Aluno') { ?>
                
                <p class="header-aside mb-0">Suas Notas</p>
                <hr>
                <div class="row ml-4 mt-4">
                  <div class="class-points col-md-2"><span class="points"><?php echo $data['notaIngles']->nota; ?></span> <br><?php echo $_SESSION['user_disciplina_name']; ?></div>
                </div>
              <?php } ?>
              <p class="header-aside mb-0 <?php if ($_SESSION['user_role'] == 'Aluno') { ?> mt-5 <?php } ?>">Médias de notas da sua turma</p>
              <hr>
              <div class="row ml-4 mt-4">
                <div class="class-points-avg col-md-2">
                  <p class="points-avg"><?php echo $data['mediaNotas']->mediaNotas; ?></p>
                  <p><?php echo $_SESSION['user_disciplina_name']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require APPROOT . '/views/inc/footer.php'; ?>