<main ng-controller="subcategoryController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{editSubCategoryTitle}}
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
          <form role="form" id="add_subcategory_form" ng-submit="addSubCategory()">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">New Sub Category</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="subcategory_name">SubCategory Name</label>
                            <input class="form-control" type="text" ng-model="formData.subcategory_name" name="subcategory_name" id="subcategory_name">
                      </div>
                      <div class="form-group">
                        <label for="subcategory_desc">SubCategory Description</label>
                            <textarea class="form-control" ng-model="formData.subcategory_desc" name="subcategory_desc" id="subcategory_desc"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                            <select class="form-control select2" ng-model="formData.category" name="category" id="category">
                                <option ng-repeat="category in categories" value="{{category.id}}">{{category.category_name}}</option>
                            </select>
                      </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Category</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
          </div>
        </form>
        </div>
      </div>
    </section>
</main>