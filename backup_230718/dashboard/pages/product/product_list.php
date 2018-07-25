<main ng-controller="productController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{productTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>Prouct Code</th>
                          <th>Product Name</th>
                          <th>Product Unit</th>
                          <th>Product Size</th>
                          <th>Product Category</th>
                          <th>Product SubCategory</th>
                          <th>Product Cost</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="prd in products">
                            <td>{{prd.product_code}}</td>
                            <td>{{prd.product_name}}</td>
                            <td>{{prd.product_unit}}</td>
                            <td>{{prd.product_size}}</td>
                            <td>{{prd.product_category}}</td>
                            <td>{{prd.product_subcategory}}</td>
                            <td>{{prd.product_cost}}</td>
                            <td><i class="fa fa-pencil"></i> &nbsp;<i class="fa fa-trash"></i></td>
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