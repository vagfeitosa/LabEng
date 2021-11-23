<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green show-card-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-transparent">
      <div class="col-md-9 container mt-5 bg-white">
        <a href="<?php echo URLROOT; ?>/posts/cards" class="btn btn-dark mb-5"><i class="bi bi-arrow-left"></i> Voltar</a>
        <h3><strong>Título: </strong><?php echo $data['post']->title; ?></h3>
        <div>
          <strong>Criado por </strong> <?php echo $data['user']->name; ?> - <?php echo $data['sala']->name; ?> - <strong> Em </strong> <span class="data"><?php echo $data['post']->created_at; ?></span>
        </div>
        <hr>
        <p><strong>Definição: </strong><?php echo $data['post']->body; ?></p>
        <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
          <a class="btn btn-dark float-right" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>"><i class="bi bi-pencil-square"></i> Editar</a>

          <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
            <button type="submit" class="btn btn-danger float-right mr-2"><i class=" bi bi-trash"></i> Deletar</button>
          </form>
        <?php endif; ?>
      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>