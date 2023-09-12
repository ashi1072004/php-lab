<?php
    include('./array6d.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
    <style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        scroll-behavior: smooth;
    }
    .bg-image {
        width: 100%;
        height: 100vh;
        background-image: url('./priscilla-du-preez-ggeZ9oyI-PE-unsplash.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        overflow: auto;
    }
    .navbar .container-fluid .collapse ul li a {
        padding: 10px 20px;
        color: white;
    }
    .navbar .container-fluid .collapse .dropdown-item {
        color: black;
    }
    .mask-custom{
        background: rgba(204, 204, 204, 0.3);
        border-radius: 2em;
        backdrop-filter: blur(50px);
        border: 2px solid rgba(255, 255, 255, 0.05);
    }
    .dropdown-menu li{
        position: relative;
    }
	.nav-item .submenu{ 
		display: none;
		position: absolute;
		left:100%;
        top:-7px;
	}
	.dropdown-menu > li:hover{
        background-color: #f1f1f1;
    }
	.dropdown-menu > li > .submenu{
        display: none;
    }
	.dropdown-menu > li:hover > .submenu{
        display: block;
    }
    .row > div{
        display: none;
    }
    .row > div:target{
        display: block;
    }
    </style>
</head>
<body>
    <div class="container-fluid bg-image">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" onclick="myFunction()">
            <div class="container-fluid p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id="table">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Punjab</a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="#">Faisalabad &raquo; </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#uni1">GC University</a></li>
                                <li><a class="dropdown-item" href="#uni2">Agriculture University</a></li>
                                <li><a class="dropdown-item" href="#uni3">Punjab University</a></li>
                            </ul>
                            </li>
                            <li> <a class="dropdown-item" href="#">Lahore &raquo; </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#uni4">GC University</a></li>
                                <li><a class="dropdown-item" href="#uni5">UET Lahore</a></li>
                                <li><a class="dropdown-item" href="#uni6">Punjab University</a></li>
                            </ul>
                            </li>
                            <li> <a class="dropdown-item" href="#">Multan &raquo; </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="dropdown-item" href="#uni7">GC University</a></li>
                                <li><a class="dropdown-item" href="#uni8">Bahauddin Zakariya University</a></li>
                                <li><a class="dropdown-item" href="#uni9">Punjab University</a></li>
                            </ul>
                            </li>
                        </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">KPK</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Peshawar &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni10">GC University</a></li>
                                    <li><a class="dropdown-item" href="#uni11">Peshawar University</a></li>
                                    <li><a class="dropdown-item" href="#uni12">UET Peshawar</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Kohat &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni13">KUST University</a></li>
                                    <li><a class="dropdown-item" href="#uni14">KMU Medical Institute</a></li>
                                    <li><a class="dropdown-item" href="#uni15">Cadet College Kohat</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Mardan &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni16">Abdul Wali Khan University</a></li>
                                    <li><a class="dropdown-item" href="#uni17">Women University Mardan</a></li>
                                    <li><a class="dropdown-item" href="#uni18">KPK University</a></li>
                                </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sindh</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Karachi &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni19">Agha Khan University</a></li>
                                    <li><a class="dropdown-item" href="#uni20">Iqra University</a></li>
                                    <li><a class="dropdown-item" href="#uni21">University of Karachi</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Hyderabad &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni22">GC University</a></li>
                                    <li><a class="dropdown-item" href="#uni23">Isra University</a></li>
                                    <li><a class="dropdown-item" href="#uni24">University of EAST</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Sukkur &raquo;</a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni25">Sukkur IBA University</a></li>
                                    <li><a class="dropdown-item" href="#uni26">Sukkur institute of Science and Tech</a></li>
                                    <li><a class="dropdown-item" href="#uni27">GC University</a></li>
                                </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Balochistan</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Quetta &raquo;</a>
                                    <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni28">University of Balochistan</a></li>
                                    <li><a class="dropdown-item" href="#uni29">Agriculture University</a></li>
                                    <li><a class="dropdown-item" href="#uni30">Al-Hamd Islamic University</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Chaman &raquo;</a>
                                    <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni31">GC University</a></li>
                                    <li><a class="dropdown-item" href="#uni32">Allama Iqbal Open University</a></li>
                                    <li><a class="dropdown-item" href="#uni33">Chaman Cadet College</a></li>
                                </ul>
                                </li>
                                <li><a class="dropdown-item" href="#">Gwadar &raquo;</a>
                                    <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#uni34">University of Gwadar</a></li>
                                    <li><a class="dropdown-item" href="#uni35">NUML Gwadar Campus</a></li>
                                    <li><a class="dropdown-item" href="#uni36">Allama Iqbal Open University</a></li>
                                </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                </div>
            </div>
        </nav>
        
    <!-------------------------- Table ------------------------>
        <div class="row justify-content-center">
        <?php
        function Rollno(){
            static $i=577801;
            echo $i;
            $i++;
        }
        $u = 1;
        foreach($province as $key1=> $city){
        ?>
                <!-- <h1 class="display-5 text-white px-3 pt-2"><?php echo $key1;?></h1> -->
                <?php
            foreach($city as $key2=>$uni){
                ?>
                <!-- <h1 align="center" class="display-5 text-white pt-3"><?php echo $key2;?></h1> -->
                <?php
                foreach($uni as $key3=>$dep){
                ?>
            <div class="col-9 mask-custom my-5 pb-4" id="uni<?php echo $u; $u++;?>">
                <h1 align="center" class="text-white pt-3"><?php echo $key3;?></h1>
                <?php
                    foreach($dep as $key4=>$st){
                ?>
                <h1 align="center" class="text-white pt-4"><?php echo $key4;?></h1>
                <div class="table-responsive px-3">
                    <table class="table table-borderless text-white text-nowrap mb-0">
                        <thead>
                            <tr class="">
                                <th>Roll no.</th>
                                <th>Name</th>
                                <th>VB marks</th>
                                <th>OS marks</th>
                                <th>SE marks</th>
                                <th>Stat marks</th>
                                <th>Web Tech marks</th>
                                <th>Total marks</th>
                                <th>Obtained marks</th>
                                <th>%age</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                
                        $total = 320;
                        foreach($st as $val){
                            $ob = 0;
                            ?>
                            <tr>
                                <th scope="row"><?php echo Rollno();?></th>
                                <?php
                                foreach($val as $x){
                                    if(gettype($x) == 'integer'){
                                        $r = rand(15, 80);
                                        $ob += $r;
                                        echo '<td>'.$r.'</td>';
                                    }
                                    else{
                                        echo '<td>'.$x.'</td>';
                                    }
                                }
                                $per = round($ob/$total*100);
                                switch(true){
                                    case($per>=90 && $per<=100):
                                    $g = 'A+';
                                    break;
                                    case($per>=80 && $per<90):
                                    $g = 'A';
                                    break;
                                    case($per>=70 && $per<80):
                                    $g = 'B';
                                    break;
                                    case($per>=60 && $per<70):
                                    $g = 'C';
                                    break;
                                    case($per>=50 && $per<60):
                                    $g = 'D';
                                    break;
                                    default:
                                    $g = 'F';
                                }
                                echo '<td>'.$total.'</td>';
                                echo '<td>'.$ob.'</td>';
                                echo '<td>'.$per.'%</td>';
                                echo '<td>'.$g.'</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    }?>
            </div>
        <?php
                }
            }?>
        <?php
        }?>
        </div>
    </div>
    <!-- <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        } -->
    </script>
    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>
</html>