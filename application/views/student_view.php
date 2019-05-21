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
      <div class="container-fluid mt-2 pt-2 right_col">
        <div class="row jumbotron" style="width: 60%; margin: 80px auto 28px;">
          <div class="col-sm-2" style="line-height: 30px; height: 30px; font-size: 18px;">Chọn lớp</div>
          <div class="col-sm-6">
            <select class="form-control selectedClass">
              <?php if(isset($classes)) { ?>
              <?php foreach ($classes as $value): ?>
                <?php if(isset($currClassId) && $value['MALOP'] == $currClassId) {  ?>
                <option value="<?= $value['MALOP'] ?>" selected><?= $value['TENLOP']?></option>
                <?php } else { ?>
                <option value="<?= $value['MALOP'] ?>"><?= $value['TENLOP']?></option>
                <?php } ?>
              <?php endforeach ?>
              <?php } ?>
            </select>

          </div>
          <div class="col-sm-2"><button class="btn btn-success btn-submit">Thêm sinh viên</button></div>
          <div class="col-sm-1"><button class="btn btn-warning btn-dismiss" style="display: none;">Hủy</button></div>
          <div class="col-sm-1" ><button class="btn btn-danger btn-save" style="display: none;">Lưu</button></div>
        </div>

        <div class="row jumbotron input-student" style="width: 80%; margin: 28px auto; padding: 56px; border-radius: .25rem!important; display: none;">

          <div class="row" >
            <div class="col-sm-6">
              <div class="col-sm-3" style="font-size: 15px;">
                Mã Sinh Viên
              </div>
              <div class="col-sm-9">
               <input type="text" class="form-control txtStudentId" placeholder="Nhập mã sinh viên *">
             </div>   
           </div>
         </div>
         <div class="row" style="margin-top: 28px;">
          <div class="col-sm-6">
            <div class="col-sm-2" style="font-size: 15px;">
              Họ
            </div>
            <div class="col-sm-10">
             <input type="text" class="form-control txtLastName" placeholder="Nhập họ *">
           </div>   
         </div>
         <div class="col-sm-6">
           <div class="col-sm-3" style="font-size: 15px;">
            Tên
          </div>
          <div class="col-sm-9">
           <input type="text" class="form-control txtFirstName" placeholder="Nhập tên *">
         </div>   
       </div>
     </div>

     <div class="row" style="margin-top: 28px;">
      <div class="col-sm-6">
        <div class="col-sm-3" style="font-size: 15px;">
         Giới tính
       </div>
       <div class="col-sm-4">
        <input type="radio" name="gender" value="1" checked> Nam 
      </div>
      <div class="col-sm-4">
        <input type="radio" name="gender" value="0"> Nữ
      </div>
    </div>
    <div class="col-sm-6">
     <div class="col-sm-3" style="font-size: 15px;">
      Ngày sinh
    </div>
    <div class="col-sm-9">
     <input type="text" class="form-control txtBirthday">
   </div>   
 </div>
</div>

<div class="row " style="margin-top: 28px;">
  <div class="col-sm-12">
    <div class="col-sm-2" style="font-size: 15px;">
      Nơi sinh
    </div>
    <div class="col-sm-10">
     <input type="text" class="form-control txtPOB" placeholder="Nhập nơi sinh *">
   </div>
 </div>

</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-sm-12">
    <div class="col-sm-2" style="font-size: 15px;">
      Địa chỉ
    </div>
    <div class="col-sm-10">
     <input type="text" class="form-control txtHomeAddress" placeholder="Nhập địa chỉ *">
   </div>
 </div>

</div>

<div class="row">
</button>
</div>


</div>

<div class="row" >
  <div class="table-responsive col-sm-12">
    <div class="col-sm-12">
     <table class="table">
      <div>
        <thead class="jumbotron" style="height: 80px;">
          <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
            <th>STT</th>
            <th>MSSV</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Năm sinh</th>
            <th>Nơi sinh</th>
            <th>Địa chỉ</th>
            <th>Nghỉ học</th>
            <th></th>

          </tr>
        </thead>
      </div>

      <tbody class="add-menu-view">
        <?php if(isset($students)) {?>
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

          <td>
           <a data-href="<?= $value['MASV'] ?>" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
           <a data-href="<?= $value['MASV'] ?>" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
           <a data-href="<?= $value['MASV'] ?>" class="btn btn-success btn-saveChanged" style="display: none; height: 34px; "><i class="fa fa-floppy-o"></i></a>
         </td>
       </tr>

     <?php endforeach ?>
     <?php } ?>
   </tbody>
 </table>

</div> 
</div>
</div>
</div> <!--end content-->

<!-- footer content -->
<?php include 'template/body_footer.php' ?>
<?php include 'template/digital_block.php' ?>
<!-- /footer content -->

</div>
</div>

<!-- import js lib -->
<?php include 'template/footer.php' ?>

