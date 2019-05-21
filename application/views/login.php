<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() ?>images/microphone.png"/>

    <title>Student Management</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?= base_url() ?>Admin_controller/checkUserAccount">
              <h1>Login Form</h1>
              <div style="margin-bottom: 15px;">
                <select name="faculty" class="form-control">
                    <option value="CNTT">Công Nghệ Thông Tin</option>
                    <option value="VT">Viễn Thông</option>
                </select>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <input type="submit" class="btn btn-default" value="Log in">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Quản lý sinh viên !</h1>
                  <p>©2019 Đồ án Cơ Sở Dữ Liệu Phân Tán</p>
                  <p>Kiệt Nguyễn - Lộc Ngô</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

  </body>
    
</html>
