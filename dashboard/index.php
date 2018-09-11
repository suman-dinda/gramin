<?php
session_start();
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}else{
  ?>
  <script type="text/javascript">
    if(window.location.hostname == "localhost")
      location.href= window.location.protocol+"//"+window.location.hostname+"/gramin/admin/";
    else
      location.href= window.location.protocol+"//"+window.location.hostname+"/admin/";
  </script>
<?php }

?>
<!DOCTYPE html>
<html ng-app="gramin">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gramoddhara Kendra Management System| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Animate -->
  <link rel="stylesheet" href="../bower_components/animate/animate.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GK</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>G K</b>M S</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                </ul>
              </li>
              <li class="footer"><a>See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                </ul>
              </li>
              <li class="footer"><a>View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                </ul>
              </li>
              <li class="footer">
                <a>View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $username;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $username;?>
                  <small>User</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" onclick="logout()">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username;?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form a method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-lock"></i> <span>Create Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!create/zone_head"><i class="fa fa-circle-o"></i> Zone Head</a></li>
            <li class="active"><a href="#!create/district_head"><i class="fa fa-circle-o"></i> District Head</a></li>
            <li class="active"><a href="#!create/taluk_head"><i class="fa fa-circle-o"></i> Taluk Head</a></li>
            <li class="active"><a href="#!create/gram_panchayat"><i class="fa fa-circle-o"></i> Gram Panchayat Coordinator</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-eye"></i> <span>View Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!view/zone_head"><i class="fa fa-circle-o"></i> Zone Head</a></li>
            <li class="active"><a href="#!view/district_head"><i class="fa fa-circle-o"></i> District Head</a></li>
            <li class="active"><a href="#!view/taluk_head"><i class="fa fa-circle-o"></i> Taluk Head</a></li>
            <li class="active"><a href="#!view/gram_panchayat"><i class="fa fa-circle-o"></i> Gram Panchayat Coordinator</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-cogs"></i> <span>Create Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!create_service"><i class="fa fa-circle-o"></i> Create Service</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-money"></i> <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!sales"><i class="fa fa-circle-o"></i> Sales List</a></li>
            <li class="active"><a href="#!add_sales"><i class="fa fa-circle-o"></i> Add Sales</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-product-hunt"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!products"><i class="fa fa-circle-o"></i> Product List</a></li>
            <li class="active"><a href="#!add_product"><i class="fa fa-circle-o"></i> Add Product</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-exchange"></i> <span>Transfer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!transfer"><i class="fa fa-circle-o"></i> Transfer Stock</a></li>
            <li class="active"><a href="#!purchase_request"><i class="fa fa-circle-o"></i> Purchase Requested</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview"><a><i class="fa fa-circle-o"></i> Category</a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#!category"><i class="fa fa-circle-o"></i> Category List</a></li>
                    <li class="active"><a href="#!add_category"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview"><a><i class="fa fa-circle-o"></i>Sub Category</a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#!subcategory"><i class="fa fa-circle-o"></i> SubCategory List</a></li>
                    <li class="active"><a href="#!add_subcategory"><i class="fa fa-circle-o"></i> Add SubCategory</a></li>
                </ul>
            </li>
            <li class="treeview"><a><i class="fa fa-circle-o"></i>Brand</a>
                <ul class="treeview-menu">
                    <li class="active"><a href="#!brands"><i class="fa fa-circle-o"></i> Brand List</a></li>
                    <li class="active"><a href="#!add_brand"><i class="fa fa-circle-o"></i> Add Brand</a></li>
                </ul>
            </li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div ng-view></div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a>SD</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Angular -->
<script src="../bower_components/angular/angular.min.js"></script>
<!-- Angular Route-->
<script src="../bower_components/angular/angular-route.js"></script>
<!-- Angular oclazyload-->
<script src="../bower_components/angular/oclazyload.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- notify -->
<script src="../bower_components/bootstrap-notify/bootstrap-notify.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- FastClick -->
<script src="../assets/js/script.js"></script>
<script src="../assets/js/app.route.js"></script>
<script src="../assets/js/services/userManagement.service.js"></script>
<script src="../assets/js/services/serviceManagement.service.js"></script>
<script src="../assets/js/services/saleManagement.service.js"></script>
<script src="../assets/js/services/productManagement.service.js"></script>
<script src="../assets/js/services/categoryManagement.service.js"></script>
<script src="../assets/js/services/dataPassing.service.js"></script>
<script src="../assets/js/services/stockManagement.service.js"></script>
<script src="../assets/js/services/compare-to.directive.js"></script>
<script src="../assets/js/controller.js"></script>
</body>
</html>
