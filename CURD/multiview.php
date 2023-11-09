<?php
    include('./connection.php');
?>
<!doctype html>
<html lang="en">

<head>
  <title>Multi View</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main class='container'>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive mt-5">
            <h1 class="py-2 text-center">Student Record</h1>
            <table class="table table-hover table-borderless align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>Roll no</th>
                        <th>Student Pic</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Mobile #</th>
                        <th>Student CNIC</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $run = mysqli_query($conn, "SELECT * FROM `multistd` ORDER BY `srollno`");
                    while( $select = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                    // echo "<pre>";
                    // print_r($select);
                    // echo "</pre>";
                    ?>
                    <tr>
                        <th><?php echo $select['srollno'] ?></th>
                        <td class="text-nowrap">
                        <?php
                            $p = unserialize($select['spic']);
                            foreach($p as $c){
                            ?>
                            <img src="./multiimg/<?php echo $c ?>" alt="Couldn't Load" width="70" height="70">
                            <?php
                            }
                        ?>
                        </td>
                        <td><?php echo $select['sname'] ?></td>
                        <td><?php echo $select['sfname'] ?></td>
                        <td><?php echo $select['smobile'] ?></td>
                        <td><?php echo $select['scnic'] ?></td>
                        <td><?php echo $select['semail'] ?></td>
                        <td><?php echo $select['sdate'] ?></td>
                        <td><a href="./multiupdate.php?sid=<?php echo $select['sid'] ?>" class="btn btn-success">Update</a></td>
                        <td><a href="./multidelete.php?sid=<?php echo $select['sid'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                ?>  
                </tbody>
            </table>
        </div>

      </div>
      <div class="col-12 my-3 text-center">
        <a href="./multi_empty.php?del" class="btn btn-danger px-4 py-2">Empty Table</a>
      </div>
    </div>
  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
</body>

</html>