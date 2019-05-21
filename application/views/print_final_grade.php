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
      width: 100%;
    }

    .control-label {
     
    }

    .transcript {
      width: 70%;
      margin: 70px auto 15px;
    }

    label {
       font-size: 17px;
      color: #1e272e;
      font-family: 'Space mono'
    }



  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <?php include 'template/body_header.php' ?>

      <!-- page content -->

      <!-- page content -->
      <div class="container-fluid mt-2 pt-2 right_col">

        <div class="row transcript jumbotron" >
         <div class="row">
          <div class="row" style="text-align: center;">
            <label for="">Chọn lớp</label>
          </div>
          <div class="row" style="width: 40%; margin: 5px auto;">
            <select class="form-control" style=>
                <option value="volvo">lớp 1</option>
                <option value="saab">lớp 2</option>
                <option value="mercedes">lzớp 3</option>
                <option value="audi">lớp 4</option>
              </select>
          </div>
           <div class="col-sm-6">
             <div class="col-sm-4"> </div>
             <div class="col-sm-8">
               
            </div>

          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
         <div class="col-sm-4">
           <label for="">Khoa</label>
           <span style="font-size: 15px;">Công nghệ thông tin</span>
         </div>
         <div class="col-sm-4">
          <label for="">Lớp</label>
          <span style="font-size: 15px;">16050301</span>
        </div>
        <div class="col-sm-4">
         <label for="">Mã lớp</label>
         <span style="font-size: 15px;">16050301</span>
       </div>
     </div>

     <div class="col-sm-3"></div>

     <div class="col-sm-3"></div>


   </div>

   <div class="row">
    <div class="table-responsive" >
     <table class="table" >
      <thead class="jumbotron" style=" height: 40px; text-align: center;">
        <tr style="font-family: 'Space Mono'; font-size: 18px; color: #1e272e;">
          <th>STT</th>
          <th >MSSV</th>
          <th>Họ</th>
          <th>Tên</th>
          <th >Môn học 1</th>
          <th >Môn học 2</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
          <th >Môn học 3</th>
        </tr>
      </thead>

      <tbody class="add-menu-view">
       <tr>
        <td>1</td>
        <td>51603170</td>
        <td>Nguyễn</td>
        <td>Tuấn Kiệt</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
        <td>Hệ cơ sở dữ liệu</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="row" style="float: right; clear: both; width: 10%; margin-right: 15px;">
    <button class="btn btn-success" style="width: 100%;">In</button>
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




  });

</script>



</body>
</html>
