<main ng-controller="sellService">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{titl}}
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
                <h3 class="box-title">Book Service</h3>
              </div>
              <form role="form" id="requestService" ng-submit="requestService()">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="service">Select Service</label>
                                  <select ng-model="formData.service" id="service" class="form-control select2" data-ng-options="srv as srv.service_name for srv in services" ng-change="getServiceAmount(formData.service)">
                                      <option value="" selected>Select Service</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="customer_name">Customer Name</label>
                                  <input type="text" ng-model="formData.customer_name" id="customer_name" class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="service_cost">Service Cost</label>
                                  <input type="text" ng-model="formData.service_cost" id="service_cost" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="customer_contact">Customer Contact Number</label>
                                  <input type="text" ng-model="formData.customer_contact" id="customer_contact" class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="payment_mode">Payment Mode</label>
                                  <input type="text" ng-model="formData.payment_mode" id="payment_mode" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="sell_date">Date</label>
                              <input type="text" class="form-control datepicker" name="sell_date" id="sell_date" ng-model="formData.sell_date" required>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                              <div class="form-group">
                                  <label for="service_no">ServiceNumber</label>
                                  <input type="text" ng-model="formData.service_no" id="service_no" class="form-control">
                              </div>
                          </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                  <label for="customer_add">Customer Address</label>
                                  <textarea ng-model="formData.customer_add" id="customer_add" class="form-control"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="amount_paid">Amount Paid</label>
                                  <input type="text" ng-model="formData.amount_paid" id="amount_paid" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="amount_due">Amount Due</label>
                                  <input type="text" ng-model="formData.amount_due" id="amount_due" class="form-control">
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Request Service</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>