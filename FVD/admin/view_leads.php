<?php
include("connection.php");
if (!isset($_SESSION['customer_login'])) {
  header("Location: index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <title>All Leads</title>
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

    .table td,
    .table th {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 0px solid #dee2e6;
    }

    tr:nth-child(odd) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2 align="center" class=" mt-2"><b>All Leads</b></h2>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11 ml-auto mr-auto" style="border:1px solid grey;padding:30px;margin-top:20px;background-color:white;border-radius:30px;overflow:auto">

        <table class="table" width="100%">
          <tr>
            <th style="width:50px;">Sr</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Title</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Company</th>
            <th>Industry</th>
            <th>Country</th>
            <th>Service Of Interest</th>
            <th>Date Of Lead</th>
          </tr>
          <?php



          global $con;

          $get_c = "select * from leads Order by id desc";
          $run_c = mysqli_query($con, $get_c);
          $sr = 0;
          while ($row_c = mysqli_fetch_array($run_c)) {
            $id = $row_c['id'];
            $first_name = $row_c['first_name'];
            $last_name = $row_c['last_name'];
            $title = $row_c['title'];
            $email = $row_c['email'];
            $phone_number = $row_c['phone_number'];
            $company = $row_c['company'];
            $industry = $row_c['industry'];
            $country = $row_c['country'];
            $serviceofinterest = $row_c['serviceofinterest'];
            $date = $row_c['currentdate'];
            $sr++;

          ?>

            <tr>
              <td style="width:50px;">
                <?php echo $sr; ?>
              </td>
              <td>
                <?php echo $first_name; ?>
              </td>
              <td>
                <?php echo $last_name; ?>
              </td>
              <td>
                <?php echo $title; ?>
              </td>
              <td>
                <?php echo $email; ?>
              </td>
              <td>
                <?php echo $phone_number; ?>
              </td>
              <td>
                <?php echo $company; ?>
              </td>
              <td>
                <?php echo $industry; ?>
              </td>
              <td>
                <?php echo $country; ?>
              </td>
              <td>
                <?php echo $serviceofinterest; ?>
              </td>
              <td>
                <?php echo $date; ?>
              </td>
            </tr>
          <?php } ?>
        </table>


      </div>
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>