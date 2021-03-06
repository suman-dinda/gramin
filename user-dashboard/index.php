<?php
if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_name']) && isset($_COOKIE['user_type']) && isset($_COOKIE['userkey'])){
  $username = $_COOKIE['user_name'];
}else{
  ?>
  <script type="text/javascript">
    if(window.location.hostname == "localhost")
      location.href= window.location.protocol+"//"+window.location.hostname+"/gramin/user/";
    else
      location.href= window.location.protocol+"//"+window.location.hostname+"/user/";
  </script>
<?php }
?>
<!DOCTYPE html>
<html ng-app="graminUser">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GKMS | UserDashboard</title>
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
  <!-- custom style -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-controller="dashboardController">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GK</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>G K </b>M S</span>
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
              <span class="label label-success">0</span>
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
              <span class="label label-warning">0</span>
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
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" ng-show="cart.length === 0">You have 0 items</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" ng-show="cart.length !== 0">

                <li class="list-group-item" ng-repeat="c in cart">
                  <h4>{{c.product_name}} |<span style="color:blue"> {{c.count}} </span>| {{c.product_cost*c.count | currency}}</h4>
                  <input class="btn btn-danger" type="button" ng-click="removeItemCart(c)" value="Remove" />
                </li>
                </ul>
              </li>
              <li class="footer">
                <div class="col-md-6">
                   <a ng-href="#!checkOut">Checkout <i class="fa fa-fw fa-arrow-circle-right"></i></a>
                </div>
                <div class="col-md-6">
                  <a>Total : {{total | currency}}</a>
                </div>
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
                  <a ng-href="#!profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" ng-click="logout()">Sign out</a>
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
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!"><i class="fa fa-circle-o text-aqua"></i> Dashboard</a></li>
            <li class="treeview" ng-hide="subown=='false'"> <a href="#!"><i class="fa fa-circle-o text-yellow"></i> SubOrdinates</a>
                <ul class="treeview-menu">
                  <li class="active"><a href="#!view/subordinates"><i class="fa fa-circle-o"></i> Your Subordinates</a></li>
                </ul>
            </li>
            <li class="treeview" ng-hide="subown=='true'"><a href="#!"><i class="fa fa-circle-o text-yellow"></i> Services</a>
                <ul class="treeview-menu">
                  <li class="active"><a href="#!sell_service"><i class="fa fa-circle-o"></i> Sell Service</a></li>
                  <li class="active"><a href="#!service_list"><i class="fa fa-circle-o"></i> Service List</a></li>
                </ul>
            </li>
            <li class="treeview" ng-hide="subown=='true'"><a href="#!"><i class="fa fa-circle-o text-red"></i> Sales</a>
                <ul class="treeview-menu">
                  <li class="active"><a href="#!sales"><i class="fa fa-circle-o"></i> Sales List</a></li>
                  <li class="active"><a href="#!add_sales"><i class="fa fa-circle-o"></i> Add Sales</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#!"><i class="fa fa-circle-o text-yellow"></i>Products</a>
                <ul class="treeview-menu">
                  <li class="active"><a href="#!requestProduct"><i class="fa fa-circle-o"></i> Request Purchase</a></li>
                  <li class="active"><a href="#!showProducts"><i class="fa fa-circle-o"></i> Show Products</a></li>
                </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>UdyogaSanjeevini</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!sell_service/default/UdyogaSanjeevini"><i class="fa fa-circle-o"></i> Udyoga Sanjeevini Service</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>E-Sikshana</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!showProducts/E-Sikshana"><i class="fa fa-circle-o"></i> E-Sikshana Products</a></li>
            <li class=""><a href="#!sell_service/category/eSikshana"><i class="fa fa-circle-o"></i> E-Sikshana Service</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>E-Commerce</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> E-Commerce</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>E-Governance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!sell_service/category/eGovernance"><i class="fa fa-circle-o"></i> E-Governance Service</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>E-Banking</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> E-Banking</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Skill Development</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> Skill Development</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Utility BillPayments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> Utility BillPayments</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Solar Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!showProducts/Solar"><i class="fa fa-circle-o"></i> Solar Products</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Product Promotion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> Product Promotion</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Insurance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!comingSoon"><i class="fa fa-circle-o"></i> Insurance</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a>
            <i class="fa fa-dashboard"></i> <span>Financial Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#!sell_service/default/PAN"><i class="fa fa-circle-o"></i> PAN Service</a></li>
            <li class=""><a href="#!sell_service/default/GST"><i class="fa fa-circle-o"></i> GST Service</a></li>
          </ul>
        </li>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs" id="sidebar">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-key"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Change Password</h3>
        <ul class="control-sidebar-menu">
          <li>
              <!-- <i class="menu-icon fa fa-birthday-cake bg-red"></i> -->
              <div class="" style="padding: 3%">
                <form role="form" id="changePasswordForm" name="changePasswordForm" ng-submit="changePwd()">
                    <div class="form-group">
                      <label for="newpassword">New Password</label>
                      <input type="password" name="newpassword" id="newpassword" class="form-control" ng-model="formData.newpassword" required>
                      <!-- {{formData.newpassword}} -->
                    </div>
                    <div class="form-group">
                      <label for="confPaswd">Confirm Password</label>
                      <input type="password" name="repassword" id="repassword" compare-to="formData.newpassword" class="form-control" ng-model="formData.repassword" required>
                      <!-- <small ng-show="changePasswordForm.repassword.$error">Password didnot match</small> -->
                      <!-- {{formData.repassword}} -->
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning">Update Password</button>
                    </div>
                </form>
              </div>
          </li>
          
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Angular -->
<script src="../bower_components/angular/angular.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-cookies.min.js" data-require="angularjs@1.4" data-semver="1.4.4"></script>
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
<script src="../assets/js/user/user.app.js"></script>
<script src="../assets/js/user/user.route.js"></script>
<script src="../assets/js/services/dataPassing.service.js"></script>
<script src="../assets/js/services/userManagement.service.js"></script>
<script src="../assets/js/services/productManagement.service.js"></script>
<script src="../assets/js/services/stockManagement.service.js"></script>
<script src="../assets/js/services/saleManagement.service.js"></script>
<script src="../assets/js/services/serviceManagement.service.js"></script>
<script src="../assets/js/services/compare-to.directive.js"></script>
<script src="../assets/js/user/user.controller.js"></script>
</body>
</html>