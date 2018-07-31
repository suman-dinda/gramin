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
                
                $jsonData = json_decode($_GET['data'],true);
               // print_r($jsonData);
                  print($jsonData['sale_no']);
               echo $jsonData['sale_product'];
               
               echo $jsonData['sale_chalan'];
               echo $jsonData['internal_note'];
               echo $jsonData['sale_date'];
               echo $jsonData['totalBill'];
               $cart = json_decode($jsonData['cart'],true);


               
               for($i=0;$i<count($cart);$i++){
                  echo $cart[$i]['product_code'];
                  echo $cart[$i]['product_name'];
                  echo $cart[$i]['product_category'];
                  echo $cart[$i]['product_subcategory'];
                  echo $cart[$i]['product_quantity'];
                  echo $cart[$i]['product_tax'];
                  echo $cart[$i]['product_totprice'];

               }

              ?>
              <div class="container">
                <div class="row">
                  <div class="col-md-4"> 
                    <?php
                      echo "Name: ".$jsonData['sale_customer']."<br>";
                      echo $jsonData['sale_custadd']."<br>";
                      echo $jsonData['sale_custlocation'];




                    ?>
                  </div>
                  <div class="col-md-4">
                    <?php
                        echo "M: ".$jsonData['sale_custmobile'];
                      ?>
                  </div>
                  <div class="col-md-4">
                       <?php
                        print("Sale Number: ".$jsonData['sale_no'])." <br>";
                        echo 'Date: '.$jsonData['sale_date']

                      ?>
                  </div>
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
