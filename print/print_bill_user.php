<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- g00gle font -->
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
  <style type="text/css">
    html,body{
      font-family: 'Comfortaa', cursive;
    }
    .right{
      text-align: right;
    }
    .center{
      text-align: center;
    }
    .left{
      text-align: left;
    }
    .signature{
        text-align: center;
        width: 20%;
        position: absolute;
        right: 2%;
        margin-top: 5%;
        border-top: 1px solid #ccc;
    }
    td.cust-dashed {
        padding: 1.5%;
        border-bottom: 1px dashed;
    }
    .full-width{width: 100%;}
    .total-amount-section{
      background: #ccc;font-family: fantasy;
    }
    #prod_thead{
      background: #ddd !important;
    }
    @media print {
        .total-amount-section{
          background: #eee !important;font-family: fantasy;
          padding-top: 1px !important;
          padding-bottom: 1px !important;
          -webkit-print-color-adjust: exact;
        }
    }
    @media print{
       #prod_thead th{
          background-color: #ccc !important;
          -webkit-print-color-adjust: exact;
        }
    }
    /*@page { size: auto;  margin: 5mm; padding: 2mm; }*/
  </style>
</head>
<body>
<main ng-controller="printController">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
          UdyogaSanjeevini
      </h1>
      <h3  align="center">Sales Bill</h3>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <?php
                $x = base64_decode($_GET['data']);

                $jsonData = json_decode($x,true);
                $cart = json_decode($jsonData['cart'],true);
                $uDetails = $jsonData['userFullName'];
              ?>
              <table align="center" class="table details-section">
                  <tr>
                    <td class="left">
                        <table class="full-width">
                          <tr>
                            <td>Customer Name :&nbsp;</td>
                            <td class="cust-dashed"><?php echo $jsonData['sale_customer'];?></td>
                          </tr>
                          <tr>
                            <td>Customer Address :&nbsp;</td>
                            <td class="cust-dashed"><?php echo $jsonData['sale_custadd'].", ".$jsonData['sale_custlocation']; ?></td>
                          </tr>
                        </table>
                    </td>
                    <td class="center">
                      <table class="full-width">
                        <tr>
                          <td>Mobile :&nbsp;</td>
                          <td class="cust-dashed"><?php echo $jsonData['sale_custmobile']; ?></td>
                        </tr>
                      </table>
                    </td>
                    <td class="center">
                        <table class="full-width">
                        <tr>
                          <td>Sale No. :&nbsp;</td>
                          <td class="cust-dashed"><?php print($jsonData['sale_no']); ?></td>
                        </tr>
                        <tr>
                          <td>Date :&nbsp;</td>
                          <td class="cust-dashed"><?php echo $jsonData['sale_date']; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              </table>
              <table class="table table-striped" style="margin-bottom: 50px">
                <thead id="prod_thead">
                  <tr>
                    <th>Sl No.</th>
                    <th>ProductCode</th>
                    <th>ProductName</th>
                    <th>ProductCategory</th>
                    <th>ProductQuantity</th>
                    <th>Tax</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      for($i=0;$i<count($cart);$i++){
                        $count = $i;
                        ++$count;
                  ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $cart[$i]['product_code']; ?></td>
                        <td><?php echo $cart[$i]['product_name']; ?></td>
                        <td><?php echo $cart[$i]['product_category']; ?></td>
                        <td><?php echo $cart[$i]['product_quantity']; ?></td>
                        <td><?php echo $cart[$i]['product_tax']; ?></td>
                        <td><?php echo $cart[$i]['product_totprice']; ?></td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
              <div class="col-md-12 total-amount-section">
                <h4 align="right">Total Amount : <?php echo $jsonData['totalBill']."/-"; ?></h4>
              </div>
              <div class="right">
                <div align="right" class="signature">
                  <p class="center">
                    <h5><?php echo $uDetails['u_firstname']." ".$uDetails['u_lastname'];?></h5>
                    <p>
                      <strong>-Sale Authorised By-</strong>
                    </p>
                  </p>
                </div>
              </div>
              
          </div>
        </div>
      </div>
    </section>
</main>
<!-- Angular -->
<script src="../bower_components/angular/angular.min.js"></script>
<!-- Angular Route-->
<script src="../bower_components/angular/angular-route.js"></script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
</body>
</html>
