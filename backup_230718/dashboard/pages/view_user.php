<main ng-controller="viewUser">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{title}}
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
                <h3 class="box-title">{{usertype}} List</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <table class="table dataTable">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Pincode</th>
                            <th>Creation Date</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="user in userData">
                              <td>{{user.u_email}}</td>
                              <td>{{user.u_firstname}} {{user.u_lastname}}</td>
                              <td>{{user.u_mobile}}</td>
                              <td>{{user.u_pincode}}</td>
                              <td>{{user.u_usercreationdate}}</td>
                              <td>{{user.u_assignedto}}</td>
                              <td><span ng-click="editUser(user.u_id)"><i class="fa fa-fw fa-pencil"></i></span> &nbsp;<span ng-click="deleteUser(user.u_id)"><i class="fa fa-fw fa-trash"></i></span></td>
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