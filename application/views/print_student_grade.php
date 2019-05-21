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
      width: 80%;
    }

    .student-list {
      width: 70%;
      margin: auto;
    }

    .control-label {
      font-size: 17px;
      color: #1e272e;
      font-family: 'Space mono'
    }

    .transcript {
      margin: 50px auto 15px;
    }

    label {
      font-size: 18px;
      color: #1e272e;
      font-family: 'Space mono'
    }

    .student-info, td {
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
        <div class="row jumbotron">
          <div class="row" >
            <div class="col-sm-2"></div>
            <div class="col-sm-4"><label for="">Chọn lớp</label></div>
            <div class="col-sm-4"><label for="">Tìm mã sinh viên</label></div>
            <div class="col-sm-2"></div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
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
            <div class="col-sm-4"> 
              <input type="text" class="form-control txtStudentId"> 
            </div>
            <div class="col-sm-2">
              <button class="btn btn-primary btn-search-student">Tìm Kiếm</button>
            </div>
          </div>
        </div>
        
        <?php if(isset($students)) {?>
        <div class="row student-list">
          <div class="table-responsive">

           <table class="table">

            <thead style="height: 40px;">
              <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
                <th>STT</th>
                <th >MSSV</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
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
                 <a href="<?= base_url() ?>Student_Controller/studentTranscript/<?= $value['MASV'] ?>/<?= $currClassId ?>" class="btn btn-primary btn-student-subjects" style="display: inline-block; height: 34px; "><i class="fa fa-eye-slash""></i></a>

               </td>
             </tr>

           <?php endforeach ?>

         </tbody>
       </table>
     </div>
   </div>

   <?php } ?>

   <?php if(isset($transcript)) { ?>

   <div class="row transcript">

    <div class="row jumbotron" >

     <div class="row">
       <div class="col-sm-4">
        <div class="col-sm-4"><label for="">Sinh Viên</label></div>
        <div class="col-sm-8">
          <span class="student-info"><?= $transcript[0]["HO"] ?> <?= $transcript[0]["TEN"]  ?></span>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="col-sm-4"><label for="">MSSV</label></div>
        <div class="col-sm-8">
         <span class="student-info"><?= $transcript[0]["MASV"] ?></span>
       </div>
     </div>

   </div>
   <div class="row">
     <div class="col-sm-4">
      <div class="col-sm-4">
        <label for="">Khoa</label>
      </div>
      <div class="col-sm-8">
        <span class="student-info"><?= $transcript[0]["TENKH"] ?></span>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="col-sm-4">
        <label for="">Lớp</label>
      </div>
      <div class="col-sm-8">
       <span class="student-info"><?= $transcript[0]["TENLOP"] ?></span>
     </div>
   </div>
 </div>
</div>

<div class="row" style="width: 70%; margin: auto;">
  <div class="table-responsive">

   <table class="table">

    <thead style="height: 40px; text-align: center;">
      <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
        <th>STT</th>
        <th >Môn học</th>
        <th>Điểm</th>
      </tr>
    </thead>
    
    <tbody class="add-menu-view">
      <?php $count = 1; ?>
      <?php foreach ($transcript as $value): ?>
       <tr>
        <td><?= $count++ ?></td>

        <td><?= $value["TENMH"] ?></td>
        <td>
          <?= $value["DIEM"] ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

</div>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-2">

  </div>
  <div class="col-sm-2">
    <a href="<?= base_url() ?>/Student_Controller/printStudentMark/<?= $transcript[0]["MASV"] ?>/<?= $transcript[0]["MALOP"] ?>" class="btn btn-success" style="width: 45%;">In</a>

  </div>
</div>
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
  <?php if(isset($studentId)) {?>
   students_id = <?= json_encode(($studentId)) ?>
   <?php } else { ?>
      students_id = [];
    <?php } ?>


   function getStudentsIdArray(students_id) {
    studentsIdArr = [];
    students_id.forEach(item => {
      studentsIdArr.push(item.MASV);
    });
    return studentsIdArr;
  }


  $(function() {

   

      let data = getStudentsIdArray(students_id);
      console.log(data);

      $( ".txtStudentId" ).autocomplete({
        source: data
      });
  
    

    $('body').on('change', '.selectedClass', function(event) {
      event.preventDefault();
      classId = $(this).val();

      path = '<?= base_url() ?>Student_Controller/filterByClassIdStudentGrade/'+classId;
      window.open(path, '_self');
    });

    $('body').on('click', '.btn-search-student', function(event) {
      event.preventDefault();
      studentId = $(".txtStudentId").val().trim();
      currClassId = '<?= $currClassId ?>';
      if(studentId.length !== 0 && currClassId.length !== 0) {
        path = link + 'Student_Controller/studentTranscript/' + studentId + '/' + currClassId;
        window.open(path, "_self");

      } else {
        alert("Bạn chưa nhập mã sinh viên !");
      }


      
    });

     $('.txtStudentId').keyup(function(event) {
        if(event.keyCode === 13) {
          $(".btn-search-student").click();
        }
    });



  });

</script>



</body>
</html>
