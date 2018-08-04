<main ng-controller="salesController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{addSaleTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form role="form" id="add_sale_form" ng-submit="addSale()">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">New Sales</h3>
                </div>
                <div class="box-body">
                  <div class="row">
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
                      <div class="form-group">
                        <label for="sale_product">Select Product</label>
                        <select class="form-control select2" name="sale_product" ng-model="formData.sale_product" id="sale_product" ng-change="addtoCart(formData.sale_product)" required>
                          <option ng-repeat="prd in products" data-id="{{prd.product_id}}" data-stock="{{prd.stock_unit}}" value="{{prd.id}}">{{prd.product_name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 shipping-address">
                      <div class="box-header with-border">
                        <h3 class="box-title">Shipping Details</h3>
                      </div>
                      <div class="box-body">
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
                  <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped" id="cartTable">
                          <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Product ID</th>
                              <th>Product Name</th>
                              <th>Product Category</th>
                              <th>Quantity</th>
                              <th>Current Stock</th>
                              <th>Product MRP</th>
                              <th>Tax</th>
                              <th>Total Cost</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr ng-repeat="c in cart">
                              <td>{{c.product_code}}</td>
                              <td>{{c.id}}</td>
                              <td>{{c.product_name}}</td>
                              <td>{{c.product_category}}</td>
                              <td><input type="number" name="pquantity" ng-model="pquantity" class="form-control" min="1" max="{{c.stock}}"></td>
                              <td>{{c.stock - pquantity}}</td>
                              <td>{{c.product_cost}}</td>
                              <td>{{c.product_tax}}</td>
                              <td class="totalAmt">{{(pquantity * c.product_cost) + (pquantity*c.product_cost*(c.product_tax/100))}}</td>
                            </tr>
                           
                            
                          </tbody>
                        </table>
                        <table class="table">
                           <tr>
                              <td style="text-align: right;" colspan="7">Total ::</td>
                              <td colspan="8">{{totalAmount}}</td>
                            </tr>
                        </table>
                        <div class="form-group">
                          <button type="button" class="btn btn-success" ng-click="gi()">Total Ammount</button>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="control-group">                     
                        <div class="controls">
                          <div class="tabbable">
                            <ul class="nav nav-tabs">
                              
                              <li class="active"><a data-toggle="tab" aria-expanded="true">Internal Note</a></li>
                            </ul>                           
                            <br>
                              <div class="tab-content">
                                <div class="tab-pane active" id="internal_note">
                                  <textarea class="col-sm-12 form-control" id="note" name="internal_note" ng-model="formData.internal_note" value=""></textarea>
                                  <span style="color:red;" id="err_note" required></span>
                                </div>
                              </div>
                            </div>
                          </div> <!-- /controls -->       
                      </div> <!-- /control-group --> 
                    </div>
                  </div> 
                  <!-- internal note row end -->
                  <div class="row">
                    <div class="col-md-12">
                      <br>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          &nbsp;&nbsp;&nbsp;
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </section>
</main>