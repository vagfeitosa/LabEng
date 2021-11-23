<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green cards-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-transparent">
      <div class="container mt-5">
        <div class="row mb-3 container justify-content-end">
          <?php if ($_SESSION['user_role'] == 'Professor') { ?>
            <div class="col-md-6">
              <a class="btn btn-dark float-right" href="<?php echo URLROOT; ?>/posts/add"><i class="bi bi-plus"></i> Adicionar Flashcard</a>
            </div>
          <?php } else { ?>
            <div class="col-md-6">
              <h5 class="mr-5 float-right points"><span class="done"></span>/<span class="all"></span></h5>
              <img src="../img/blue.png" alt="BluePerson" class="bluep d-none float-right mt-2">
              <img src="../img/orange.png" alt="OrangePerson" class="orangep float-right mt-2">
            </div>
          <?php } ?>
          
          <section class="justify-content-end">
            <select class=" col-md-6 float-right mt-5 form-select form-select-sm js-value-option" aria-label=".form-select-sm example">
                <option>Selecione uma aula...</option>
                <?php foreach ($data['aula'] as $aula) : ?>
                  <option value="<?php echo $aula->semana ?>">Semana <?php echo $aula->semana ?> - <?php echo $aula->title ?></option>
                <?php endforeach; ?>
            </select>
          </section>

          <div class="row js-no-flashcards d-none">
            <div class="col-md-12">
              <section class="card card-body mt-5 bg-white text-center col-md-6 mx-auto">
                <h6 class="fw-boldest">
                😎 Não há flashcards no momento 😎
                </h6>
              </section>
            </div>  
          </div>

          <div class="faq-container">
            <?php foreach ($data['posts'] as $post) : ?>
              <div class="faq js-flashcard-class-<?php echo $post->aula_id; ?> js-order-card">
                <h5 class="faq-title text-center">
                  <i class="bi bi-question-circle-fill float-left <?php foreach ($data['posts_points'] as $post_point) : ?><?php if ($post_point->post_id == $post->postId) { ?>d-none<?php } ?><?php endforeach; ?>"></i>
                  <?php foreach ($data['posts_points'] as $post_point) : ?><?php if ($post_point->post_id == $post->postId) { ?><i class="bi bi-check-circle-fill float-left"></i><?php } ?><?php endforeach; ?>
                  <?php echo $post->title; ?>
                </h5>
                <div class="faq-text">
                  <p><strong>Definição: </strong> <?php echo $post->body; ?></p>
                  <?php foreach ($data['posts_points'] as $post_point) : ?><?php if ($post_point->post_id == $post->postId) { ?><p><strong>Última revisão:</strong> <span class="data"><?php echo $post_point->created_at; ?></span></p><?php } ?><?php endforeach; ?>
                  <?php if ($_SESSION['user_role'] == 'Professor') { ?>
                    <a class="btn btn-dark mb-3" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>"><i class="bi bi-three-dots-vertical"></i> Mais detalhes</a>
                  <?php } else { ?>
                    <form class="js-point display-center <?php foreach ($data['posts_points'] as $post_point) : ?><?php if ($post_point->post_id == $post->postId) { ?>d-none<?php } ?><?php endforeach; ?>" action="<?php echo URLROOT; ?>/posts/cards" method="post">
                      <input class="invisible d-none" name="post_id" value="<?php echo $post->postId; ?>">
                      <span class="invisible d-none aula-id" value="<?php echo $post->aula_id; ?>"><?php echo $post->aula_id; ?></span>
                      <input type="submit" action="<?php echo URLROOT; ?>/posts/cards" class="btn btn-success" value="Aprendi!"></input>
                    </form>
                  <?php } ?>
                </div>
                <button class="faq-toggle">
                  <i class="bi bi-chevron-down"></i>
                  <i class="bi bi-x-circle-fill"></i>
                </button>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>


      <?php require APPROOT . '/views/inc/footer.php'; ?>