<nav class="ml-5 mr-4 mt-5">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link home" href="<?php echo URLROOT; ?>" role="tab" aria-selected="true"><i class="bi bi-house"></i> Início</a>
    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/salas" role="tab" aria-selected="false"><i class="bi bi-journal-text"></i> Salas</a>
    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/performance" role="tab" aria-selected="false"><i class="bi bi-trophy"></i> Desempenho</a>
    <a class="nav-link nav-link-students" href="<?php echo URLROOT; ?>/pages/students" role="tab" aria-selected="false">
      <?php if ($_SESSION['user_role'] == 'Professor') { ?><i class="bi bi-person-lines-fill"></i> Alunos<?php } else { ?><i class="bi bi-star"></i> Ranking <?php } ?></a>

  </div>
</nav>