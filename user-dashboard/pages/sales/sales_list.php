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
                    <table class="table dataTable">
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
                        <tr ng-repeat="sale in sale_list">
                            <td>{{sale.id}}</td>
                            <td>{{sale.subcategory_name}}</td>
                            <td>{{sale.category_name}}</td>
                            <td>{{sale.subcategory_desc}}</td>
                            <td><span ng-click="editCSB(sale.id)"><i class="fa fa-fw fa-pencil"></i></span> &nbsp;<span ng-click="deleteCSB(sale.id)"><i class="fa fa-fw fa-trash"></i></span></td>
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