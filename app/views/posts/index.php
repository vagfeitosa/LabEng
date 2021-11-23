<?php require APPROOT . '/views/inc/header.php'; ?>

<body class="bg-green home-page">
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <div class="row">
    <div class="col-md-3 position-fixed">
      <?php require APPROOT . '/views/inc/navbar_home.php'; ?>
    </div>
    <div class="col-md-9 bg-green-dark">
      <div class="container mt-4">
        <div class="row mb-3">
          <div class="row resume ml-5 bg-white p-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner rounded">
                <div class="carousel-item active">
                  <video class="d-block w-100" autoplay loop muted>
                    <source src="public/img/welcome.mp4" type="video/mp4">
                  </video>
                </div>
                <div class="carousel-item">
                  <video class="d-block w-100" autoplay loop muted>
                    <source src="public/img/howToClass.mp4" type="video/mp4">
                  </video>
                </div>
                <div class="carousel-item">
                  <video class="d-block w-100" autoplay loop muted>
                    <source src="public/img/howToPoints.mp4" type="video/mp4">
                  </video>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>


      <?php require APPROOT . '/views/inc/footer.php'; ?>