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
  <title>ClassTime View</title>
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
      <div class="col-9">
        <div class="table-responsive mt-5">
            <h1 class="py-2 text-center">ClassTime Record</h1>
            <form>
              <div class="input-group my-3 align-right">
                <input type="search" class="form-control" name="search" placeholder="Search Record" aria-describedby="addon">
                <span class="input-group-text" id="addon"><i class="fa-solid fa-magnifying-glass"></i></span>
              </div>
            </form>
            <table class="table table-hover table-borderless align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Class Time</th>
                        <th>Class Name</th>
                        <th>Class Start Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM `classtime` WHERE (`ctid` LIKE '$search' or `cttime` LIKE '%$search%' or `cname` LIKE '%$search%' or `cdate` LIKE '%$search%')";

                    $run = mysqli_query($conn, $sql);
                    while( $select = mysqli_fetch_array($run, MYSQLI_ASSOC)){
                    // echo "<pre>";
                    // print_r($select);
                    // echo "</pre>";
                    ?>
                    <tr>
                        <td><?php echo $select['ctid'] ?></td>
                        <td><?php echo $select['cttime'] ?></td>
                        <td><?php echo $select['cname'] ?></td>
                        <td><?php echo $select['cdate'] ?></td>
                        <td><a href="./ctime-update.php?ctid=<?php echo $select['ctid'] ?>" class="btn btn-success">Update</a></td>
                        <td><a href="./ctime-delete.php?ctid=<?php echo $select['ctid'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                ?>  
                </tbody>
            </table>
        </div>
      </div>
      <div class="col-12 my-3 text-center">
        <!-- <form method="post">
          <input type="submit" name="del" class="btn btn-danger px-4 py-2" value="Empty Table">
        </form> -->
        <a href="./ctime-insert.php" target="_blank" class="btn btn-success px-4 py-2 mx-2">Insert Data</a>
        <a href="./ctime-empty.php" class="btn btn-danger px-4 py-2">Empty Table</a>
      </div>

    </div>
    

  </main>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
  </script>
</body>

</html>