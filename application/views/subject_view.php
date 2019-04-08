<!DOCTYPE html>
<html lang="en">
<head>

  <?php include 'template/header.php' ?>

  <style>
    h4 {font-size: 30px;}
    h1 { text-align: center; font-family: Helvetica, sans-serif;  }
    .progress-bar {
      background-color: #26b99a;
    }
    td.hide-tg { color: #666; font-size: 15px!important;  }

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
        <div class="col-sm-12">
          <div class="table-responsive col-sm-12">
            <div class="row">
              <div class="col-sm-7">
               <div class="jumbotron">
                 <table class="table">
                  <thead >
                    <tr style="font-family: 'Space Mono'; font-size: 21px; color: #1e272e ">
                      <th>STT</th>
                      <th colspan="2">Tên môn học</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody class="add-subject-view">

                    <tr>
                      <td colspan="2" style="width: 20%;">
                        <span class="hidden-tg" style=" font-size: 15px">1</span>
                      </td>
                      <td style="width: 40%;">
                        <input type="text" class="subject-title form-control show-tg" value="" style="display: none;">
                        <span class="hidden-tg" style="font-size: 15px">CSDL Phân Tán</span>
                      </td>

                      <td style="width: 40%;">
                       <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                       <a data-href="" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                       <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                     </td>
                   </tr>

                   <tr>
                      <td colspan="2" style="width: 20%;">
                        <span class="hidden-tg" style=" font-size: 15px">1</span>
                      </td>
                      <td style="width: 40%;">
                        <input type="text" class="subject-title form-control show-tg" value="" style="display: none;">
                        <span class="hidden-tg" style="font-size: 15px">CSDL Phân Tán</span>
                      </td>

                      <td style="width: 40%;">
                       <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                       <a data-href="" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                       <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                     </td>
                   </tr>

                   <tr>
                      <td colspan="2" style="width: 20%;">
                        <span class="hidden-tg" style=" font-size: 15px">1</span>
                      </td>
                      <td style="width: 40%;">
                        <input type="text" class="subject-title form-control show-tg" value="" style="display: none;">
                        <span class="hidden-tg" style="font-size: 15px">CSDL Phân Tán</span>
                      </td>

                      <td style="width: 40%;">
                       <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                       <a data-href="" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                       <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                     </td>
                   </tr>

                   <tr>
                      <td colspan="2" style="width: 20%;">
                        <span class="hidden-tg" style=" font-size: 15px">1</span>
                      </td>
                      <td style="width: 40%;">
                        <input type="text" class="subject-title form-control show-tg" value="" style="display: none;">
                        <span class="hidden-tg" style="font-size: 15px;">CSDL Phân Tán</span>
                      </td>

                      <td style="width: 40%;">
                       <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                       <a data-href="" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
                       <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                     </td>
                   </tr>

             </tbody>
           </table>
         </div>

       </div> <!-- hết cột trái -->


       <div class="col-sm-5">
        <div class="jumbotron">


          <table class="table">
            <tbody >
             <tr>
              <td colspan="2" class=""><input type="text" class="tenmonan form-control" value="" placeholder="Nhập môn học *"></td>
              <td ">
               <a data-href="" class="btn btn-success btn-addDish" style="display: inline-block; height: 34px; "><i class="fa fa-plus"></i></a>
             </td>
           </tr>      

         </tbody>
       </table>
     </div>

   </div>

 </div>

</div>
</div>
</div>

<!-- footer content -->
<?php include 'template/body_footer.php' ?>
<?php include 'template/digital_block.php' ?>
<!-- /footer content -->
</div>
</div>

<?php include 'template/footer.php' ?>

<script>

  link = '<?= base_url() ?>';

  $(function() {

    $('body').on('click', '.btn-edit', function(event) {
      event.preventDefault();
      $(this).hide();
      $(this).next().hide();
      $(this).next().next().show();

    });

    $('body').on('click', '.btn-save', function(event) {
      event.preventDefault();
      $(this).hide();
      $(this).prev().show();
      $(this).prev().prev().show();

    });



  });

</script>



</body>
</html>
