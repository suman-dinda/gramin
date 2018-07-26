<main ng-controller="transferController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{purchaseReqTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Request</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Purchase Request List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>Req Id</th>
                          <th>User Unique</th>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Stock Requested</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="sr in stockReq">
                            <td>{{sr.id}}</td>
                            <td>{{sr.user_unique}}</td>
                            <td>{{sr.product_id}}</td>
                            <td>{{sr.product_name}}</td>
                            <td>{{sr.stock_unit}}</td>
                            <td>{{sr.status}}</td>
                            <td><span ng-click="assignStock(stockReq,$index)"><i class="fa fa-fw fa-pencil"></i></span></td>
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

     <!-- Modal -->
    <div class="modal fade" id="assineeModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <form name="assigneeForm" id="assigneeForm" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Assign Stock</h4>
          </div>
          <div class="modal-body">
            <!-- <pre>{{currentRequest}}</pre> -->
            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="text" class="form-control" name="product_name" ng-model="af.product_name">
            </div>
            <div class="form-group">
              <label for="stock_req">Stock Requested</label>
              <input type="text" class="form-control" name="stock_req" ng-model="af.stock_req">
            </div>
            <div class="form-group">
              <label for="stock_assigned">Stock Assigned</label>
              <input type="text" class="form-control" name="stock_assigned" ng-model="af.stock_assigned">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
        
      </div>
    </div>
    
  </div>

</main>