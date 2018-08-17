<main ng-controller="requestProduct">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{showProducts}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View User</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" ng-init="showProducts()">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Your Products</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-3" ng-repeat></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>