<?php
include_once '../config/helpers.php';
include_once '../app/Views/partials/header.php';
?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
        include_once '../app/Views/partials/navbar.php';
        include_once '../app/Views/partials/sidebar.php';
      ?>
      <div class="right_col" role="main">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="">
              <?php
              if (isset($_GET['modulo'])) {
                Helpers\resolve();
              } else {
                include_once '../app/Views/partials/home.php';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php include_once '../app/Views/partials/footer.php'; ?>
    </div>
  </div>
  <?php include_once '../app/Views/partials/modal.php'; ?>
</body>
</html>