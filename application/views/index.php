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
        <div class="col-sm-12">
          <div class="table-responsive col-sm-12">
            <div class="row">
              <div class="col-sm-8">
               <div class="jumbotron" style="text-align: center;">
                 <table class="table">
                  <thead >
                    <tr style="font-family: 'Space Mono'; font-size: 20px; color: #1e272e;">
                      <th style="width: 10%; text-align: center;">STT</th>
                      <th style="width: 10%; text-align: center;">Mã Lớp</th>
                      <th style="width: 20%; text-align: center;">Tên lớp</th>
                      <th style="width: 20%; text-align: center;">Số lượng SV</th>
                      <th style="width: 20%; text-align: center;"></th>

                    </tr>
                  </thead>
                  <tbody class="add-menu-view">
                    <?php  if(isset($classes)) { ?>
                    <?php $count = 1; ?>
                    <?php foreach ($classes as $value): ?>
                      <tr>
                        <td style="width: 10%;">
                          <span class="hidden-tg" style="font-size: 15px" ><?= $count++; ?></span>
                        </td>
                        <td style="width: 10%;">
                          <span class="hidden-tg" style="font-size: 15px" ><?= $value['MALOP'] ?></span>
                        </td>
                        <td style="width: 20%;">
                          <input type="text" class="class-name form-control show-tg" value="<?= $value['TENLOP'] ?>" style="display: none;">
                          <span class="hidden-tg" style="font-size: 15px"><?= $value['TENLOP'] ?></span>
                        </td>
                        <td style="width: 20%;">
                          <input type="text" class="total-students form-control show-tg" value="<?= $value['SOLUONG'] ?>" style="display: none;">
                          <span class="hidden-tg " style="font-size: 15px"><?= $value['SOLUONG'] ?></span>
                        </td>

                        <td style="width: 20%;">
                         <a data-href="<?= $value['MALOP'] ?>" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                         <a data-href="<?= $value['MALOP'] ?>" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                       </td>
                     </tr>
                   <?php endforeach ?>
                   <?php } ?>

                 </tbody>
               </table>
             </div>

           </div> <!-- hết cột trái -->


           <div class="col-sm-4">
            <div class="jumbotron">


              <table class="table">
                <tbody >   
                  <tr>
                    <td colspan="2" class=""><input type="text" class="txtClassId form-control" value="" placeholder="Nhập mã lớp *"></td>

                  </tr>
                  <tr>
                    <td colspan="2" class=""><input type="text" class="txtClassName form-control" value="" placeholder="Nhập tên lớp *"></td>
                    <td ">

                    </td>
                  </tr> 
                  <tr style="text-align: center;">
                    <td>
                      <a data-href="" class="btn btn-success btn-addClass" style="display: inline-block; height: 34px; "><i class="fa fa-plus"></i> Thêm Lớp</a>
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

    $('.txtClassName:visible').focus();

    $('body').on('click', '.btn-edit', function(event) {
      event.preventDefault();
      $(this).hide();
      $(this).next().show();

      $(this).parent().prev().prev().find('.show-tg').show();
      $(this).parent().prev().prev().find('.hidden-tg').hide();



    });

    $('body').on('click', '.btn-save', function(event) {
      event.preventDefault();
      $(this).hide();
      $(this).prev().show();

      classId = $(this).data("href");
      className = $(this).parent().prev().prev().find('.class-name').val();


      if(className.length > 0) {

        path = link + "Class_Controller/updateClassName?classId="+classId+"&className="+className;
        window.open(path, '_self');

        $(this).parent().prev().find('.total-students').hide();
        $(this).parent().prev().find('.hidden-tg').show();

        $(this).parent().prev().prev().find('.class-name').hide();
        $(this).parent().prev().prev().find('.hidden-tg').show();

      } else {
        alert("Vui lòng điền tên lớp !");
      }



    });

    $('body').on('click', '.btn-addClass', function(event) {
      event.preventDefault();
      classId = $('.txtClassId').val().trim();
      className = $('.txtClassName').val().trim();
      console.log(classId + className);
      if(classId.length !== 0 && className !== 0) {
        $.post(link + '/Class_Controller/addClassByAjax', {class_id: classId, class_name: className}, function(data, textStatus, xhr) {
          if(data == 'true') { 
            alert("Insert class successfully !");
          } else {
           alert("Insert class failed !");
         }
         location.reload();
       });
      } else {
        alert("Bạn chưa điền đầy đủ thông tin!");
      }

    });



  });

</script>



</body>
</html>
