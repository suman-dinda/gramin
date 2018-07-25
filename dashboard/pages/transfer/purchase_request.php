<main ng-controller="transferController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{purchaseReqTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Request</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Purchase Request List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>Req Id</th>
                          <th>User Unique</th>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Stock Requested</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="sr in stockReq">
                            <td>{{sr.id}}</td>
                            <td>{{sr.user_unique}}</td>
                            <td>{{sr.product_id}}</td>
                            <td>{{sr.product_name}}</td>
                            <td>{{sr.stock_unit}}</td>
                            <td>{{sr.status}}</td>
                            <td><span ng-click="assignStock(sr.id)"><i class="fa fa-fw fa-pencil"></i></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
</main>