<script>

  link = '<?= base_url() ?>';

  $(function() {

    $('.txtBirthday, .birthday').datepicker({
      dateFormat: "yy-mm-dd",

    });

    $('body').on('click', '.btn-dismiss', function(event) {
      event.preventDefault();
      $('.btn-submit').show();
      $('.btn-save').hide();
      $(this).hide();
      $('.input-student').hide();

      $('.txtStudentId').val("");
      $('.txtFirstName').val("");
      $('.txtLastName').val("");
      $('.txtBirthday').val("");
      $('.txtPOB').val("");
      $('.txtHomeAddress').val("");

    });

    $('body').on('click', '.btn-submit', function(event) {
      $('.input-student').show();
      $('.btn-save').show();
      $(this).hide();
      $('.btn-dismiss').show();

      $('.txtStudentId').val("");
      $('.txtFirstName').val("");
      $('.txtLastName').val("");
      $('.txtBirthday').val("");
      $('.txtPOB').val("");
      $('.txtHomeAddress').val("");

    });

    function checkValidInput(studentId, firstName, lastName, birthday, POB, homeAdress) {
      if(studentId.length == 0)
       return false;
     if(firstName.length == 0) 
       return false;
     if(lastName.length == 0)
      return false;
    if(birthday.length == 0) 
     return false;
   if(POB.length == 0)
    return false;
  if(homeAdress.length == 0) 
    return false;
  return true;
}

$('body').on('click', '.btn-save', function(event) {

  student = [];

  classId = $('.selectedClass').val();
  studentId = $('.txtStudentId').val().trim();
  firstName = $('.txtFirstName').val().trim();
  lastName = $('.txtLastName').val().trim();
  sex = $("input[name='gender']:checked").val();
  birthday = $('.txtBirthday').val().trim();
  POB = $('.txtPOB').val().trim();
  homeAdress = $('.txtHomeAddress').val().trim();

  let flag = true;

  if(studentId.length == 0)
    flag = false;
  if(firstName.length == 0) 
    flag = false;
  if(lastName.length == 0)
    flag = false;
  if(birthday.length == 0) 
    flag = false;
  if(POB.length == 0)
    flag = false;
  if(homeAdress.length == 0) 
    flag = false;

  if(flag) {

    student.push(studentId, lastName, firstName, classId, sex, birthday, POB, homeAdress);
    $('.input-student').hide();
    $('.btn-submit').show();
    $(this).hide();
        // console.log("studentClass" + studentClass);
        // console.log("studentId " + studentId);
        // console.log("firstName " + firstName);
        // console.log("lastName " + lastName);
        // console.log("sex " + sex);
        // console.log("birthday " + birthday);
        // console.log("POB " + POB);
        // console.log("homeAdress " + homeAdress);
        $.post(link + 'Student_Controller/insetStudentByAjax', {studentInfo: student}, function(data, textStatus, xhr) {

          if(data == 'true') {
            alert("Inserted student successfully !");
          } else {
            alert("Inserted student failed !");
          }

          location.reload();

        });

      } else {
        alert("Bạn chưa nhập đầy đủ thông tin !");
      }

    });

$('body').on('click', '.btn-edit', function(event) {
  $('.input-student').hide();
  $('.btn-submit').show();
  $(this).hide();
  $(this).next().hide();
  $(this).next().next().show();

  $(this).parent().prev().find('#dropOutOfSchool').show();
  $(this).parent().prev().prev().find('.homeAdress').show();
  $(this).parent().prev().prev().prev().find('.POB').show();
  $(this).parent().prev().prev().prev().prev().find('.birthday').show();
  $(this).parent().prev().prev().prev().prev().prev().find('.sex').show();
  $(this).parent().prev().prev().prev().prev().prev().prev().find('.firstName').show();
  $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.lastName').show();

  $(this).parent().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().prev().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().prev().prev().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().prev().prev().prev().prev().find('.hidden-tg').hide();
  $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.hidden-tg').hide();

});

$('body').on('change', '.selectedClass', function(event) {
  event.preventDefault();
  classId = $(this).val();
  path = '<?= base_url() ?>Student_Controller/filterByClassId/'+classId;
  window.open(path, '_self');
});

$('body').on('click', '.btn-saveChanged', function(event) {
  event.preventDefault();

  classId = $('.selectedClass').val();
  studentId = $(this).data("href");
  lastName = $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.lastName').val();
  firstName = $(this).parent().prev().prev().prev().prev().prev().prev().find('.firstName').val();
  sex = $(this).parent().prev().prev().prev().prev().prev().find('.sex').val();
  birthday = $(this).parent().prev().prev().prev().prev().find('.birthday').val();
  POB = $(this).parent().prev().prev().prev().find('.POB').val();
  homeAdress =   $(this).parent().prev().prev().find('.homeAdress').val();
  dropOutOfSchool = $(this).parent().prev().find('#dropOutOfSchool').val();

  valid = checkValidInput(studentId, firstName, lastName, birthday, POB, homeAdress);
  if(valid) {
    student = [];
    student.push(studentId, lastName, firstName, sex, birthday, POB, homeAdress, dropOutOfSchool);
    console.log(student);
    // console.log("studentClass" + classId);
    // console.log("studentId " + studentId);
    // console.log("firstName " + firstName);
    // console.log("lastName " + lastName);
    // console.log("sex " + sex);
    // console.log("birthday " + birthday);
    // console.log("POB " + POB);
    // console.log("homeAdress " + homeAdress);
    // console.log("dropOutOfSchool " + dropOutOfSchool);

    $(this).parent().prev().find('#dropOutOfSchool').hide();
    $(this).parent().prev().prev().find('.homeAdress').hide();
    $(this).parent().prev().prev().prev().find('.POB').hide();
    $(this).parent().prev().prev().prev().prev().find('.birthday').hide();
    $(this).parent().prev().prev().prev().prev().prev().find('.sex').hide();
    $(this).parent().prev().prev().prev().prev().prev().prev().find('.firstName').hide();
    $(this).parent().prev().prev().prev().prev().prev().prev().prev().find('.lastName').hide();

    $('.hidden-tg').show();
    $(this).hide();
    $(this).prev().show();
    $(this).prev().prev().show();

    $.post(link + 'Student_Controller/updateStudentByAjax', {studentInfo: student}, function(data, textStatus, xhr) {
      // if(data == 'true') {
      //   alert("Updated student successfully !");
      // } else {
      //   alert("Updated student failed !");
      // }
      location.reload();
    });

  } else {

    alert("Thông tin chưa hợp lệ !");
    
  }

});








});

</script>



</body>
</html>
