<!DOCTYPE html>
<html ng-app="gramin">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- g00gle font -->
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
  <style type="text/css">
    html,body{
      font-family: 'Comfortaa', cursive;
    }
  </style>
</head>
<body>
<main ng-controller="printController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{salesprintTitle}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              {{printData}}
          </div>
        </div>
      </div>
    </section>
</main>
<!-- Angular -->
<script src="../bower_components/angular/angular.min.js"></script>
<!-- Angular Route-->
<script src="../bower_components/angular/angular-route.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../assets/js/script.js"></script>
<script src="../assets/js/controller.js"></script>
<script src="../assets/js/services/dataPassing.service.js"></script>
<script src="../assets/js/services/userManagement.service.js"></script>
</body>
</html>
