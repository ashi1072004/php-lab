<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Loops</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
    <style>
        .mask{
            background-image: url('./pawel-czerwinski-z7prq6BtPE4-unsplash.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            overflow: auto;
            overflow-x: hidden;
            width: 100%;
            /* height: 100vh; */
            margin: 0;
            padding: 0;
        }
        .mask-custom{
            background: rgba(24, 24, 16, .2);
            border-radius: 2em;
            backdrop-filter: blur(25px);
            /* border: 2px solid rgba(255, 255, 255, 0.05); */
            /* background-clip: padding-box; */
            /* box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03); */
        }
        .mask-custom form input{
            background: transparent;
            /* outline: none; */
        }
        .mask-custom form select{
            background: transparent;
            color: white;
        }
        .mask-custom form option{
            background: transparent;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <?php
            if(isset($_POST['sub'])){
                $start = $_POST['start'];
                $end = $_POST['end'];
                $opt = $_POST['opt'];
            }
        ?>
        <div class="mask vh-100">
            <div class="row justify-content-center pt-5">
                <div class="col-4 mask-custom border border-3 border-info rounded px-3 py-5">
                    <form method="post" class="text-white">
                        <div class="form-floating mb-3">
                            <input type="number" name="start" class="form-control border-info" id="floating1st">
                            <label for="floating1st">Enter starting number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="end" class="form-control border-info" id="floating2nd">
                            <label for="floating2nd">Enter ending number</label>
                        </div>
                        <select class="form-select border-info mb-3" name="opt">
                            <option selected>Select your choice</option>
                            <option value="1">Even Numbers</option>
                            <option value="2">Odd Numbers</option>
                            <option value="3">Prime Numbers</option>
                            <option value="4">Factorial of a number</option>
                            <option value="5">Leap Years</option>
                        </select>
                        <div class="d-flex justify-content-center">
                            <input class="btn btn-outline-info p-2" type="submit" value="Submit" name="sub">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-white">
                <div class="col-11 justify-content-center">
                    <?php
                        switch(@$opt){
                            // Even Numbers
                            case '1':
                            echo '<h1>Even Numbers from '.$start.' to '.$end.':</h1>';
                            for($x=$start; $x<=$end; $x++){
                                if($x%2 == 0){
                                    echo '<h2 style="display:inline"> '.$x.'</h2>';
                                }
                            }
                            break;
                            // Odd Numbers
                            case 2:
                            echo '<h1>Odd Numbers from '.$start.' to '.$end.':</h1>';
                            for($x=$start; $x<=$end; $x++){
                                if($x%2 != 0){
                                    echo '<h2 style="display:inline"> '.$x.'</h2>';
                                }
                            }
                            break;
                            // Prime Numbers
                            case 3:
                            echo '<h1>Prime Numbers from '.$start.' to '.$end.':</h1>';
                            for($x=$start; $x<=$end; $x++){
                                if($x==1 || $x==2){
                                    echo '<h2 style="display:inline"> '.$x.'</h2>';
                                }
                                $flag = 0;
                                for($i=2; $i<$x; $i++){   
                                    if($x%$i == 0){
                                        $flag = 1;
                                        break;
                                    }
                                }
                                if($flag == 0){
                                    echo '<h2 style="display:inline"> '.$x.'</h2>';
                                }
                            }
                            break;
                            // Factorial of a Number
                            case 4:
                            echo '<h1>Factorial of Numbers from '.$start.' to '.$end.':</h1>';
                            for($x=$start; $x<=$end; $x++){
                                $fact = 1;
                                for($i=$x; $i>=1; $i--){
                                    $fact *= $i;
                                }
                                echo '<h2 style="display:inline"> '.$fact.'</h2>';
                            }
                            break;
                            case 5:
                            echo '<h1>Leap Years from '.$start.' to '.$end.':</h1>';
                            $year = $start;
                            while($year<=$end){
                                if($year%400 == 0){
                                    echo '<h2 style="display:inline"> '.$year.'</h2>';
                                    }
                                    else if($year%100 == 0){}
                                        else if($year%4 == 0){
                                            echo '<h2 style="display:inline"> '.$year.'</h2>';
                                        }
                                        else{}
                                $year++;
                            }
                            break;
                        }
                    ?>
                </div>
            </div>
            <!--     $even = array();
                $odd = array();
                $prime = array();
                $Fact = array();
                $leap = array();
                for($x=1; $x<=10; $x++){
                    // Even or Odd
                    if($x%2 == 0){
                        $even[$x] = $x;
                    }
                    else{
                        $odd[$x] = $x;
                    }
                    // Prime Number
                    if($x==1 || $x==2){
                        $prime[$x] = $x;    
                    }
                    $flag = 0;
                    for($i=2; $i<$x; $i++){   
                        if($x%$i == 0){
                            $flag = 1;
                            break;
                        }
                    }
                    if($flag == 0){
                        $prime[$x] = $x;
                    }
                    // Factorial
                    $fact = 1;
                    for($i=$x; $i>=1; $i--){
                        $fact *= $i;
                    }
                    $Fact[$x] = $fact;
                }
                // Leap Years
                $year = 1990;
                $x = 0;
                while($year<=2023){
                    if($year%400 == 0){
                        $leap[$x] = $year;
                    }
                    else if($year%100 == 0){

                    }
                    else if($year%4 == 0){
                        $leap[$x] = $year;
                    }
                    else{
                        
                    }
                    $year++;
                    $x++;
                }

                // Print Even Numbers
                echo '<h1>Even Numbers from 1 to 10:</h1>';
                foreach($even as $value){
                    echo '<h2 style="display:inline"> '.$value.'</h2>';
                }
                // Print Odd Numbers
                echo '<h1>Odd Numbers from 1 to 10:</h1>';
                foreach($odd as $value){
                    echo '<h2 style="display:inline"> '.$value.'</h2>';
                }
                // Print Prime Numbers
                echo '<h1>Prime Numbers from 1 to 10:</h1>';
                foreach($prime as $value){
                    echo '<h2 style="display:inline"> '.$value.'</h2>';
                }
                // Print Factorials
                echo '<h1>Factorial of numbers from 1 to 10:</h1>';
                foreach($Fact as $value){
                    echo '<h2 style="display:inline"> '.$value.'</h2>';
                }
                // Print Leap Years
                echo '<h1>Leap Years from 1990 to 2023:</h1>';
                foreach($leap as $value){
                    echo '<h2 style="display:inline"> '.$value.'</h2>';
                }
            -->
        </div>
    </div>

    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>
</html>