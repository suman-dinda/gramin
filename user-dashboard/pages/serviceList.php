<main ng-controller="sellService">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ServiceList}}
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
                <h3 class="box-title">Service Request List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <table class="table dataTable" ng-init="getIndividualServiceList()">
                        <thead>
                          <tr>
                            <th>Service Name</th>
                            <th>Service Date</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Amount Paid</th>
                            <th>Pay Mode</th>
                            <th>Amount Due</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="sl in serviceList">
                              <td>{{sl.service_name}}</td>
                              <td>{{sl.service_date}}</td>
                              <td>{{sl.customer_name}}</td>
                              <td>{{sl.customer_mobile}}</td>
                              <td>{{sl.amount_paid}}</td>
                              <td>{{sl.payment_mode}}</td>
                              <td>{{sl.amount_due}}</td>
                              <td>{{sl.status}}</td>
                              <td><a ng-click="showService(sl)"><i class="fa fa-fw fa-eye"></i></a></td>
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
  </main>