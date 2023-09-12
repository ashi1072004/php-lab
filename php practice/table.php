<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <style>
    /* .tr-bg{
        background-color: darkblue;
    } */
    /* .panel{
    font-family: 'Raleway', sans-serif;
    padding: 0;
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }
    .panel .panel-heading{
        background: #535353;
        padding: 15px;
        border-radius: 0;
    }
    .panel .panel-heading .btn{
        color: #fff;
        background-color: #000;
        font-size: 14px;
        font-weight: 600;
        padding: 7px 15px;
        border: none;
        border-radius: 0;
        transition: all 0.3s ease 0s;
    }
    .panel .panel-heading .btn:hover{ box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); }
    .panel .panel-heading .form-horizontal .form-group{ margin: 0; }
    .panel .panel-heading .form-horizontal label{
        color: #fff;
        margin-right: 10px;
    }
    .panel .panel-heading .form-horizontal .form-control{
        display: inline-block;
        width: 80px;
        border: none;
        border-radius: 0;
    }
    .panel .panel-heading .form-horizontal .form-control:focus{
        box-shadow: none;
        border: none;
    }
    .panel .panel-body{
        padding: 0;
        border-radius: 0;
    }
    .panel .panel-body .table thead tr th{
        color: #fff;
        background: #8D8D8D;
        font-size: 17px;
        font-weight: 700;
        padding: 12px;
        border-bottom: none;
    }
    .panel .panel-body .table thead tr th:nth-of-type(1){ width: 120px; }
    .panel .panel-body .table thead tr th:nth-of-type(3){ width: 50%; }
    .panel .panel-body .table tbody tr td{
        color: #555;
        background: #fff;
        font-size: 15px;
        font-weight: 500;
        padding: 13px;
        vertical-align: middle;
        border-color: #e7e7e7;
    }
    .panel .panel-body .table tbody tr:nth-child(odd) td{ background: #f5f5f5; }
    .panel .panel-body .table tbody .action-list{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .panel .panel-body .table tbody .action-list li{ display: inline-block; }
    .panel .panel-body .table tbody .action-list li a{
        color: #fff;
        font-size: 13px;
        line-height: 28px;
        height: 28px;
        width: 33px;
        padding: 0;
        border-radius: 0;
        transition: all 0.3s ease 0s;
    }
    .panel .panel-body .table tbody .action-list li a:hover{ box-shadow: 0 0 5px #ddd; }
    .panel .panel-footer{
        color: #fff;
        background: #535353;
        font-size: 16px;
        line-height: 33px;
        padding: 25px 15px;
        border-radius: 0;
    }
    .pagination{ margin: 0; }
    .pagination li a{
        color: #fff;
        background-color: rgba(0,0,0,0.3);
        font-size: 15px;
        font-weight: 700;
        margin: 0 2px;
        border: none;
        border-radius: 0;
        transition: all 0.3s ease 0s;
    }
    .pagination li a:hover,
    .pagination li a:focus,
    .pagination li.active a{
        color: #fff;
        background-color: #000;
        box-shadow: 0 0 5px rgba(0,0,0,0.4);
    } */
    .mask{
        background-image: url('pawel-czerwinski-z7prq6BtPE4-unsplash.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    table td,
    table th {
        /* text-overflow: ellipsis; */
        white-space: nowrap;
        /* overflow: hidden; */
    }

    .mask-custom{
        background: rgba(24, 24, 16, .2);
        border-radius: 2em;
        backdrop-filter: blur(25px);
        border: 2px solid rgba(255, 255, 255, 0.05);
        /* background-clip: padding-box; */
        /* box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03); */
    }
    </style>
</head>
<body>
    <div class="mask bg-image vh-100">
        <div class="container-fluid">
        <?php
        function increment(){
            static $i=577801;
            echo $i;
            $i++;
        }
        $name = array('Ali', 'Hamza', 'Usman', 'Fatima', 'Ayesha');
        $dep = array('BSCS', 'BSCS', 'BSIT', 'BSIT', 'BSIT');
        $VB = array(52, 48, 50, 54, 34);
        $OS = array(68, 60, 78, 65, 43);
        $SE = array(45, 51, 59, 40, 31);
        $STA = array(56, 49, 43, 19, 19);
        $WT = array(45, 28, 58, 37, 27);
        $total = 320;
        $ob = array();
        $per = array();
        $g = array();
        for($x=0; $x<5; $x++){
            $ob[$x] = $VB[$x] + $OS[$x] + $SE[$x] + $STA[$x] + $WT[$x];
            $per[$x] = round($ob[$x]/$total*100);
        }
        for($x=0; $x<5; $x++){
            switch(true){
                case($per[$x]>=90 && $per[$x]<=100):
                $g[$x] = 'A+';
                break;
                case($per[$x]>=80 && $per[$x]<=90):
                $g[$x] = 'A';
                break;
                case($per[$x]>=70 && $per[$x]<=80):
                $g[$x] = 'B';
                break;
                case($per[$x]>=60 && $per[$x]<=70):
                $g[$x] = 'C';
                break;
                case($per[$x]>=50 && $per[$x]<=60):
                $g[$x] = 'D';
                break;
                default:
                $g[$x] = 'F';
            }
        }
        $a = 30;
        $b = 20;
        $opt = '+';
        function calculator(){
            global $a;
            global $b;
            global $opt;
            switch($opt){
                case '+':
                echo $c = $a + $b;
                break;
                case '-':
                echo $c = $a - $b;
                break;
                case '*':
                echo $c = $a * $b;
                break;
                case '/':
                echo $c = $a / $b;
                break;
                case '%':
                echo $c = $a % $b;
                break;
                case '**':
                echo $c = $a ** $b;
                break;
                default:
                echo '<p>Invalid option</p>';
            }
        }
        ?>
        <!-------------------------- Table ------------------------>
            <div class="row justify-content-center">
                <div class="col-9 mask-custom mt-5 pb-4">
                    <div class="table-responsive p-4">
                        <table class="table table-borderless text-white mb-0">
                            <thead>
                                <tr class="">
                                    <th scope="col">Roll no.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">VB marks</th>
                                    <th scope="col">OS marks</th>
                                    <th scope="col">SE marks</th>
                                    <th scope="col">Stat marks</th>
                                    <th scope="col">Web Tech marks</th>
                                    <th scope="col">Total marks</th>
                                    <th scope="col">Obtained marks</th>
                                    <th scope="col">%age</th>
                                    <th scope="col">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($x=0; $x<5; $x++){
                                echo '<tr>';
                                    echo '<th scope="row">'; increment(); echo '</th>';
                                    echo '<td>'.$name[$x].'</td>';
                                    echo '<td>'.$dep[$x].'</td>';
                                    echo '<td>'.$VB[$x].'</td>';
                                    echo '<td>'.$OS[$x].'</td>';
                                    echo '<td>'.$SE[$x].'</td>';
                                    echo '<td>'.$STA[$x].'</td>';
                                    echo '<td>'.$WT[$x].'</td>';
                                    echo '<td>'.$total.'</td>';
                                    echo '<td>'.$ob[$x].'</td>';
                                    echo '<td>'.$per[$x].'%</td>';
                                    echo '<td>'.$g[$x].'</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="row justify-content-center">
                <div class="col-3 mt-5 bg-light text-center border border-3 border-dark">
                    <h1 class="display-5"><?php //echo 'a = '.$a.', b = '.$b;?></h1>
                    <h1 class="display-5"><?php //echo 'a '.$opt.' b = '; calculator();?></h1>
                </div>
            </div> -->
        </div>
    </div>

        
        <!-- <div class="row mt-5">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <a href="#" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Add New</a>
                                <form class="form-horizontal pull-right">
                                    <div class="form-group">
                                        <label>Show : </label>
                                        <select class="form-control">
                                            <option>5</option>
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>1</td>
                                    <td>Vincent Williamson</td>
                                    <td>31</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>2</td>
                                    <td>Taylor Reyes</td>
                                    <td>22</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>3</td>
                                    <td>Justin Block</td>
                                    <td>26</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>4</td>
                                    <td>Sean Guzman</td>
                                    <td>26</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>5</td>
                                    <td>Keith Carter</td>
                                    <td>24</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>
</html>