<!DOCTYPE html>
<html lang="en">
<head>

  <?php include 'template/header.php' ?>
  <style>
    h4 {font-size: 30px;}
    h1 { text-align: center; font-family: Arial, Helvetica, sans-serif;  }
    .progress-bar {
      background-color: #26b99a;
    }
    .hide-tg { display: none; }

    .form-control {
      border-radius: .25rem!important;
    }

  
  </style>

</head>

<?php include 'checkUserLoginStatus.php' ?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <?php include 'template/body_header.php' ?>

      <!-- page content -->

      <!-- page content -->
      <div class="container-fluid mt-2 pt-2 right_col">
        <div class="col-sm-12 homepage"  >
             <img src="<?= base_url() ?>/images/homepage.jpg" alt="" style="width: 100%; height: 100%;">
        </div>

     

        <!-- footer content -->
        <?php include 'template/body_footer.php' ?>
        <?php include 'template/digital_block.php' ?>
        <!-- /footer content -->
      </div>
    </div>
    </div>

    <?php include 'template/footer.php' ?>





  </body>
  </html>
