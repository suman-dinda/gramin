<main ng-controller="productController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{addProductTitle}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <form id="addProduct" ng-submit="addProduct()" enctype="multipart/form-data">
                <div class="box-header with-border">
                    <h3 class="box-title">New Product</h3>
                  </div>
                  <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="prd_code">Product Code</label>
                            <input class="form-control" type="text" ng-model="formData.prd_code" name="prd_code" id="prd_code" readonly>
                          </div>
                          <div class="form-group">
                            <label for="prd_name">Product Name</label>
                            <input class="form-control" type="text" ng-model="formData.prd_name" name="prd_name" id="prd_name">
                          </div>
                          <div class="form-group">
                            <label for="prd_unit">Product Unit</label>
                            <input class="form-control" type="text" ng-model="formData.prd_unit" name="prd_unit" id="prd_unit">
                          </div>
                          <div class="form-group">
                            <label for="prd_size">Product Size</label>
                            <input class="form-control" type="text" ng-model="formData.prd_size" name="prd_size" id="prd_size">
                          </div>
                          <div class="form-group">
                            <label for="prd_category">Select Category</label>
                            <select class="form-control" ng-model="formData.prd_category" name="prd_category" id="prd_category" ng-change="getSubCategory(formData.prd_category)">
                                <option ng-repeat="category in categories" value="{{category.id}}">{{category.category_name}}</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="prd_subcategory">Select SubCategory</label>
                            <select class="form-control" ng-model="formData.prd_subcategory" name="prd_subcategory" id="prd_subcategory">
                               <option ng-repeat="subcategory in subCategories" value="{{subcategory.subcategory_name}}">{{subcategory.subcategory_name}}</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="prd_brand">Select Brand</label>
                            <select class="form-control" ng-model="formData.prd_brand" name="prd_brand" id="prd_brand">
                                <option ng-repeat="brand in brands" value="{{brand.brand_name}}">{{brand.brand_name}}</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="prd_cost">Product Cost</label>
                            <input class="form-control" type="text" ng-model="formData.prd_cost" name="prd_cost" id="prd_cost">
                          </div>
                          <div class="form-group">
                            <label for="prd_delear_price">Net Dealer Price</label>
                            <input class="form-control" type="text" ng-model="formData.prd_delear_price" name="prd_delear_price" id="prd_delear_price">
                          </div>
                          <div class="form-group">
                            <label for="prd_tax">Product Tax</label>
                            <select class="form-control" type="text" ng-model="formData.prd_tax" name="prd_tax" id="prd_tax">
                              <option value="0">0%</option>
                              <option value="5">5%</option>
                              <option value="12">12%</option>
                              <option value="18">18%</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="prd_description">Product Description</label>
                            <textarea class="form-control" ng-model="formData.prd_description" name="prd_description" id="prd_description"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="product_images">Select Product Images</label>
                            <input type='file' class="form-control" multiple ng-file="uploadfiles" accept="images/*">
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="gp_commission">GP Commission (in %)</label>
                                <input class="form-control" type="text" ng-model="formData.gp_commission" name="gp_commission" id="gp_commission" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="taluk_commission">Taluk Head Commission (in %)</label>
                                <input class="form-control" type="text" ng-model="formData.taluk_commission" name="taluk_commission" id="taluk_commission" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="dist_commission">District Head Commission (in %)</label>
                                <input class="form-control" type="text" ng-model="formData.dist_commission" name="dist_commission" id="dist_commission" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="zone_commission">Zone Head Commission (in %)</label>
                                <input class="form-control" type="text" ng-model="formData.zone_commission" name="zone_commission" id="zone_commission" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                  </div>
                  <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
                
              </form>
          </div>
        </div>
      </div>
    </section>
</main>