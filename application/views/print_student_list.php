<!DOCTYPE html>
<html lang="en">
<head>

  <?php include 'template/header.php' ?>

  <style>

    h4 {font-size: 30px;}
    h1 { text-align: center; font-family: 'Space mono', Arial, Helvetica, sans-serif;  }
    .progress-bar {
      background-color: #26b99a;
    }
    .hide-tg { display: none; }
    
    
    .form-control {
      border-radius: .25rem!important;
    }

    .jumbotron {
      margin: 70px auto 30px;
      width: 70%;
    }

    label {
      font-size: 18px;
      color: #1e272e;
      font-family: 'Space mono'
    }

    .transcript {
      width: 70%;
      margin: 70px auto 15px;
    }

    td {
      font-size: 15px;
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

        <div class="row transcript jumbotron" >
          <?php if(isset($classes)) { ?>
          <div class="row">
           <div class="col-sm-4">
             <label for="">Khoa: </label>
             <span style="font-size: 15px"><?= $classes[0]["TENKH"] ?></span>
           </div>
           <div class="col-sm-4">
            <div class="col-sm-2">
             <label for="">Lớp: </label>
           </div>
           <div class="col-sm-8">
            <select class="form-control selectedClass">

              <?php foreach ($classes as $value): ?>
                <?php if(isset($currClassId) && $value['MALOP'] == $currClassId) {  ?>
                  <option value="<?= $value['MALOP'] ?>" selected><?= $value['TENLOP']?></option>
                <?php } else { ?>
                  <option value="<?= $value['MALOP'] ?>"><?= $value['TENLOP']?></option>
                <?php } ?>
              <?php endforeach ?>

            </select>
          </div>
        </div>
        <div class="col-sm-4">
         <label for="">Mã lớp: </label>
         <?php if(isset($currClassId)) { ?>
         <span style="font-size: 15px"><?= $currClassId ?></span>
         <?php } ?>
       </div>
     </div>
    

   </div>

    <?php } ?>

  <?php if(isset($students)) {?>
   <div class="row" style="width: 80%; margin: auto;">
    <div class="table-responsive" >
     <table class="table" >
      <thead class="jumbotron" style=" height: 40px; text-align: center;">
        <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e;">
          <th>STT</th>
          <th >MSSV</th>
          <th>Họ</th>
          <th>Tên</th>
          <th >Giới tính</th>
          <th >Ngày sinh</th>
          <th >Nơi sinh</th>
          <th >Địa chỉ</th>
          <th>Nghỉ học</th>
          <th></th>
        </tr>
      </thead>

      <tbody class="add-menu-view">

        <?php $count = 1; ?>
        <?php foreach ($students as $value): ?>
         <tr>
          <td><span class="hidden-tg" ><?= $count++; ?></span></td>
          <td><span class="hidden-tg" ><?= $value['MASV'] ?></span></td>
          <td >
            <input type="text" class="lastName form-control show-tg" value="<?= $value['HO'] ?>" style="display: none;">
            <span class="hidden-tg "><?= $value['HO'] ?></span>
          </td>
          <td >
            <input type="text" class="firstName form-control show-tg" value="<?= $value['TEN'] ?>" style="display: none;">
            <span class="hidden-tg "><?= $value['TEN'] ?></span>
          </td>

          <?php 
          if($value['PHAI'] == 1) {
           ?>
           <td>    
            <select style="display: none;" class="form-control sex">
              <option value="1" selected>Nam</option>
              <option value="0" >Nữ</option>
            </select>
            <span class="hidden-tg ">Nam</span>
          </td>

          <?php } else {?>

          <td>
            <select style="display: none;" class="form-control sex">
              <option value="1" >Nam</option>
              <option value="0" selected>Nữ</option>
            </select>
            <span class="hidden-tg">Nữ</span>
          </td>

          <?php } ?>

          <?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
          <td>
            <input type="text" class="birthday form-control show-tg" value="<?= date('Y-m-d', strtotime($value['NGAYSINH'])) ?>" style="display: none;">
            <span class="hidden-tg "><?= date('Y-m-d', strtotime($value['NGAYSINH'])) ?></span>
          </td>

          <td>
            <input type="text" class="POB form-control show-tg" value="<?= $value['NOISINH'] ?>" style="display: none;">
            <span class="hidden-tg "><?= $value['NOISINH'] ?></span>
          </td>

          <td>
            <input type="text" class="homeAdress form-control show-tg" value="<?= $value['DIACHI'] ?>" style="display: none;">
            <span class="hidden-tg "><?= $value['DIACHI'] ?></span>
          </td>

          <?php if($value['NGHIHOC'] == 1) {?>
          <td>
            <span class="hidden-tg ">Đã nghỉ</span>
            <select id="dropOutOfSchool" style="display: none;" class="form-control">
              <option value="1" selected>Đã nghỉ</option>
              <option value="0" >Chưa nghỉ</option>
            </select>
          </td>
          <?php } else { ?>
          <td>
            <select id="dropOutOfSchool" style="display: none;" class="form-control">
              <option value="1" >Đã nghỉ</option>
              <option value="0" selected>Chưa nghỉ</option>
            </select>
            <span class="hidden-tg ">Chưa nghỉ</span>
          </td>
          <?php } ?>
        </tr>

      <?php endforeach ?>

    </tbody>
  </table>
</div>
<div class="row" style="float: right; clear: both; width: 10%; margin-right: 15px;">
  <a href="<?= base_url() ?>/Student_Controller/printListStudent/<?= $currClassId ?>" class="btn btn-success" style="width: 100%;">In</a>
</div>
</div>

<?php } ?>


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

    $('body').on('change', '.selectedClass', function(event) {
      event.preventDefault();
      classId = $(this).val();
      path = '<?= base_url() ?>Student_Controller/filterByClassIdStudent/'+classId;
      window.open(path, '_self');
    });



  });

</script>



</body>
</html>
