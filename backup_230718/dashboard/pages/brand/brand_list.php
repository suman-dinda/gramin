<main ng-controller="brandController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{brandTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brand</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>Brand Id</th>
                          <th>Brand Name</th>
                          <th>Brand Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="brand in brands">
                            <td>{{brand.id}}</td>
                            <td>{{brand.brand_name}}</td>
                            <td>{{brand.brand_description}}</td>
                            <td><span ng-click="editCSB(brand.id)"><i class="fa fa-fw fa-pencil"></i></span> &nbsp;<span ng-click="deleteCSB(brand.id)"><i class="fa fa-fw fa-trash"></i></span></td>
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