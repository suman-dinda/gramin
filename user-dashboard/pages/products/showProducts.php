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
                          <div class="col-md-6 col-xs-6"><button type="button" ng-click="viewProduct(prd)" class="btn btn-danger"><i class="fa fa-eye fa-fw"></i></button></div>
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

    <!-- View Product Modal -->
  <div class="modal fade" id="viewProductModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Product Details</h4>
          </div>
          <div class="modal-body">
            <h4 class="center" id='product_name'>Product Name</h4>
            <section>
              <div class="row">
                <div class="col-md-6 col-xs-6">
                  <div class="form-group">
                    <label>Brand :</label>
                    <p id='brand'></p>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6">
                  <div class="form-group">
                    <label>Category & SubCategory :</label>
                    <p id='category'></p>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6">
                  <strong>Cost :</strong><span id='cost'></span>
                </div>
                <div class="col-md-6 col-xs-6">
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <strong>Size :</strong><span id='size'></span>
                    </div>
                    <div class="col-md-6 col-xs-6"><strong>Tax :</strong><span id='tax'></span></div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <strong>Product Description</strong><br>
                  <span id="description"></span>
                </div>
              </div>

            </section>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>