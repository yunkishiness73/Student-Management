<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>In bảng điểm sinh viên</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>Build/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>Build/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url() ?>Build/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url() ?>Build/vendors/icheck/skins/all.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>Build/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>Build/images/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:<?= base_url() ?>Build/partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= base_url() ?>Build/index.html">
          <img src="<?= base_url() ?>Build/images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>Build/index.html">
          <img src="<?= base_url() ?>Build/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <div class="navbar-nav">
          <h3>In bảng điểm sinh viên</h3>
        </div>
        
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, Richard V.Welsh !</span>
              <img class="img-xs rounded-circle" src="<?= base_url() ?>Build/images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:<?= base_url() ?>Build/partials/_sidebar.html -->

      <!-- partial -->
      <div class="main-panel col-12">
        <div class="content-wrapper full-page-wrapper">

          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6" style='text-align: center;'>
                          <label>Chọn lớp</label>
                          <select class="form-control" style="width: 300px;margin: auto;">
                            <option>Cơ sở dữ liệu phân tán</option>
                            <option>Lập trình web ứng dụng</option>
                          </select>
                        </div>

                        <div class="col-6" style='text-align: center;'>
                          <label>Tìm kiếm bằng mã sinh viên</label>
                          <div class="form-group">
                            <div class="input-group" style="width: 400px; margin: auto;">
                              <input type="text" class="form-control" placeholder="Mã số sinh viên" aria-label="Username" aria-describedby="colored-addon3">
                              <div class="input-group-append bg-primary border-primary">
                                <button class="btn btn-primary">
                                  Tìm kiếm
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card" >
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th>
                            STT
                          </th>
                          <th>
                            MSSV
                          </th>
                          <th>
                            Họ
                          </th>
                          <th>
                            Tên
                          </th>
                          <th>
                            Giới tính
                          </th>
                          <th>
                            Ngày sinh
                          </th>
                        </thead>
                        <tbody>
                           <tr>
                            <!--STT-->
                            <td class="py-1" style="text-align: center;">
                              1
                            </td>
                            <!--MSSV-->
                            <td style="text-align: center;">
                              <a href="">51603310</a>
                            </td>
                            <!--Họ-->
                            <td >
                              <p>Nguyễn Toàn</p>
                            </td>
                            <!--Tên-->
                            <td style="text-align: center;">
                              <p>Thiện<p>
                            </td>
                            <!--Giới tính-->
                            <td style="text-align: center;">
                              <p>Nam</p>
                            </td>
                            <!--Ngày sinh-->

                            <td style="text-align: center;">
                             <p>09-04-1998</p>
                            </td>

                          </tr> <!--Xong 1 hàng-->

                         <tr>
                            <!--STT-->
                            <td class="py-1" style="text-align: center;">
                              1
                            </td>
                            <!--MSSV-->
                            <td style="text-align: center;">
                              <a href="">51603310</a>
                            </td>
                            <!--Họ-->
                            <td >
                              <p>Nguyễn Toàn</p>
                            </td>
                            <!--Tên-->
                            <td style="text-align: center;">
                              <p>Thiện<p>
                            </td>
                            <!--Giới tính-->
                            <td style="text-align: center;">
                              <p>Nam</p>
                            </td>
                            <!--Ngày sinh-->

                            <td style="text-align: center;">
                             <p>09-04-1998</p>
                            </td>

                          </tr> <!--Xong 1 hàng-->


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> <!--Table nhập liệu-->
            </div><br>


            <div class="row">
              <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <!---->
                        <div style="text-align: center;">
                          <h2><b>Bảng điểm học tập</b></h2>
                        </div><br>
                        <div class="row">
                          <div class="col-md-5">
                            <p style="font-size: 15pt; margin-top: 5px;margin-left: 76px">Sinh viên <b>NGUYỄN TOÀN THIỆN</b></p>
                          </div>

                          <div class="col-md-4" style="">
                            <p style="font-size: 15pt; margin-top: 5px">Mã SV <b>51603310</b></p>
                          </div>
                          <!--Button Xong-->
                          <div class="col-md-3" style="text-align: center;">

                          </div>
                          <!--Button Thêm sinh viên-->

                        </div>
                        <div class="row">
                          <div class="col-md-4" style="text-align: center">
                            <p style="font-size: 15pt; margin-top: 5px">Khoa <b>Công nghệ thông tin</b></p>
                          </div>
                          <!--Button Xong-->
                          <div class="col-md-4" style="text-align: center;">
                            <p style="font-size: 15pt; margin-top: 5px">Lớp <b>Công nghệ phần mềm</b></p>
                          </div>
                          <!--Button Thêm sinh viên-->
                          <div class="col-md-4" style="text-align: center;">
                            <p style="font-size: 15pt; margin-top: 5px">Mã lớp <b>16050304</b></p>
                          </div>
                        </div>

                        <div class='row'>
                          <div class='col-5'></div>
                          <div class="col-2" style="width: 100px; text-align: center;">
                            <label>Chọn học kì</label>
                            <select class="form-control" style="width: 200px;">
                              <option>Học kì 1</option>
                              <option>Học kì 2</option>
                            </select>
                          </div> 
                          <div class="col-5"></div>          
                        </div>


                        <!--Table nhập liệu-->
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">                      
                            <div class="card-body" style="text-align: center">
                              <div class="table-responsive" style="overflow-x: scroll;">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>
                                        <b>STT</b>
                                      </th>
                                      <th>
                                        <b>Môn học</b>
                                      </th>
                                      <th>
                                        <b>Điểm</b>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <!--STT-->
                                      <td class="py-1" width="20px">
                                        1
                                      </td>
                                      <!--Môn học-->
                                      <td width="400px" style="text-align: center;">
                                        Cơ sở dữ liệu phân tán
                                      </td>
                                      <!--Điểm-->
                                      <td width='100px'>
                                        10
                                      </td>

                                    </tr> <!--Xong 1 hàng-->


                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div> <!--Table nhập liệu-->
                        <div class="" style="text-align: right;">
                          <button class="btn btn-success" style="display: inline-block; width: 87px">In</button>
                          <button class="btn btn-primary" style="display: inline-block;">Trở về</button>
                        </div>
                      </div> <!--Card-body-->
                    </div> <!--Card-->
                  </div> <!--col-12-->

                </div> <!--row-flexrow-->
              </div> <!--grid margin-->

            </div> <!--row-->



          </div>
          <!-- content-wrapper ends -->
          <!-- partial:<?= base_url() ?>Build/partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                  <i class="mdi mdi-heart text-danger"></i>
                </span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="<?= base_url() ?>Build/vendors/js/vendor.bundle.base.js"></script>
      <script src="<?= base_url() ?>Build/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="<?= base_url() ?>Build/js/off-canvas.js"></script>
      <script src="<?= base_url() ?>Build/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <!-- End custom js for this page-->
    </body>

    </html>