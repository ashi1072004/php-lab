<?php
include("./connection.php");
if (isset($_POST['sub'])) {
    $sname = mysqli_real_escape_string($con, $_POST['sname']);
    $sfname = mysqli_real_escape_string($con, $_POST['sfname']);
    $sgmail = mysqli_real_escape_string($con, $_POST['sgmail']);
    $smobile = mysqli_real_escape_string($con, $_POST['smobile']);
    $saddress = mysqli_real_escape_string($con, $_POST['saddress']);
    $sgen = mysqli_real_escape_string($con, $_POST['sgen']);
    $spic = $_FILES['spic']['name'];
    $p = array();
    foreach ($spic as $va) {
        $exe = strtolower(pathinfo($va, PATHINFO_EXTENSION));
        $arr = array("png", "jpg", "jpeg");
        if (in_array($exe, $arr)) {
            $p[] = rand(10000, 90000) . "." . $exe;
            $msg = "right";
        } else {
            $msg = "Not right";
            break;
        }
    }
    if ($msg == "right") {
        $pi = serialize($p);
        $sql = "INSERT INTO `std1`(`sname`,`sfname`,`sgmail`,`smobile`,`saddress`,`sgen`,`spic`)VALUES (
'$sname','$sfname','$sgmail','$smobile','$saddress','$sgen','$pi')";
        $run = mysqli_query($con, $sql);
        if ($run) {
            foreach ($p as $key => $d) {
                move_uploaded_file($_FILES['spic']['tmp_name'][$key], "./img/" . $d);
            }
            $msg = "Data Has Been Inserted";
        } else {
            $msg = "Data Has Not Been Inserted";
        }
        
    }else{
        $msg = "Image Is Not Right";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h1>
        <?php echo @$msg; ?>
    </h1>
    <div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input name="sname" type="text" placeholder="Eneter Name">
                </div>
                <div>
                    <label>Father Name</label>
                    <input name="sfname" type="text" placeholder="Eneter Father Name">
                </div>
                <div>
                    <label>Gmail</label>
                    <input name="sgmail" type="email" placeholder="Eneter Gmail">
                </div>
                <div>
                    <label>Mobile</label>
                    <input name="smobile" type="number" placeholder="Eneter Mobile">
                </div>
                <div>
                    <label>Address</label>
                    <textarea name="saddress" row="3"> </textarea>
                </div>
                <div>
                    <lable>Gender</lable>
                    <select name="sgen">
                        <option selected>select one</option>
                        <option value="male">Male</option>
                        <option value="female">FeMale</option>
                    </select>

                </div>
                <div>
                    <label> User pic </label>
                    <input type="file" multiple name="spic[]">
                </div>
                <input name="sub" type="submit" value="submit">
            </form>
        </div>
    </div>

</body>

</html>