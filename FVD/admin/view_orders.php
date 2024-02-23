<?php
include("connection.php");
if (!isset($_SESSION['customer_login'])) {
  header("Location: index.php");
}

$msg = "";

if (isset($_SESSION['completed'])) {
  $deleted = "<div class='success'>Order has been successfully marked as completed</div>";
  unset($_SESSION['completed']);
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
    .completed {
        color: black;
        border-radius: 6px;
        font-size: 30px;
        margin-top: -15px;
    }


    .success {
        background-color: green;
        padding: 10px;
        border: 1px solid black;
        margin-top: 10px;
        margin-bottom: 10px;
    }

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

    .link {
        color: black;
        font-weight: 800;
    }

    .link:hover {
        color: blue;
        text-decoration: none;
    }

    table th {
        padding: 15px;
    }

    table tr td {
        padding: 15px;

    }

    tr {
        padding: 20px !important;
        border-radius: 20px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h2 align="center" class=" mt-2"><b>All Purchases</b></h2>
    <div class="container">
        <div class="col-md-12 ml-auto mr-auto"
            style="border:1px solid grey;padding:30px;margin-top:20px;background-color:white;border-radius:30px;">

            <?php echo $msg; ?>
            <div class="data pb-5">

                <?php



    global $con;

    $get_c = "select * from orders Order by id desc";
    $run_c = mysqli_query($con, $get_c);
    $number = mysqli_num_rows($run_c);
    if ($number > 0) {

      echo
        '
                <table  width="100%" >
                <tr>
                <th>Sr</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Details</th>
                </tr>
                ';

      $sr = 0;
      while ($row_c = mysqli_fetch_array($run_c)) {
        $id = $row_c['id'];
        $fname = $row_c['fname'];
        $lname = $row_c['lname'];
        $email = $row_c['email'];
        $address = $row_c['address'];
        $country = $row_c['country'];
        $state = $row_c['state'];
        $zip = $row_c['zip'];
        $payment = $row_c['payment'];
        $status = $row_c['status'];

        $address = substr($address, 0, 12);
        $sr++;

        ?>

                <tr>


                    <td>
                        <?php echo $sr; ?>
                    </td>
                    <td>
                        <?php echo $fname; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td width="300">
                        <?php echo $country; ?>
                    </td>
                    <td>
                        <?php echo "$";
            echo $payment; ?>
                    </td>
                    <td>
                        <?php echo $status; ?>
                    </td>
                    <td><a href="admin_panel.php?orderdetails=<?php echo $id; ?>" class="link">View </a></td>
                </tr>
                <?php
      }
    } else {
      echo '<h4 align="center">No order to show</h4>';
      echo '<h5 align="center">Once you receive any order(s), They will show up here.</h5>';
    }
    ?>
                </table>
                <div>
                </div>
            </div>


            <script src="js/bootstrap.min.js"></script>

</body>

</html>