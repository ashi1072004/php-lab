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
  <title>Teacher View</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main class='container'>
    <div class="row justify-content-center">
      <!-- Search Record -->
      <div class="col-12">
        <div class="table-responsive mt-5">
            <h1 class="py-2 text-center">Teacher Record</h1>
            <form>
              <div class="input-group my-3 align-right">
                <input type="search" class="form-control" name="search" placeholder="Search Record" aria-describedby="addon">
                <span class="input-group-text" id="addon"><i class="fa-solid fa-magnifying-glass"></i></span>
              </div>
            </form>
            <table class="table table-hover table-borderless align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Teacher Pic</th>
                        <th>Teacher Name</th>
                        <th>Father Name</th>
                        <th>Mobile #</th>
                        <th>CNIC</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                    $sql = "SELECT * FROM `teacher` WHERE (`tid` LIKE '$search' or `tname` LIKE '%$search%' or `tfname` LIKE '%$search%' or `tmobile` LIKE '%$search%' or `tcnic` LIKE '$search%' or `temail` LIKE '%$search%' or `tdate` LIKE '%$search%') ORDER BY `tid` ";
                    $run = mysqli_query($conn, $sql);
                    while( $select = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                    // echo "<pre>";
                    // print_r($select);
                    // echo "</pre>";
                    ?>
                    <tr>
                        <th><?php echo $select['tid'] ?></th>
                        <td><img src="./singleimg/<?php echo $select['tpic'] ?>" alt="Couldn't Load" width="70" height="70"></td>
                        <td><?php echo $select['tname'] ?></td>
                        <td><?php echo $select['tfname'] ?></td>
                        <td><?php echo $select['tmobile'] ?></td>
                        <td><?php echo $select['tcnic'] ?></td>
                        <td><?php echo $select['temail'] ?></td>
                        <td><?php echo $select['tdate'] ?></td>
                        <td><a href="./teacher-update.php?tid=<?php echo $select['tid'] ?>" class="btn btn-success">Update</a></td>
                        <td><a href="./teacher-delete.php?tid=<?php echo $select['tid'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                ?>  
                </tbody>
            </table>
        </div>
      </div>
      <div class="col-12 my-3 text-center">
        <a href="./teacher-insert.php" target="_blank" class="btn btn-success px-4 py-2 mx-2">Insert Data</a>
        <a href="./teacher-empty.php?del" class="btn btn-danger px-4 py-2">Empty Table</a>
      </div>

    </div>
    

  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
  </script>
</body>

</html>