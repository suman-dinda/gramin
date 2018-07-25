<main ng-controller="categoryController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{addCategoryTitle}}
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
          <form role="form" id="add_category_form" ng-submit="addCategory()">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">New Category</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="category_name">Category Name</label>
                            <input class="form-control" type="text" ng-model="formData.category_name" name="category_name" id="category_name">
                      </div>
                      <div class="form-group">
                        <label for="category_desc">Category Description</label>
                            <textarea class="form-control" ng-model="formData.category_desc" name="category_desc" id="category_desc"></textarea>
                      </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
          </div>
        </form>
        </div>
      </div>
    </section>
</main>