<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green students-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-green-dark">
      <div class="container mt-4">
        <div class="row mb-3">
          <div class="row resume ml-5">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Nome</th>
                  <th scope="col">XP</th>
                  <?php if ($_SESSION['user_role'] == 'Professor') { ?>
                    <th scope="col">Nota Atual</th>
                    <th scope="col">Nova Nota</th>
                    <th scope="col"></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['students'] as $students) : ?>
                  <tr>
                    <th scope="row"></th>
                    <td><?php echo $students->name; ?></td>
                    <td><?php echo $students->points; ?></td>
                    <?php if ($_SESSION['user_role'] == 'Professor') { ?>
                      <td><?php echo $students->nota; ?></td>
                      <form action="<?php echo URLROOT; ?>/pages/students" method="post">
                        <td><input type="number" name="new" min="0" max="10"></td>
                        <td>
                          <input class=" d-none" name="user_id" value="<?php echo $students->id; ?>">
                          <button type="submit" class="btn btn-success float-right"><i class="bi bi-arrow-counterclockwise"></i> Atualizar nota</button>
                        </td>
                      </form>
                    <?php } ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>