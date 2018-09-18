<main ng-controller="requestProduct">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{showProductsTitle}}
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
                <div class="col-md-3 product-grid" ng-repeat="prd in productStock">
                  <div class="card">
                    <img class="img-responsive product_img" src="../upload/{{prd.product_images.split(',')[0]}}" onerror="this.src='../assets/img/product_dummy.png'">

                    <section class="center">
                      <h4><strong>{{prd.product_name}}</strong></h4>
                      <p>
                        <em>{{prd.product_code}}</em>
                      <p>
                      </p>
                        {{prd.product_category}} - {{prd.product_subcategory}}
                      </p>
                      <div class="row">
                        <div class="col-md-6">MRP : {{prd.product_cost}}</div>
                        <div class="col-md-6">Tax : {{prd.product_tax}}</div>
                      </div>
                    </section>
                    <section class="center">
                      <h5>Current Stock: {{prd.id | stockFilter}}</h5>
                    </section>
                    <section class="footer-buttons center">
                        <div class="row">
                          <div class="col-md-6 col-xs-6"><button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
                          <div class="col-md-6 col-xs-6"><a ng-href="#!product_details/{{prd.id}}" class="btn btn-danger"><i class="fa fa-eye fa-fw"></i></a></div>
                        </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

   