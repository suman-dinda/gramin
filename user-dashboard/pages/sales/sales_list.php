<main ng-controller="salesController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{salesTitle}}
        <small>Control panel</small>
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
              <div class="box-header with-border">
                <h3 class="box-title">SubCategory List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable" ng-init="getUserSale()">
                      <thead>
                        <tr>
                          <th>Sale Id</th>
                          <th>Sale Date</th>
                          <th>Sale Customer</th>
                          <th>Sale Total Bill</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="sale in saleList">
                            <td>{{sale.id}}</td>
                            <td>{{sale.sale_date}}</td>
                            <td>{{sale.sale_customer}}</td>
                            <td>{{sale.sale_totbill}}</td>
                            <td><span ng-click="viewSaleDetails(sale, $index)"><i class="fa fa-fw fa-eye"></i></span></td>
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