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
                              <div class="form-group" >
                                  <label for="service">Service Name</label>
                                  <input type="text" name="service" id="service" ng-model="formData.service" class="form-control" ng-if = "inputVisible == true;" readonly>
                                  <select ng-model="formData.service" id="service" class="form-control select2" ng-change="getServiceTypes(formData.service)" ng-if="serviceCategory == 'category'" placeholder="Select E-Sikshana Service">
                                      <option value=""  disabled selected>Select Service</option>
                                      <option ng-repeat="cl in categoryList" value="{{cl.service_name}}">{{cl.service_name}}</option>
                                  </select>
                                  <!-- <select ng-model="formData.service" id="service" class="form-control select2" ng-change="getServiceTypes(formData.service)" ng-if="service == 'eGovernance'" placeholder="Select E-Governance Service">
                                      <option value="" selected>Select Service</option>
                                      <option value="Income Certificate">Income Certificate</option>
                                      <option value="Living Certificate">Living Certificate</option>
                                      <option value="Domecile Certificate">Domecile Certificate</option>
                                      <option value="Non Tenancy Certificate">Non Tenancy Certificate</option>
                                      <option value="Residence Certificate">Residence Certificate</option>
                                      <option value="Minority Certificate">Minority Certificate</option>
                                  </select> -->
                              </div>
                              <div class="form-group">
                                  <label for="service_cost">Service Cost</label>
                                  <input type="text" ng-model="formData.service_cost" id="service_cost" class="form-control" readonly>
                              </div>
                          </div> 
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="sell_date">Date</label>
                                <input type="text" class="form-control datepicker" name="sell_date" id="sell_date" ng-model="formData.sell_date" required>
                              </div>
                              <div class="form-group">
                                  <label for="service_no">ServiceNumber</label>
                                  <input type="text" ng-model="formData.service_no" id="service_no" class=" form-control form-control-static" readonly>
                              </div>
                              
                          </div>
                      </div>
                      <!-- Extra Customer Details -->
                      
                      <div class="row" ng-if="service == 'PAN' || service == 'GST'">
                        <hr>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="customer_pan">Customer PAN</label>
                              <input type="text" ng-model="formData.customer_pan" id="customer_pan" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="customer_aadhar">Customer Aadhar</label>
                              <input type="text" ng-model="formData.customer_aadhar" id="customer_aadhar" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <!-- Extra Customer Details End -->
                      <!-- fixed details -->
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="customer_name">Customer Name</label>
                              <input type="text" ng-model="formData.customer_name" id="customer_name" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="customer_contact">Customer Contact Number</label>
                              <input type="text" ng-model="formData.customer_contact" id="customer_contact" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="customer_add">Customer Address</label>
                              <textarea ng-model="formData.customer_add" id="customer_add" class="form-control" required></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="payment_mode">Payment Mode</label>
                              <!-- <input type="text" ng-model="formData.payment_mode" id="payment_mode" class="form-control"> -->
                              <select class="form-control" ng-model="formData.payment_mode" id="payment_mode" ng-change="inputTrxId(formData.payment_mode)">
                                <option value="cash">Cash</option>
                                <option value="online">Online</option>
                              </select>
                          </div>
                          <div class="form-group" ng-if="trx == true">
                              <label for="transactionId">Transaction ID</label>
                              <input type="text" ng-model="formData.transactionId" id="transactionId" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="amount_paid">Amount Paid</label>
                              <input type="text" ng-model="formData.amount_paid" id="amount_paid" class="form-control" required ng-keyup="getAmountDue()">
                          </div>
                          <div class="form-group">
                              <label for="amount_due">Amount Due</label>
                              <input type="number" min="0" ng-model="formData.amount_due" id="amount_due" class="form-control">
                          </div>
                        </div>
                      </div>
                      <!-- fixed details end -->

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

    <!-- modal -->
    <!-- Modal -->
<div id="serviceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-title">
          <div class="col-md-6">
            GKMS
          </div>
          <div class="col-md-6">
            <p class="pull-right">Date: {{serviceFormObject.sell_date}}</p>&nbsp;
            <p class="pull-right">Reciept: {{serviceFormObject.service_no}}</p>&nbsp;
          </div>
        </div>
      </div>
      <div class="modal-body">

        <p>
          <table class="table">
            <tr>
              <th>
                Service Name: 
              </th>
              <td>
                {{formData.service}}
              </td>
            </tr>
            <tr>
              <th>
                Name: 
              </th>
              <td>
                {{formData.customer_name}}
              </td>
            </tr>
            <tr>
              <th>
                Mobile Number: 
              </th>
              <td>
                {{formData.customer_contact}}
              </td>
            </tr>
            <tr>
              <th>
                Address: 
              </th>
              <td>
                {{formData.customer_add}}
              </td>
            </tr>
            <tr>
              <th>
                Payment Mode: 
              </th>
              <td>
                {{formData.payment_mode}}
              </td>
            </tr>
            <tr>
              <th>
                Amount Paid
              </th>
              <td>
                {{formData.amount_paid}}
              </td>
            </tr>
            <tr>
              <th>
                Amount Due: 
              </th>
              <td>
                {{formData.amount_due}}
              </td>
            </tr>
          </table>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="submitServiceSale()" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  </main>