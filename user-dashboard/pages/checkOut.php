<main ng-controller="checkOut">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{checkoutTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">CheckOut</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Your Products</h3>
            </div>
            <div class="box-body">
              <form role="form" id="add_sale_form" ng-submit="addSale()">
              <div class="row">
                <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">Cart</div>
                      <div class="panel-body">
                        <div class="menu" ng-show="cart.length != 0">
                          <div class="row" ng-repeat="c in cart track by $index">
                            <div class="col-md-8">
                              <h5>{{c.product_name}} |<span style="color:blue"> {{c.count}} </span>| {{c.product_cost*c.count | currency}}
                              </h5>
                            </div>
                            <div class="col-md-4">
                              <input class="btn btn-danger" type="button" ng-click="removeItemCart(c)" value="Remove" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class=" col-md-4 pull-right">
                          <h4>Total Bill : {{total}}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default" ng-if="cart.length > 0">
                      <div class="panel-heading">Billing Address</div>
                      <div class="panel-body">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="sale_date">Date</label>
                              <input type="text" class="form-control datepicker" name="sale_date" id="sale_date" ng-model="formData.sale_date" required>
                            </div>
                            <div class="form-group">
                              <label for="sale_no">Reference No.</label>
                              <input type="text" class="form-control" name="sale_no" id="sale_no" ng-model="formData.sale_no" readonly>
                            </div>
                            <div class="form-group">
                              <label for="sale_chalan">Chalan No</label>
                              <input type="text" class="form-control" name="sale_chalan" id="sale_chalan" ng-model="formData.sale_chalan" required>
                            </div>
                            <div class="form-group">
                              <label for="sale_payment">Payment Mode</label>
                              <input type="text" class="form-control" name="sale_payment" id="sale_payment" ng-model="formData.sale_payment" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="sale_customer">Customer Name</label>
                              <input type="text" class="form-control" name="sale_customer" id="sale_customer" ng-model="formData.sale_customer" required>
                            </div>
                            <div class="form-group">
                              <label for="sale_custmobile">Customer Mobile</label>
                              <input type="text" class="form-control" name="sale_custmobile" id="sale_custmobile" ng-model="formData.sale_custmobile" required>
                            </div>
                            <div class="form-group">
                              <label for="sale_custlocation">Customer Location</label>
                              <input type="text" class="form-control" name="sale_custlocation" id="sale_custlocation" ng-model="formData.sale_custlocation" required>
                            </div>
                            <div class="form-group">
                              <label for="sale_custadd">Customer Address</label>
                              <textarea class="form-control" name="sale_custadd" id="sale_custadd" ng-model="formData.sale_custadd" required></textarea>
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- <div class="panel panel-default">
                      <div class="panel-heading">Panel Header</div>
                      <div class="panel-body">Panel Content</div>
                    </div> -->
                    <div class="col-md-4 pull-right">
                      <button type="submit" class="btn btn-primary">Add Sale</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

   