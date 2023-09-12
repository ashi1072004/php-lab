<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../files/bootstrap.min.css">
</head>
<body>
<div class="container-fluid p-0">
    <?php
        if(isset($_POST['sub'])){
            $name = $_POST['name'];
            $ftname = $_POST['ftname'];
            $post = $_POST['post'];
            $salary = $_POST['salary'];
        }
    ?>
    <div class="row justify-content-center mt-3">
        <div class="col-4 border border-3 border-success rounded px-3 py-5">
            <h1 class="text-center text-success mb-3">Enter data to check bonus</h1>
            <form method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control border-success" id="floating1st">
                    <label for="floating1st">Enter Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="ftname" class="form-control border-success" id="floating2nd">
                    <label for="floating2nd">Enter Father name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="post" class="form-control border-success" id="floating3rd">
                    <label for="floating3rd">Enter Post</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" name="salary" class="form-control border-success" id="floating4th">
                    <label for="floating4th">Enter Salary</label>
                </div>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-outline-success p-2" type="submit" value="Submit" name="sub">
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 mt-3">            
            <table class="table table-bordered table-striped">
                <tr class="table-success">
                <th>Name</th>
                <th>Father Name</th>
                <th>Post</th>
                <th>Salary</th>
                <th>Bonus %age</th>
                <th>Bonus</th>
                <th>Net Salary</th>
                </tr>
                <?php 
                    // $name=array('Ali', 'Hamza', 'Nouman', 'Akif', 'Umer');
                    // $ftname=array('Raza', 'Rashid', 'Aslam', '', 'Shafiq');
                    // $post=array('Manager', 'Analyst', 'Accountant', 'Office Boy', 'Programmer');
                    // $salary=array(100000, 95000, 73000, 10000, 85000);
                    
                    // for($i=0; $i<=4; $i++){
                        // $bonus = 0;
                        // $net_sal = $salary[$i];
                        ?>
                        <tr>
                        <td><?php echo @$name;?></td>
                        <td><?php echo @$ftname;?></td>
                        <td><?php echo @$post;?></td>
                        <td><?php echo @$salary;?></td>
                        <?php
                        switch(true){
                            case(@$salary>=90000 && @$salary<=100000):
                            $bonus_per = 20;
                            break;
                            case(@$salary>=80000 && @$salary<90000):
                            $bonus_per = 15;
                            break;
                            case(@$salary>=70000 && @$salary<80000):
                            $bonus_per = 10;
                            break;
                            case(@$salary>=60000 && @$salary<70000):
                            $bonus_per = 5;
                            break;
                            default:
                            $bonus_per = 0;
                        }
                        if($bonus_per != 0){
                            $bonus = @$salary*($bonus_per/100);
                            $net_sal = @$salary + $bonus;
                        }
                        else{
                            $bonus = 0;
                            $net_sal = $salary;
                        }
                        ?>
                        <td><?php echo @$bonus_per.'%';?></td>
                        <td><?php echo @$bonus;?></td>
                        <td><?php echo @$net_sal;?></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="../files/popper.min.js"></script>
    <script src="../files/bootstrap.min.js"></script>
</body>
</html>