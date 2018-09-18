<main ng-controller="productDetails">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Title}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product Description</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" ng-init="productDescription()">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                    
                  </div>
                  <div class="col-md-6">
                      <h3>{{prd_obj.product_name}}</h3>
                      <h4>{{prd_obj.product_cost | currency}}</h4>
                      <table class="table">
                        <tr>
                          <th>Brand</th>
                          <td>{{prd_obj.product_brand}}</td>
                        </tr>
                        <tr>
                          <th>Category</th>
                          <td>{{prd_obj.product_category}}</td>
                        </tr>
                      </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</main>