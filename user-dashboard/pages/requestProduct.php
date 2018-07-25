<main ng-controller="requestProduct">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{title}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View User</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Request Product Stock</h3>
              </div>
              <form role="form" id="requestProduct" ng-submit="requestProduct()">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="product_name">Select Product</label>
                                  <select ng-model="formData.product" id="product_name" class="form-control select2">
                                      <option ng-repeat="prd in products" value="{{prd.id}}">{{prd.product_name}}</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="stock_req">Stock Required</label>
                                  <input type="text" ng-model="formData.stock_req" id="stock_req" class="form-control">
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Request Product</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>