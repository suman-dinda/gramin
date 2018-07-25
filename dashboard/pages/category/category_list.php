<main ng-controller="categoryController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{categoryTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table dataTable">
                      <thead>
                        <tr>
                          <th>Category Id</th>
                          <th>Category Name</th>
                          <th>Category Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="cat in categories">
                            <td>{{cat.id}}</td>
                            <td>{{cat.category_name}}</td>
                            <td>{{cat.category_description}}</td>
                            <td><span ng-click="editCSB(cat.id)"><i class="fa fa-fw fa-pencil"></i></span> &nbsp;<span ng-click="deleteCSB(cat.id)"><i class="fa fa-fw fa-trash"></i></span></td>
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