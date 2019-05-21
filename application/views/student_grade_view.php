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
      width: 90%;
    }

    .student-list {
      width: 90%;
      margin: auto;
    }

    .control-label {
      font-size: 17px;
      color: #1e272e;
      font-family: 'Space mono'
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
          <div class="col-sm-12">
            <form class="form-horizontal" action="/action_page.php">

              <div class="col-sm-6">
               <div class="form-group">
                 <label class="control-label col-sm-3" for="email">Mã lớp:</label>
                 <div class="col-sm-9">
                  <input type="email" class="form-control currClassId" id="email" disabled value="<?= $currClassId ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Môn học:</label>
                <div class="col-sm-9"> 
                  <select class="form-control selectedSubject">
                    <?php if(isset($subjects)) { ?>
                    <?php foreach ($subjects as $value): ?>
                      <?php if(isset($currentSuject) && $currentSuject == $value['MAMH']) { ?>               
                        <option value="<?= $value['MAMH'] ?>" selected ><?= $value['TENMH']?></option>
                      <?php } else {?>
                        <option value="<?= $value['MAMH'] ?>"><?= $value['TENMH']?></option>
                      <?php } ?>
                    <?php endforeach ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div> <!--hết cột trái-->



            <div class="col-sm-6">
             <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Tên lớp:</label>
              <div class="col-sm-9"> 
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
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 " for="pwd">Lần thi:</label>
              <div class="col-sm-9"> 
                <select class="form-control selectedTime">
                  <?php if(isset($currentTime)) { ?>
                      <?php if($currentTime == 1) {?>
                          <option value="1" selected="">1</option>
                          <option value="2" >2</option>
                      <?php } else {?>
                          <option value="1">1</option>
                          <option value="2" selected>2</option>
                      <?php } ?>
                  <?php } else {?>
                         <option value="1">1</option>
                          <option value="2">2</option>
                  <?php } ?>
                  
                </select>
              </div>
            </div>
            <div class="form-group" style="text-align: center;">
              <button class="btn btn-success btn-submit" >Xác nhận</button>
            <!--   <button class="btn btn-success btn-edit-mark" >Sửa điểm</button> -->
            </div>
          </div> <!--hết cột phải-->


        </form>
      </div> 

    </div>
    
    <?php if(isset($students)) { ?>
    <?php $data = isset($students) ? $students : $studentsMark ?>
    <div class="row students-mark" style="width: 70%; margin: auto;">
      <div class="table-responsive col-sm-12" >

       <table class="table">

        <thead class="jumbotron" style="height: 40px;">
          <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
            <th>STT</th>
            <th >MSSV</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Điểm</th>

          </tr>
        </thead>

        <tbody class="add-menu-view" style="">
          <?php $count = 1; ?>
          <?php if(isset($studentMarks)) ?>
          <?php foreach ($data as $val): ?>
           <tr>
            <td ><?= $count++; ?></td>
            <td >
              <input type="text" name="studentsId" class="txtStudentId form-control show-tg" value="<?= $val['MASV'] ?>" style="display: none;">
              <span class="" ><?= $val['MASV'] ?></span>
            </td>
            <td >
              <input type="text" class="txtLastName form-control show-tg" value="<?= $val['HO'] ?>" style="display: none;">
              <span class=""><?= $val['HO'] ?></span>
            </td>
            <td >
              <input type="text" class="txtFirstName form-control show-tg" value="<?= $val['TEN'] ?>" style="display: none;">
              <span class=""><?= $val['TEN'] ?></span>
            </td>
            <?php if(isset($studentsMark)) { ?>
              <td >
                <input type="text" name="studentsMark" class="txtStudentMark form-control show-tg" value="<?= $val['DIEM'] ?>" style="display: none; width: 30%;">
                <span class="hidden-tg"><?= $val['DIEM'] ?></span>
              </td>
              <?php } else if(isset($students)) {?>
                <td style="width: 20%;">
                <input type="text" name="studentsMark" class="txtStudentMark form-control show-tg" value="<?= $val['DIEM'] ?>" style="width: 100%;">
                <span class="hidden-tg" style="display: none;"><?= $val['DIEM'] ?></span>
              </td>
              <?php } ?>

            <!-- <td>
             <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
             <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
           </td> -->
         </tr>
       <?php endforeach ?>
     </tbody>
   </table>

   <!-- hết cột trái -->
   

 </div>

 <div class="row" style="float: right; clear: both; width: 15%; margin-right: 15px;">
    <a href="#" class="btn btn-danger btn-save-changed" style="width: 100%;">Lưu thay đổi</a>
 </div>


</div>

<?php } ?>
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
      $(".currClassId").val(classId);
    });

    $('body').on('click', '.btn-submit', function(event) {
      event.preventDefault();

      classId = $(".selectedClass").val();
      subjectId = $(".selectedSubject").val();
      time = $(".selectedTime").val();
      console.log("classId " + classId);
      console.log("subjectId " + subjectId);
      console.log("time " + time);
      path = link + "Mark_Controller/getStudentsMark?class="+classId+"&subject="+subjectId+"&time="+time;
      window.open(path, "_self");


    });

    $('body').on('click', '.btn-edit-mark', function(event) {
      event.preventDefault();
      $('.txtStudentMark').show();
      $('.hidden-tg').hide();
    });

    $('body').on('click', '.btn-save-changed', function(event) {
      event.preventDefault();

      let flag = true;

      var studentsId = $('input[name^=studentsId]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      var studentsMark = $('input[name^=studentsMark]').map(function(idx, elem) {

        if($(elem).val().trim().length == 0) 
           flag = false;
        
        return $(elem).val();
      }).get();

      if(flag) {
        $.post(link + 'Mark_Controller/insertStudentsMarkByAjax', {studentsId: studentsId, studentMarks: studentsMark, subjectId: $(".selectedSubject").val(), times: $(".selectedTime").val()}, function(data, textStatus, xhr) {
          if(data == 'true') {
            alert("Inserted Students Mark Successfully");
          } else {
            alert("Inserted Students Mark failed");
          }
          location.reload();

        });
      } else {
         alert("Mark must be from 0 to 10 !");
      }

      console.log(studentsId);
      console.log(studentsMark);
      console.log($(".selectedTime").val());
      console.log($(".selectedSubject").val());


      // console.log($(".txtStudentMark").val());
      // console.log($(".txtStudentId").val());


    });



  });

</script>



</body>
</html>
