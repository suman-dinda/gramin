<main ng-controller="brandController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{addBrandTitle}}
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
          <form role="form" id="add_brand_form" ng-submit="addBrand()">
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">New Brand</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                            <input class="form-control" type="text" ng-model="formData.brand_name" name="brand_name" id="brand_name">
                      </div>
                      <div class="form-group">
                        <label for="brand_desc">Brand Description</label>
                            <textarea class="form-control" ng-model="formData.brand_desc" name="brand_desc" id="brand_desc"></textarea>
                      </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
          </div>
        </form>
        </div>
      </div>
    </section>
</main>