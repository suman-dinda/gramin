<main ng-controller="productDetails">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
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
                <h3 class="box-title">{{Title}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      
                    </div>
                    <div class="row">
                      
                        <div ng-repeat="images in _images track by $index" class="col-md-4">
                            <img src="{{servername}}upload/{{images}}" class="img-responsive" alt="{{images}}">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <h3>{{prd_obj.product_name}}</h3>
                      <h4 class="price-tag">{{prd_obj.product_cost | currency}}</h4>
                      <table class="table">
                        <tr>
                          <th>Product Code</th>
                          <td>{{prd_obj.product_code}}</td>
                        </tr>
                        <tr>
                          <th>Brand</th>
                          <td>{{prd_obj.product_brand}}</td>
                        </tr>
                        <tr>
                          <th>Category</th>
                          <td>{{prd_obj.product_category}}</td>
                        </tr>
                        <tr>
                          <th>SubCategory</th>
                          <td>{{prd_obj.product_subcategory}}</td>
                        </tr>
                        <tr>
                          <th>Size</th>
                          <td>{{prd_obj.product_size}}</td>
                        </tr>
                        <tr>
                          <th>Description</th>
                          <td>{{prd_obj.product_description}}</td>
                        </tr>
                      </table>
                  </div>
              </div>
              <div class="box-footer">
                <button class="float-right add-cart-btn" type="button" ng-click = "addToCart(prd_obj)">Add To Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</main>