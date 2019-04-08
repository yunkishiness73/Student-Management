<div class="modal fade" id="alert-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body">
        <p class="alert"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?= base_url() ?>Admin_controller" class="site_title"><i class="fa fa-microphone"></i> <span>Manager</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?= base_url() ?>images/user.png" alt="" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?= $name ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">

          <li><a><i class="fa fa-edit"></i>Quản lý <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url() ?>Admin_controller/index">Quản Lý Lớp</a></li>
              <li><a href="<?= base_url() ?>Admin_controller/loadStudentView">Quản Lý Sinh Viên</a></li>
              <li><a href="<?= base_url() ?>Admin_controller/loadSubjectView">Quản Lý Môn Học</a></li>
               <li><a href="<?= base_url() ?>Admin_controller/loadStudentGradeView">Quản Lý Điểm</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-user"></i> Tài Khoản <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url() ?>Admin_controller/logOut">Đăng xuất</a></li>
            </ul>
          </li>

        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

  </div>


</div>
</div>


<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url() ?>images/user.png" alt="">Chào, <strong><?= $name ?></strong>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
          </li>
          <li><a href="<?= base_url() ?>Admin_controller/logOut"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
        </ul>
      </li>

      <li role="presentation" class="dropdown">

      </li>
    </ul>
  </nav>
</div>
</div>