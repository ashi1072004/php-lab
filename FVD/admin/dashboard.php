<?php
include("connection.php");
if (!isset($_SESSION['customer_login'])) {
        header("Location: index.php");
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title></title>
    <style>
    body {
        margin: 0px;
        padding: 0px;
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

    .success {
        background-color: green;
        color: black;
        padding: 10px;
        border: 1px solid black;
        text-align: center;
        font-size: 18px;
        font-weight: 600;

    }

    .dataa {
        background-color: #197CAD;
        color: white;
        font-weight: 700;
        padding: 20px;
        margin-top: 10px;
        border-radius: 10px;
    }
    </style>
</head>

<body>

    <div class="container pb-2 mb- pt-2">
        <?php
                $orders_in_jan = 0;
                $orders_in_feb = 0;
                $orders_in_march = 0;
                $orders_in_april = 0;
                $orders_in_may = 0;
                $orders_in_june = 0;
                $orders_in_june = 0;
                $orders_in_july = 0;
                $orders_in_august = 0;
                $orders_in_sep = 0;
                $orders_in_oct = 0;
                $orders_in_nov = 0;
                $orders_in_dec = 0;
                $get_products = "SELECT * FROM orders";
                $run_products = mysqli_query($con, $get_products);
                $numberoforders = mysqli_num_rows($run_products);
                if ($numberoforders > 0) {
                        while ($orders = mysqli_fetch_assoc($run_products)) {
                                if ($orders['month'] == "Jan") {
                                        $orders_in_jan++;
                                }

                                if ($orders['month'] == "Feb") {
                                        $orders_in_feb++;
                                }

                                if ($orders['month'] == "March") {
                                        $orders_in_march++;
                                }

                                if ($orders['month'] == "April") {
                                        $orders_in_april++;
                                }

                                if ($orders['month'] == "May") {
                                        $orders_in_may++;
                                }


                                if ($orders['month'] == "June") {
                                        $orders_in_june++;
                                }

                                if ($orders['month'] == "July") {
                                        $orders_in_july++;
                                }

                                if ($orders['month'] == "August") {
                                        $orders_in_august++;
                                }

                                if ($orders['month'] == "Sep") {
                                        $orders_in_sep++;
                                }

                                if ($orders['month'] == "Oct") {
                                        $orders_in_oct++;
                                }

                                if ($orders['month'] == "Nov") {
                                        $orders_in_nov++;
                                }

                                if ($orders['month'] == "Dec") {
                                        $orders_in_dec++;
                                }
                        }

                }
                ?>
        <h2 align="center"><b>Dashboard</b></h2>
        <div class="row pt-4 ">
            <h4 class="pl-2 pb-2" style="text-decoration: underline;text-underline-offset: 4px;">Purchases
                Overview</h4>
            <canvas id="myChart" style="width:100%"></canvas>
        </div>
    </div>

    <div class="container pb-5 mb-4 pt-4">
        <div class="row ">
            <div class="col-sm-12  p-0">
                <div class="row p-0  m-0">


                    <div class="col-md-4  text-center  ">
                        <div class="dataa">
                            <h2 align="center">Total Designs</h2><br>
                            <?php
                                                        $get_products = "SELECT * FROM products";
                                                        $run_products = mysqli_query($con, $get_products);
                                                        $number = mysqli_num_rows($run_products);

                                                        echo "<h3><b>" . $number . "</b></h3>";
                                                        ?>
                        </div>
                    </div>


                    <div class="col-md-4  text-center   ">
                        <div class="dataa">
                            <h2 align="center">Total Customers</h2><br>
                            <?php
                                                        $get_products = "SELECT * FROM customers";
                                                        $run_products = mysqli_query($con, $get_products);
                                                        $number = mysqli_num_rows($run_products);

                                                        echo "<h3><b>" . $number . "</b></h3>";
                                                        ?>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="dataa">
                            <h2 align="center">Total Purchases</h2><br>
                            <?php
                                                        $get_products = "SELECT * FROM orders";
                                                        $run_products = mysqli_query($con, $get_products);
                                                        $number = mysqli_num_rows($run_products);

                                                        echo "<h3><b>" . $number . "</b></h3>";
                                                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
    var xValues = ["Jan", "Feb", "March", "April", "May", "June", "July", "August", "Sep", "Oct", "Nov", "Dec"];
    var yValues = [<?php echo $orders_in_jan; ?>, <?php echo $orders_in_feb; ?>, <?php echo $orders_in_march; ?>,
        <?php echo $orders_in_april; ?>, <?php echo $orders_in_may; ?>, <?php echo $orders_in_june; ?>,
        <?php echo $orders_in_july; ?>, <?php echo $orders_in_august; ?>, <?php echo $orders_in_sep; ?>,
        <?php echo $orders_in_oct; ?>, <?php echo $orders_in_nov; ?>, <?php echo $orders_in_dec; ?>
    ];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label: 'Orders',
                fill: false,
                lineTension: 0,
                backgroundColor: "#187DAD",
                borderColor: "#187DAD",
                pointRadius: 5,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: Math.max(...yValues) + 5
                    }
                }],
            }
        }
    });
    </script>

</body>

</html>