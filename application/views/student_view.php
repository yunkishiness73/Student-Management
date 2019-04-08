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
        <div class="row jumbotron" style="width: 50%; margin: 80px auto; ">
          <div class="col-sm-3" style="line-height: 30px; height: 30px; font-size: 18px;">Chọn lớp</div>
          <div class="col-sm-6">
            <select class="form-control">
              <option value="volvo">lớp 1</option>
              <option value="saab">lớp 2</option>
              <option value="mercedes">lớp 3</option>
              <option value="audi">lớp 4</option>
            </select>
          </div>
          <div class="col-sm-3"><button class="btn btn-success">Xác nhận</button></div>
        </div>

        <div class="row" style="width: 80%; margin: 50px auto; border: 1px solid black; padding: 10px; border-radius: .25rem!important;">
          
          <div class="row">
            <div class="col-sm-6">
              <div class="col-sm-2">
                Họ
              </div>
              <div class="col-sm-10">
               <input type="text" class="form-control" placeholder="Nhập họ *">
             </div>   
           </div>
           <div class="col-sm-6">
             <div class="col-sm-2">
              Tên
            </div>
            <div class="col-sm-10">
             <input type="text" class="form-control" placeholder="Nhập tên *">
           </div>   
         </div>
       </div>



       <div class="row">
        <div class="col-sm-6">
          <div class="col-sm-2">
           Giới tính
         </div>
         <div class="col-sm-5">
          <input type="radio" name="gender" value="Nam"> Nam 
        </div>
        <div class="col-sm-5">
          <input type="radio" name="gender" value="Nữ"> Nữ
        </div>
      </div>
      <div class="col-sm-6">
       <div class="col-sm-2">
        Ngày sinh
      </div>
      <div class="col-sm-10">
       <input type="date" class="form-control" placeholder="Nhập ngày sinh *">
     </div>   
   </div>
 </div>

 <div class="row">
  <div class="col-sm-2">
    Nơi sinh
  </div>
  <div class="col-sm-10">
   <input type="text" class="form-control" placeholder="Nhập nơi sinh *">
 </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Địa chỉ
  </div>
  <div class="col-sm-10">
   <input type="text" class="form-control" placeholder="Nhập địa chỉ *">
 </div>
</div>



</div>

<div class="row">
  <div class="table-responsive col-sm-12">
    <div class="col-sm-12">
     <table class="table">
      <div>
        <thead class="jumbotron" style="height: 80px;">
          <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
            <th>STT</th>
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

       <tr>
        <td><span class="hidden-tg" >1</span></td>
        <td >
          <input type="text" class="donvitinh_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">lung</span>
        </td>
        <td >
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">thị linh</span>
        </td>


        <td>
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">nam</span>
        </td>

        <td>
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">17/03/2000</span>
        </td>

        <td>
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">ở đâu đó</span>
        </td>

        <td>
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">ở đâu đó</span>
        </td>

        <td>
          <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
          <span class="hidden-tg ">chưa nghỉ nhé</span>
        </td>


        <td>
         <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
         <a data-href="" class="btn btn-danger btn-remove" style="display: inline-block; height: 34px; "><i class="fa fa-remove"></i></a>
         <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
       </td>
     </tr>
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


  });

</script>



</body>
</html>
