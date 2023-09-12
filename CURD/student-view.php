<?php
    include('./connection.php');

    if(isset($_GET['search'])){
      $search = $_GET['search'];
      // if(empty($search)){
        
      // }
    }
    else{
      $search = NULL;
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Student View</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main class='container'>
    <div class="row">
      <!-- Search Record -->
      <div class="col-12">
        <div class="table-responsive mt-5">
            <h1 class="py-2 text-center">Student Record</h1>
            <form>
              <div class="input-group my-3 align-right">
                <input type="search" class="form-control" name="search" placeholder="Search Record" aria-describedby="addon">
                <span class="input-group-text" id="addon"><i class="fa-solid fa-magnifying-glass"></i></span>
              </div>
            </form>
            <table class="table table-hover table-borderless align-middle">
                <thead class="table-secondary">
                    <tr>
                        <!-- <th>#</th> -->
                        <th>Teacher ID</th>
                        <th>Teacher Pic</th>
                        <th>Teacher Name</th>
                        <!-- <th>Class ID</th> -->
                        <th>Class Time</th>
                        <th>Class Name</th>
                        <th>Student Roll no</th>
                        <!-- <th>Teacher ID</th> -->
                        <th>Student Pic</th>
                        <th>Student Name</th>
                        <th>Student Father Name</th>
                        <th>Student Mobile #</th>
                        <th>Student CNIC</th>
                        <th>Student Email</th>
                        <th>Student Admission Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                    // $sr = "SELECT * FROM `std`, `teacher`, `classtime` WHERE (`srollno` LIKE '$search' or `teachid` LIKE '$search' or `sname` LIKE '%$search%' or `sfname` LIKE '%$search%' or `smobile` LIKE '%$search%' or `scnic` LIKE '$search%' or `semail` LIKE '%$search%' or `sdate` LIKE '%$search%') AND std.teachid=teacher.tid AND std.classtime=classtime.ctid ORDER BY `srollno` ";
                    // $srun = mysqli_query($conn, $sr);

                    // $sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid";
                    // $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid";
                    // $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid";
                    // $sql = "SELECT * FROM `std` s RIGHT JOIN `teacher` t ON s.teachid=t.tid UNION SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid ORDER BY `srollno`";
                    // $sql = "SELECT * FROM `std` s RIGHT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno`";
                    // $sql = "SELECT * FROM `std` s LEFT JOIN `teacher` t ON s.teachid=t.tid LEFT JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno` ";
                    
                    $sql = "SELECT * FROM `std` s INNER JOIN `teacher` t ON s.teachid=t.tid INNER JOIN `classtime` ct ON s.classtime=ct.ctid ORDER BY `srollno` ";

                    $run = mysqli_query($conn, $sql);
                    while( $select = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                    // echo "<pre>";
                    // print_r($select);
                    // echo "</pre>";

                    // if($select['teachid']=='0'){
                    //   $teachid = NULL;
                    // }else{
                    //   $teachid = $select['teachid'];
                    // }
                    ?>
                    <tr>
                        <!-- <th><?php //echo $select['sid'] ?></th> -->
                        <td><?php echo $select['tid'] ?></td>
                        <td><img src="./singleimg/<?php echo $select['tpic'] ?>" alt="No Img Found" width="70" height="70"></td>
                        <td><?php echo $select['tname'] ?></td>
                        <!-- <td><?php //echo $select['ctid'] ?></td> -->
                        <td><?php echo $select['cttime'] ?></td>
                        <td><?php echo $select['cname'] ?></td>
                        <td><?php echo $select['srollno'] ?></td>
                        <!-- <td><?php //echo $teachid ?></td> -->
                        <td><img src="./singleimg/<?php echo $select['spic'] ?>" alt="No Img Found" width="70" height="70"></td>
                        <td><?php echo $select['sname'] ?></td>
                        <td><?php echo $select['sfname'] ?></td>
                        <td><?php echo $select['smobile'] ?></td>
                        <td><?php echo $select['scnic'] ?></td>
                        <td><?php echo $select['semail'] ?></td>
                        <td><?php echo $select['sdate'] ?></td>
                        <td><a href="./student-update.php?sid=<?php echo $select['sid'] ?>" class="btn btn-success">Update</a></td>
                        <td><a href="./student-delete.php?sid=<?php echo $select['sid'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                ?>  
                </tbody>
            </table>
        </div>
      </div>
      <div class="col-12 my-3 text-center">
        <!-- <form method="get">
          <input type="submit" name="del" class="btn btn-danger px-4 py-2" value="Empty Table">
          <h1><?php// echo @$msg; ?></h1>
        </form> -->
        <a href="./student-insert.php" target="_blank" class="btn btn-success px-4 py-2 mx-2">Insert Data</a>
        <a href="./single_empty.php?del" class="btn btn-danger px-4 py-2">Empty Table</a>
      </div>

    </div>
    

  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
  </script>
</body>

</html>