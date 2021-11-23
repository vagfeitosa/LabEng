<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green add-card-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-6 bg-transparent">
      <div class="container">
        <div class="card card-body bg-white mt-5">
          <h2>Adicionar novo Flashcard</h2>
          <form action="<?php echo URLROOT; ?>/posts/add" method="post">
            <div class="form-group">
              <label>Aula:<sup class="required">*</sup></label>
              <select name="aula_id" id="aula_id" class="w-100">
                <?php foreach ($data['aula'] as $aula) : ?>
                  <option value="<?php echo $aula->semana ?>">Semana <?php echo $aula->semana ?> - <?php echo $aula->title ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Título:<sup class="required">*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Adicione um título...">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
              <label>Conteúdo:<sup class="required">*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Adicione algum texto..."><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Enviar">
          </form>
        </div>
      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>