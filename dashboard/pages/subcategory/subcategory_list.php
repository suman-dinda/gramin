<main ng-controller="subcategoryController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{subcategoryTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">SubCategory</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">SubCategory List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>SubCategory Id</th>
                          <th>SubCategory Name</th>
                          <th>Dependent Category</th>
                          <th>SubCategory Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="scat in subcategories">
                            <td>{{scat.id}}</td>
                            <td>{{scat.subcategory_name}}</td>
                            <td>{{scat.category_name}}</td>
                            <td>{{scat.subcategory_desc}}</td>
                            <td><span ng-click="editCSB(scat.id)"><i class="fa fa-fw fa-pencil"></i></span> &nbsp;<span ng-click="deleteCSB(scat.id)"><i class="fa fa-fw fa-trash"></i></span></td>
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