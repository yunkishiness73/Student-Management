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
                      <th >STT</th>
                      <th colspan="2">Mã môn học</th>
                      <th colspan="2">Tên môn học</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody class="add-subject-view">
                    <?php if(isset($subject)) { ?>

                      <?php $count = 0; ?>
                      <?php foreach ($subject as $value): ?>

                        <?php $count++; ?>
                        <tr>
                          <td style="width: 20%;">
                            <span class="hidden-tg" style=" font-size: 15px"><?= $count ?></span>
                          </td>
                          <td colspan="2" style="width: 20%;">
                            <span class="hidden-tg" style=" font-size: 15px"><?= $value['MAMH'] ?></span>
                          </td>
                          <td style="width: 40%;">
                            <input type="text" class="subject-name form-control show-tg" value="<?= $value['TENMH'] ?>" style="display: none;">
                            <span class="hidden-tg" style="font-size: 15px"><?= $value['TENMH'] ?></span>
                          </td>

                          <td style="width: 40%;">
                           <a data-href="<?= $value['MAMH'] ?>" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
                           <a data-href="<?= $value['MAMH'] ?>" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
                         </td>
                       </tr>
                     </tr>

                   <?php endforeach ?>

                   <?php } ?>

                 </tbody>
               </table>
             </div>

           </div> <!-- hết cột trái -->


           <div class="col-sm-5">
            <div class="jumbotron">


              <table class="table">
                <tbody >
                 <tr>
                  <td><input type="text" class="subject-id form-control" value="" placeholder="Nhập mã môn học *"></td>
                  <td colspan="2" class=""><input type="text" class="subjectName form-control" value="" placeholder="Nhập tên môn học *"></td>
                  <td ">
                   <a data-href="" class="btn btn-success btn-addSubject" style="display: inline-block; height: 34px; "><i class="fa fa-plus"></i></a>
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
      $(this).next().show();

      //hide input tag
      $(this).parent().prev().find('.hidden-tg').hide();
      $(this).parent().prev().find('.show-tg').show();


    });

    $('body').on('click', '.btn-save', function(event) {
      event.preventDefault();

      let subject_name = $(this).parent().prev().find('.subject-name').val().trim();
      let subject_id = $(this).data('href');

      if(subject_name.length != 0) {

       $(this).hide();
       $(this).prev().show();

      //display input tag
      $(this).parent().prev().find('.hidden-tg').show();
      $(this).parent().prev().find('.show-tg').hide();


      $.post(link + 'Admin_controller/updateSubjectName', {_subject_id: subject_id, _subject_name: subject_name}, function(data, textStatus, xhr) {
        if(data.length != 0) {
         alert(data);
       }
       location.reload();
     });

    } else {
      alert('Please input subject name');
    }


  });

    $('body').on('click', '.btn-addSubject', function(event) {
      event.preventDefault();
      let subject_id = $('.subject-id').val().trim();
      let subject_name = $('.subjectName').val().trim();
      if(subject_id.length !== 0 && subject_name.length !== 0) {
        $.post(link + '/Admin_controller/insertSubjectByAjax', {_subject_id: subject_id, _subject_name: subject_name}, function(data, textStatus, xhr) {
          if(data.length != 0) {
           alert(data);
         }
         location.reload();
       });
      }
      
    });



  });

</script>



</body>
</html>
