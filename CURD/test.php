<?php
    if(isset($_POST['sub'])){
        $spic = $_FILES['spic']['name'];
        // $p = $_FILES['spic']['tmp_name'];
        // echo '<pre>';
        // print_r($spic);
        // echo '</pre>';
        $extn = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
        $p = array();
        foreach($spic as $key=>$val){
          $exe = pathinfo($spic[$key], PATHINFO_EXTENSION);
          // echo $exe;
          if(in_array($exe, $extn)){
              // move_uploaded_file($_FILES['spic']['tmp_name'][$key],"./img/".$spic);
              $msg =  'right';
              // $p[] = rand(10000,99999).".".$exe;
          }
          else{
              $msg = 'not right';
              break;
          }

        }
        if($msg=='right'){
          echo 'all img right';
        }
        else{
          echo 'all img not right';
        }
        // echo '<pre>';
        // print_r($p);
        // echo '</pre>';
    }
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../files/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
      <main class="row justify-content-center">
        <div class="col-6 mt-5 bg-light">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <input type="file" multiple class="form-control" name="spic[]">
                </div>
                <input type="submit" name="sub" value="Submit" class="btn btn-primary">
            </form>
        </div>
        <!-- <div class="offset-6 col-6 justify-content-center">
            <img src="<?php// echo $p;?>" alt="">
        </div> -->
      </main>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="../files/popper.min.js"></script>
  <script src="../files/bootstrap.min.js"></script>
</body>

</html>