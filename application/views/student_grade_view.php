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
                  <input type="email" class="form-control" id="email" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Môn học:</label>
                <div class="col-sm-9"> 
                  <select class="form-control">
                    <option value="volvo">lớp 1</option>
                    <option value="saab">lớp 2</option>
                    <option value="mercedes">lớp 3</option>
                    <option value="audi">lớp 4</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Học kỳ:</label>
                <div class="col-sm-9"> 
                  <select class="form-control">
                    <option value="volvo">lớp 1</option>
                    <option value="saab">lớp 2</option>
                    <option value="mercedes">lớp 3</option>
                    <option value="audi">lớp 4</option>
                  </select>
                </div>
              </div>
            </div> <!--hết cột trái-->



            <div class="col-sm-6">
             <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Tên lớp:</label>
              <div class="col-sm-9"> 
                <select class="form-control">
                  <option value="volvo">lớp 1</option>
                  <option value="saab">lớp 2</option>
                  <option value="mercedes">lớp 3</option>
                  <option value="audi">lớp 4</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Lần thi:</label>
              <div class="col-sm-9"> 
                <select class="form-control">
                  <option value="volvo">lần 1</option>
                  <option value="saab">lần 2</option>
                </select>
              </div>
            </div>
            <div class="form-group" style="text-align: center;">
              <button class="btn btn-success" >Xác nhận</button>
              <button class="btn btn-success" style="display: inline-block;">Lưu</button>
            </div>
          </div> <!--hết cột phải-->


        </form>
      </div> 

    </div>

    <div class="row student-list">
      <div class="table-responsive col-sm-12">

       <table class="table">

        <thead class="jumbotron" style="height: 40px;">
          <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e ">
            <th>STT</th>
            <th >MSSV</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Điểm</th>
            <th></th>

          </tr>
        </thead>

        <tbody class="add-menu-view">

         <tr>
          <td><span class="hidden-tg" >1</span></td>
          <td >
            <input type="text" class="ten_sp form-control show-tg" value="" style="display: none;">
            <span class="hidden-tg" >51603170</span>
          </td>
          <td >
            <input type="text" class="donvitinh_sp form-control show-tg" value="" style="display: none;">
            <span class="hidden-tg ">Lung</span>
          </td>
          <td >
            <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
            <span class="hidden-tg ">Thị Linh</span>
          </td>

          <td >
            <input type="text" class="gia_sp form-control show-tg" value="" style="display: none;">
            <span class="hidden-tg ">10</span>
          </td>

          <td>
           <a data-href="" class="btn btn-warning btn-edit" style="display: inline-block; height: 34px; "><i class="fa fa-pencil"></i></a>
           <a data-href="" class="btn btn-success btn-save"  style="display: none"><i class="fa fa-floppy-o"></i></a>
         </td>
       </tr>
     </tbody>
   </table>

   <!-- hết cột trái -->


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




  });

</script>



</body>
</html>
