<main ng-controller="createService">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{title}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Service</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <!-- form-start -->
                <form role="form" id="createServiceForm" ng-submit="createNewService()">
                  <div class="box-header with-border">
                    <h3 class="box-title">Basic Details</h3>
                  </div>
                  <!-- box-body -->
                    <div class="box-body">
                      <!-- form-row-1 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="servicename">Service Name</label>
                              <input type="text" ng-model="serviceData.servicename" class="form-control" id="servicename" placeholder="Enter Service Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="serviceamount">Service Amount</label>
                              <input type="text" ng-model="serviceData.serviceamount" class="form-control" id="serviceamount" placeholder="Enter Service Amount">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
    </section>
  </main>