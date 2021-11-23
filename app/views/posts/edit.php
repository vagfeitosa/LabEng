<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green edit-card-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-transparent">
      <div class="col-md-9 container mt-5">
        <a href="<?php echo URLROOT; ?>/posts/cards" class="btn btn-dark mb-2"><i class="bi bi-arrow-left-circle"></i>Voltar</a>
        <div class="card card-body mt-5 bg-white">
          <h2>Editar Flashcard</h2>
          <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
            <div class="form-group">
              <label>Título:<sup class="required">*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
              <label>Definição:<sup class="required">*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Enviar">
          </form>
        </div>
      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>