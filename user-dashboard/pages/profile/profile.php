<main ng-controller="profileController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{titl}}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Your Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" ng-init="loadProfile()">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
                
                <!-- form-start -->
                <form role="form" id="createUserForm" ng-submit="createNewUser()">
                  <div class="box-header with-border">
                    <h3 class="box-title">Basic Details</h3>
                  </div>
                  <!-- box-body -->
                    <div class="box-body">
                      <!-- form-row-1 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstname">First Name</label>
                              <input type="text" ng-model="formData.firstname" class="form-control" id="firstname" placeholder="Enter First Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="lastname">Last Name</label>
                              <input type="text" ng-model="formData.lastname" class="form-control" id="lastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                      </div>
                      <!-- form-row-2 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="fathersname">Father's Name</label>
                              <input type="text" ng-model="formData.fathersname" class="form-control" id="fathersname" placeholder="Enter Father's Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="dob">Date Of Birth</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" ng-model="formData.dob" id="dob" autocomplete="off" placeholder="Enter Date Of Birth" required>
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- form-row-3 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="mobile">Mobile Number</label>
                              <input type="text" ng-model="formData.mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number" maxlength="12" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="aadhar">Aadhar Number</label>
                              <input type="text" ng-model="formData.aadhar" class="form-control" id="aadhar" placeholder="Enter Aadhar Number" maxlength="12" required>
                            </div>
                        </div>
                      </div>
                      <!-- form-row-4 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="pan">PAN Number</label>
                              <input type="text" ng-model="formData.pan" class="form-control" id="pan" placeholder="Enter PAN Number" maxlength="12" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email Id</label>
                              <input type="email" ng-model="formData.email" class="form-control" id="email" placeholder="Enter Email Id" maxlength="50" required>
                            </div>
                        </div>
                      </div>
                      <!-- form-row-5 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="district">District</label>
                              <input type="text" ng-model="formData.district" class="form-control" id="district" placeholder="Enter District" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="taluk">Taluk</label>
                              <input type="text" ng-model="formData.taluk" class="form-control" id="taluk" placeholder="Enter Taluk" required>
                            </div>
                        </div>
                      </div>
                      <!-- form-row-6 -->
                      <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="address">Address</label>
                              <textarea ng-model="formData.address" class="form-control" id="address" placeholder="Enter Address" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="pincode">Pincode</label>
                              <input type="text" ng-model="formData.pincode" class="form-control" id="pincode" placeholder="Enter Pincode" maxlength="7" required>
                            </div>
                        </div>
                      </div>
                    <!-- /.box-body -->
                    <div class="box-header with-border">
                      <h3 class="box-title">Bank Details</h3>
                    </div>
                    <!-- box-body -->
                    <div class="box-body">
                        <!-- form-row-7 -->
                        <div class="row"> 
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="address">Account Number</label>
                                <input type="text" ng-model="formData.account" class="form-control" id="account" placeholder="Enter A/C Number" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="ifsc">IFSC Code</label>
                                <input type="text" ng-model="formData.ifsc" class="form-control" id="ifsc" placeholder="Enter IFSC Code" required>
                              </div>
                          </div>
                        </div>
                        <!-- form-row-8 -->
                        <div class="row"> 
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="accounttype">Account Type</label>
                                <input type="text" ng-model="formData.accounttype" class="form-control" id="accounttype" placeholder="Enter A/C Type" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="bank">Bank Name</label>
                                <input type="text" ng-model="formData.bank" class="form-control" id="bank" placeholder="Enter Bank Name" required>
                              </div>
                          </div>
                        </div>

                    </div>
                    <div>
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