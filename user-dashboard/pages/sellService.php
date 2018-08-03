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
              <form role="form" id="requestProduct" ng-submit="requestProduct()">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="service">Select Service</label>
                                  <select ng-model="formData.service" id="service" class="form-control select2">
                                      <option ng-repeat="srv in services" value="{{srv.id}}">{{srv.service_name}}</option>
                                  </select>
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