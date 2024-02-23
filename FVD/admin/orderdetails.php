<?php
include("connection.php");
if (!isset($_SESSION['customer_login'])) {
  header("Location: index.php");
}

if (isset($_GET['orderdetails'])) {
  $orderid = $_GET['orderdetails'];
}


?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Log in</title>
    <style>
    .submit {
        width: 50%;
        font-size: 20px;
        font-weight: 500;
        border: 1px solid #000000;
        border-radius: 6px;
        padding: 5px;
    }

    .submit:hover {
        background-color: #FFFFFF;
    }

    .data {
        overflow: auto;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 0px solid #dee2e6;
    }
    </style>
</head>

<body>
    <h2 align="center" class="mt-2"><b>Order Details</b></h2>
    <?php



  global $con;

  $get_c = "SELECT * FROM orders WHERE id = '$orderid' ";
  $run_c = mysqli_query($con, $get_c);

  while ($row_c = mysqli_fetch_array($run_c)) {
    $id = $row_c['id'];
    $fname = $row_c['fname'];
    $lname = $row_c['lname'];
    $email = $row_c['email'];
    $country = $row_c['country'];
    $state = $row_c['state'];
    $zip = $row_c['zip'];
    $payment = $row_c['payment'];
    $status = $row_c['status'];

  }
  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto"
                style="border:1px solid grey;padding:30px;margin-top:20px;background-color:white;border-radius:30px;">



                <table class="table" width="100%">

                    <tr>
                        <td>Name</td>
                        <td align="right">
                            <?php echo $fname;
              echo " ";
              echo $lname; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Email</td>
                        <td align="right">
                            <?php echo $email; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td align="right">
                            <?php echo $country; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>State</td>
                        <td align="right">
                            <?php echo $state; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Zip Code</td>
                        <td align="right">
                            <?php echo $zip; ?>
                        </td>
                    </tr>




                    <tr>
                        <td>Payment</td>
                        <td align="right">
                            $<?php echo $payment; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Order Status</td>
                        <td align="right">
                            <?php echo $status; ?>
                        </td>
                    </tr>

                </table>

                <table class="table" width="100%">
                    <tr>
                        <td style="padding-top: 25px;padding-bottom:0px">
                            <h6><b>Designs Purchased</b></h6>
                        </td>
                    </tr>
                </table>


                <table class="table" width="100%" style="margin-top: -10px;">

                    <th>Sr</th>
                    <th>Product title</th>

                    <?php

          $get = "SELECT * FROM order_products_details WHERE order_id = '$orderid' ";
          $run = mysqli_query($con, $get);
          $sr = 0;
          while ($row_c = mysqli_fetch_array($run)) {
            $product_id = $row_c['product_id'];
            $qty = $row_c['product_qty'];
            $sr++;

            $get1 = "SELECT * FROM products WHERE product_id = '$product_id' ";
            $run1 = mysqli_query($con, $get1);

            $row1 = mysqli_fetch_array($run1);
            $product_title = $row1["product_title"];

            echo '
                  <tr>
                  <td>' . $sr . '</td>
                  <td>' . $product_title . '</td>
                  <tr>
                ';
          }
          ?>
                </table>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.min.js"></script>

</body>

</html>